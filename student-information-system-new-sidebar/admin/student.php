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
    ?>

    <body>
      <?php
      include "inc/navbar.php";
      if ($students != 0) {
      ?>
        <div class="container mt-5" style="max-width: 1600px;">
          <nav style="display: flex; align-items: flex-start; justify-content: space-evenly;">
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
          </nav>

          <hr>

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
            echo "<table class='table table-bordered mt-3 n-table table-striped table-hover' style='max-width: 1600px;'>";
            echo "<thead>
                  <tr style='text-align: center;'>
                    <th scope='col'>STT</th>
                    <th scope='col'>ID Nhập học</th>
                    <th scope='col'>MSSV</th>
                    <th scope='col'>Họ và tên</th>
                    <th scope='col'>Ngày sinh</th>
                    <th scope='col'>Khoá học</th>
                    <th scope='col'>Khoá gốc</th>
                    <th scope='col'>Mã hồ sơ</th>
                    <th scope='col'>Số vào sổ</th>
                    <th scope='col'>Ngày tốt nghiệp</th>
                    <th scope='col'>Tình trạng</th>
                    <th scope='col'>Lý do <br> (đã rút hồ sơ)</th>
                    <th scope='col'>Ghi chú</th>
                    <th scope='col'>Action</th>
                  </tr>
                </thead>";
            echo "<tbody>";
            foreach ($students_paginated as $student) {
              echo "<tr>
                      <td style='text-align: center;border: 1px solid #ddd; padding: 8px;'>{$student['student_id']}</td>
                      <td style='text-align: center;border: 1px solid #ddd; padding: 8px;'>{$student['admission_num']}</td>
                      <td style='text-align: center;border: 1px solid #ddd; padding: 8px;'>{$student['mssv']}</td>
                      <td style='text-align: center;border: 1px solid #ddd; padding: 8px;'><a href='student-view.php?student_id={$student['student_id']}' style='text-decoration: none; text-transform: capitalize; color: #007bff'>{$student['fname']}</a></td>
                      <td style='text-align: center;'>" . date('d-m-Y', strtotime($student['date_of_birth'])) . "</td>
                      <td style='text-align: center;border: 1px solid #ddd; padding: 8px;'>{$student['course']}</td>
                      <td style='text-align: center;border: 1px solid #ddd; padding: 8px;'>{$student['course_ori']}</td>
                      <td style='text-align: center;border: 1px solid #ddd; padding: 8px;'>{$student['profile_num']}</td>
                      <td style='text-align: center;border: 1px solid #ddd; padding: 8px;'>{$student['bookgraduate_num']}</td>
                      <td style='text-align: center;border: 1px solid #ddd; padding: 8px;'>" . (!empty($student['date_graduate']) ? date('d-m-Y', strtotime($student['date_graduate'])) : '') . "</td>
                      <td style='text-align: center;border: 1px solid #ddd; padding: 8px;'>{$student['status']}</td>
                      <td style='text-align: center;border: 1px solid #ddd; padding: 8px;'>{$student['note']}</td>
                      <td style='text-align: center;border: 1px solid #ddd; padding: 8px; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;max-width: 160px;'>{$student['note_special']}</td>
                      <td style='display: flex; align-items: center; justify-content: space-evenly; border-right: 1px solid #ddd; padding: 8px;'>
                        <a href='student-edit.php?student_id={$student['student_id']}' class='btn btn-warning'>Edit</a>
                        <a href='student-delete.php?student_id={$student['student_id']}' class='btn btn-danger'>Delete</a>
                      </td>
                  </tr>";
            }
            echo "</tbody>";
            echo "</table>";

            // Pagination links
            echo "<nav aria-label='Page navigation example'>";
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
            echo "</nav>";
          } else {
            echo "<div class='alert alert-info .w-450 m-5' role='alert'>Empty!</div>";
          }
          ?>

        <?php
      } else {
        ?>
          <div class="alert alert-info .w-450 m-5" role="alert">
            Không có sinh viên!
          </div>
        <?php } ?>
        </div>

        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/scripts.js"></script>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            const navLinks = document.querySelectorAll("#navLinks a:nth-child(2)");
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