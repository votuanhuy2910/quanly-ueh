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

            $student = getStudentByIdK48($student_id, $conn);
?>
            <?php
            include "req/header.php";
            ?>

            <body>
                <?php
                include "inc/navbar.php";
                if ($student != 0) {
                ?>
                    <div class="container mt-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="card w-50 mb-5 justify-content-center align-items-center">
                                <div class="w-25 mt-5">
                                    <img src="../img/student-<?= $student['gender'] ?>.png" class="card-img-top" alt="...">
                                </div>

                                <div class="card-body w-75">
                                    <h5 class="card-title text-center"><?= $student['fname'] . " " . $student['lname'] ?></h5>
                                </div>

                                <div class="card-body w-100">
                                    <ul class="list-group list-group-flush ">
                                        <li class="list-group-item">ID Nhập học: <?= $student['admission_num'] ?></li>
                                        <li class="list-group-item">MSSV: <?= $student['mssv'] ?></li>
                                        <li class="list-group-item">Ngày sinh: <?= date('d-m-Y', strtotime($student['date_of_birth'])) ?></li>
                                        <li class="list-group-item">Giới tính: <?= $student['gender'] ?></li>
                                        <li class="list-group-item">Khóa: <?= $student['course'] ?></li>
                                        <li class="list-group-item">Tình trạng: <?= $student['status'] ?></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <a href="k48-student.php" class="card-link btn bg-primary text-white">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                    header("Location: k48-student.php");
                    exit;
                }
                ?>

                <script src="../js/bootstrap.bundle.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $("#navLinks li:nth-child(6) a").addClass('active');
                    });
                </script>

            </body>

            </html>
<?php

        } else {
            header("Location: k48-student.php");
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