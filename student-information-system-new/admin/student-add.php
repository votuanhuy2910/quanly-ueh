<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {

        include "../DB_connection.php";

        $admission_num = '';
        $mssv = '';
        $fname = '';
        $lname = '';
        // $uname = '';
        $course = '';
        $status = '';
        $note = '';

        if (isset($_GET['admission_num'])) $admission_num = $_GET['admission_num'];
        if (isset($_GET['mssv'])) $mssv = $_GET['mssv'];
        if (isset($_GET['fname'])) $fname = $_GET['fname'];
        if (isset($_GET['lname'])) $lname = $_GET['lname'];
        // if (isset($_GET['uname'])) $uname = $_GET['uname'];
        if (isset($_GET['course'])) $course = $_GET['course'];
        if (isset($_GET['status'])) $status = $_GET['status'];
        if (isset($_GET['note'])) $note = $_GET['note'];
?>
        <?php
        include "req/header.php";
        ?>


        <body>
            <?php
            include "inc/navbar.php";
            ?>
            <div class="container mt-5">
                <a href="student.php" class="btn btn-dark">Quay lại</a>

                <form method="post" class="shadow p-3 mt-5 form-w" action="req/student-add.php">
                    <h3>Thêm sinh viên mới</h3>
                    <hr>
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_GET['error'] ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET['success'])) { ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_GET['success'] ?>
                        </div>
                    <?php } ?>
                    <div class="mb-3">
                        <label class="form-label">ID Nhập học</label>
                        <input type="text" class="form-control" value="<?= $admission_num ?>" name="admission_num">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mã số sinh viên</label>
                        <input type="text" class="form-control" value="<?= $mssv ?>" name="mssv">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Họ và tên đệm</label>
                        <input type="text" class="form-control" value="<?= $fname ?>" name="fname">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tên</label>
                        <input type="text" class="form-control" value="<?= $lname ?>" name="lname">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ngày/Tháng/Năm sinh</label>
                        <input type="date" class="form-control" name="date_of_birth">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Giới tính</label><br>
                        <input type="radio" value="Nam" checked name="gender"> Nam
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" value="Nữ" name="gender"> Nữ
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Khoá học</label>
                        <select class="form-control" name="course">
                            <?php
                            $courseList = array("K51", "K50", "K49", "K48", "K47", "K46", "K45", "K44", "K43");
                            foreach ($courseList as $course) {
                                echo "<option value='$course'>$course</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label class="form-label">Tình trạng</label>
                        <select class="form-control" name="status">
                            <?php
                            $statusList = array("Còn học", "Thôi học", "Buộc thôi học", "Bảo lưu", "Chuyển trường");
                            foreach ($statusList as $status) {
                                echo "<option value='$status'>$status</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lý do</label>
                        <input type="text" class="form-control" value="<?= $note ?>" name="note">
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="student.php" class="btn btn-dark">Quay lại</a>
                </form>
            </div>

            <script src="../js/bootstrap.bundle.min.js"></script>
            <script>
                // $(document).ready(function() {
                //     $("#navLinks li:nth-child(3) a").addClass('active');
                // });
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