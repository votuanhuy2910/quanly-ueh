<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {
        include "../DB_connection.php";
        include "data/student.php";

        if (isset($_GET['student_id'])) {

            $student_id = $_GET['student_id'];

            $student = getStudentById6($student_id, $conn);
?>
            <?php
            include "req/header.php";
            ?>

            <body>
                <?php
                include "inc/navbar.php";
                if ($student != 0) {
                ?>
                    <div class="mt-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="card w-50 mb-5 justify-content-center align-items-center">
                                <div class="w-25 mt-5">
                                    <img src="../img/student-<?= $student['gender'] ?>.png" class="card-img-top" alt="...">
                                </div>

                                <div class="card-body w-75">
                                    <h5 class="card-title text-center fw-bold"><?= $student['fname'] ?></h5>
                                </div>

                                <div class="card-body w-100">
                                    <ul class="list-group list-group-flush ">
                                        <li class="list-group-item">MSSV: <span class="fw-bold"><?= $student['mssv'] ?></span></li>
                                        <li class="list-group-item">Ngày sinh: <span class="fw-bold"><?= date('d-m-Y', strtotime($student['date_of_birth'])) ?></span></li>
                                        <li class="list-group-item">Giới tính: <span class="fw-bold"><?= $student['gender'] ?></span></li>
                                        <li class="list-group-item">Khóa: <span class="fw-bold"><?= $student['course'] ?></span></li>
                                        <li class="list-group-item">Khóa gốc: <span class="fw-bold"><?= $student['course_ori'] ?></span></li>
                                        <li class="list-group-item">ID Nhập học: <span class="fw-bold"><?= $student['admission_num'] ?></span></li>
                                        <li class="list-group-item">Tình trạng: <span class="fw-bold"><?= $student['status'] ?></span></li>
                                        <li class="list-group-item">Lý do (rút hồ sơ): <span class="fw-bold"><?= $student['note'] ?></span></li>
                                        <li class="list-group-item">Ghi chú: <span class="fw-bold"><?= $student['note_special'] ?></span></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <a href="k6-student.php" class="card-link btn bg-primary text-white">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                    header("Location: k6-student.php");
                    exit;
                }
                ?>

                <script src="../js/bootstrap.bundle.min.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // const navLinks = document.querySelectorAll("#navLinks li:nth-child(2) a");
                        const navLinks = document.querySelectorAll("#navLinks a:nth-child(9)");
                        if (navLinks.length > 0) {
                            navLinks[0].classList.add('active');
                        }
                    });
                </script>

            </body>

            </html>
<?php

        } else {
            header("Location: k6-student.php");
            exit;
        }
    } else {
        header("Location: ../index.php");
        exit;
    }
} else {
    header("Location: ../index.php");
    exit;
}

?>