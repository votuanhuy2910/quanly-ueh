<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {
        include "../DB_connection.php";
        include "data/student.php";

        $students = getAllStudents($conn);

        // Tính số hồ sơ đã trả
        $sql = "SELECT * FROM students";
        $stmt = $conn->query($sql);

        $count = 0;

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Truy cập dữ liệu theo tên cột
                // echo $row["note"];
                $note = $row['note'];
                if (is_string($note) && !empty($note)) {
                    $count++;
                }
            }
        }
        // close

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Truy vấn SQL để đếm số lượng từng trạng thái
        $sql1 = "SELECT status, COUNT(*) as count FROM students GROUP BY status";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute();

        // Lấy kết quả dưới dạng mảng kết hợp
        $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        // In kết quả ra màn hình
?>
        <?php
        include "req/header.php";
        if ($students != 0) {
        ?>

            <body>
                <?php
                include "inc/navbar.php";
                ?>
                <section class="dashboard">
                    <div class="top">
                        <i class="uil uil-bars sidebar-toggle"></i>
                        <div class="input-box">
                            <i class="uil uil-search"></i>
                            <input type="text" placeholder="Search here..." />
                            <button class="button">Search</button>
                        </div>
                    </div>

                    <div class="dash-content">
                        <div style="display: flex; align-items: flex-start; justify-content: space-evenly;">
                            <table class="table" style="border-collapse: collapse; width: 30%; margin-bottom: 2rem;">
                                <thead>
                                    <tr>
                                        <th style="border: 1px solid #ddd; padding: 8px;">Trạng thái</th>
                                        <th style="border: 1px solid #ddd; padding: 8px;">Số lượng (Hồ sơ)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="border: 1px solid #ddd; padding: 8px;">Tổng số hồ sơ</td>
                                        <td style="border: 1px solid #ddd; padding: 8px;"><?= count($students) ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #ddd; padding: 8px;">Đã rút hồ sơ</td>
                                        <td style="border: 1px solid #ddd; padding: 8px;"><?= $count ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid #ddd; padding: 8px;">Số hồ sơ còn lại</td>
                                        <td style="border: 1px solid #ddd; padding: 8px;"><?= count($students) - $count ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                            if ($result1) {
                                echo "<table class='table' style='border-collapse: collapse; width: 30%; margin-bottom: 2rem;'>";
                                echo
                                "<thead>
                                    <tr>
                                    <th style='border: 1px solid #ddd; padding: 8px;'>Tình trạng</th>
                                    <th style='border: 1px solid #ddd; padding: 8px;'>Số lượng (Sinh viên)</th>
                                    </tr>
                                </thead>"; // Tiêu đề bảng

                                foreach ($result1 as $row) {
                                    echo "<tr>";
                                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['status'] . "</td>";
                                    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['count'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            } else {
                                echo "Không có dữ liệu.";
                            }
                            ?>
                            <div style="display: flex; align-items: center; align-content: center; flex-wrap: wrap; flex-direction: column-reverse; margin-bottom: 2rem;">
                                <div>
                                    <a href="#" class="btn btn-primary mt-3">Import Excel</a>
                                    <a href="#" class="btn btn-success mt-3">Export Excel</a>
                                </div>

                                <a href="student-add.php" class="btn btn-dark mt-3">Thêm sinh viên mới</a>

                                <form action="student-search.php" class="n-table" method="get" style="width: 100%;">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="searchKey" placeholder="Search...">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <hr>

                        <div class="activity">
                            <div class="title">
                                <i class="uil uil-clock-three"></i>
                                <span class="text">Recent Activity</span>
                            </div>

                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger mt-3 n-table" role="alert">
                                    <?= $_GET['error'] ?>
                                </div>
                            <?php } ?>

                            <?php if (isset($_GET['success'])) { ?>
                                <div class="alert alert-info mt-3 n-table" role="alert">
                                    <?= $_GET['success'] ?>
                                </div>
                            <?php } ?>

                            <div class="activity-data">
                                <?php
                                // Pagination logic
                                $limit = 50; // Number of records per page
                                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                $start = ($page - 1) * $limit;

                                // Fetch limited students for the current page
                                $sql_paginated = "SELECT * FROM students LIMIT $start, $limit";
                                $stmt_paginated = $conn->prepare($sql_paginated);
                                $stmt_paginated->execute();
                                $students_paginated = $stmt_paginated->fetchAll(PDO::FETCH_ASSOC);

                                // Get total number of students for pagination
                                $sql_total = "SELECT COUNT(*) as total FROM students";
                                $stmt_total = $conn->prepare($sql_total);
                                $stmt_total->execute();
                                $total_students = $stmt_total->fetch(PDO::FETCH_ASSOC)['total'];

                                $total_pages = ceil($total_students / $limit);
                                if ($students_paginated) {

                                    echo "<div class='data'><span class='data-title'>Name</span>";
                                    foreach ($students_paginated as $student) {
                                        echo "<span class='data-list'>{$student['fname']}</span>";
                                    }
                                    echo "</div><div class='data'><span class='data-title'>Email</span>";
                                    
                                    foreach ($students_paginated as $student) {
                                        echo "<span class='data-list'>{$student['student_id']}</span>";
                                    }
                                    echo "</div><div class='data'><span class='data-title'>Joined</span>";

                                    foreach ($students_paginated as $student) {
                                        echo "<span class='data-list'>{$student['date_of_birth']}</span>";
                                    }
                                    echo "</div><div class='data'><span class='data-title'>Type</span>";

                                    foreach ($students_paginated as $student) {
                                        echo "<span class='data-list'>{$student['status']}</span>";
                                    }
                                    echo "</div><div class='data'><span class='data-title'>Status</span>";

                                    foreach ($students_paginated as $student) {
                                        echo "<span class='data-list'>{$student['note']}</span>";
                                    }
                                    echo "</div>";




                                    // Pagination links
                                    echo "<div aria-label='Page navigation example'>";
                                    echo "<ul class='pagination justify-content-center'>";

                                    if ($total_pages > 1) {
                                        // Previous button
                                        if ($page > 1) {
                                            $prev_page = $page - 1;
                                            echo "<li class='page-item'><a class='page-link' href='?page=$prev_page'>Prev</a></li>";
                                        }

                                        // Always show page 1
                                        $active = $page == 1 ? 'active' : '';
                                        echo "<li class='page-item $active'><a class='page-link' href='?page=1'>1</a></li>";

                                        // Add "..." if current page > 5
                                        if ($page > 5) {
                                            echo "<li class='page-item disabled'><a class='page-link'>...</a></li>";
                                        }

                                        // Pages around current (4 before and 4 after)
                                        for ($i = max(2, $page - 4); $i <= min($total_pages - 1, $page + 4); $i++) {
                                            $active = $i == $page ? 'active' : '';
                                            echo "<li class='page-item $active'><a class='page-link' href='?page=$i'>$i</a></li>";
                                        }

                                        // Add "..." if current page < total_pages - 4
                                        if ($page < $total_pages - 4) {
                                            echo "<li class='page-item disabled'><a class='page-link'>...</a></li>";
                                        }

                                        // Always show last page if total_pages > 1
                                        if ($total_pages > 1) {
                                            $active = $page == $total_pages ? 'active' : '';
                                            echo "<li class='page-item $active'><a class='page-link' href='?page=$total_pages'>$total_pages</a></li>";
                                        }

                                        // Next button
                                        if ($page < $total_pages) {
                                            $next_page = $page + 1;
                                            echo "<li class='page-item'><a class='page-link' href='?page=$next_page'>Next</a></li>";
                                        }
                                    }

                                    echo "</ul>";
                                    echo "</div>";
                                } else {
                                    echo "<div class='alert alert-info .w-450 m-5' role='alert'>Empty!</div>";
                                }
                                ?>

                            </div>
                        </div>

                    <?php
                } else {
                    ?>
                        <div class="alert alert-info .w-450 m-5" role="alert">
                            Không có sinh viên!
                        </div>
                    <?php } ?>
                    </div>
                </section>

                <script src="../js/bootstrap.bundle.min.js"></script>
                <script src="../js/scripts.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const navLinks = document.querySelectorAll("#navLinks a:nth-child(3)");
                        if (navLinks.length > 0) {
                            navLinks[0].classList.add('active');
                        }
                        document.head.appendChild(style);
                    });
                </script>

            </body>

            </html>
    <?php

    } else {
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}
    ?>