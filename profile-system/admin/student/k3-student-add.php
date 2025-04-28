<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {

        include "../DB_connection.php";

        $admission_num = '';
        $profile_num = '';
        $mssv = '';
        $fname = '';
        // $uname = '';
        $course = '';
        $courseOri = '';
        $status = '';
        $note = '';
        $noteSpecial = '';

        if (isset($_GET['admission_num'])) $admission_num = $_GET['admission_num'];
        if (isset($_GET['profile_num'])) $profile_num = $_GET['profile_num'];
        if (isset($_GET['mssv'])) $mssv = $_GET['mssv'];
        if (isset($_GET['fname'])) $fname = $_GET['fname'];
        // if (isset($_GET['uname'])) $uname = $_GET['uname'];
        if (isset($_GET['course'])) $course = $_GET['course'];
        if (isset($_GET['course_ori'])) $courseOri = $_GET['course_ori'];
        if (isset($_GET['status'])) $status = $_GET['status'];
        if (isset($_GET['note'])) $note = $_GET['note'];
        if (isset($_GET['note_special'])) $note = $_GET['note_special'];
?>
        <?php
        include "req/header.php";
        ?>


        <body>
            <?php
            include "inc/navbar.php";
            ?>
            <div class="mt-5">
                <a href="k3-student.php" class="btn btn-dark">Quay lại</a>

                <form method="post" class="shadow p-3 mt-5 form-w" action="req/k3-student-add.php">
                    <h1>THÊM SINH VIÊN MỚI</h1>
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
                        <label class="form-label fw-bold">ID Nhập học</label>
                        <input type="text" class="form-control" value="<?= $_GET['admission_num'] ?? '' ?>" name="admission_num">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Mã hồ sơ</label>
                        <input type="text" class="form-control" value="<?= $_GET['profile_num'] ?? '' ?>" name="profile_num">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Mã số sinh viên</label>
                        <input type="text" class="form-control" value="<?= $_GET['mssv'] ?? '' ?>" name="mssv">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Họ và tên</label>
                        <input type="text" class="form-control" value="<?= $fname ?>" name="fname">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Ngày/Tháng/Năm sinh</label>
                        <input type="date" class="form-control" name="date_of_birth">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Giới tính</label><br>
                        <input type="radio" value="Nam" checked name="gender"> Nam
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" value="Nữ" name="gender"> Nữ
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Khoá học</label>
                        <select class="form-control" name="course">
                            <?php
                            $courseList = array("K51", "K50", "K49", "K48", "K47", "K46", "K45", "K44", "K43");
                            foreach ($courseList as $course) {
                                echo "<option value='$course'>$course</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Khoá gốc</label>
                        <select class="form-control" name="course_ori">
                            <?php
                            $courseOriList = array("K51", "K50", "K49", "K48", "K47", "K46", "K45", "K44", "K43");
                            foreach ($courseOriList as $courseOri) {
                                echo "<option value='$courseOri'>$courseOri</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tình trạng</label>
                        <select class="form-control" name="status">
                            <?php
                            $statusList = array("Còn học", "Thôi học", "Buộc thôi học", "Nghỉ học tạm thời", "Chuyển trường", "Tốt nghiệp", "Không nhập học");
                            foreach ($statusList as $status) {
                                echo "<option value='$status'>$status</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Lý do (rút hồ sơ)</label>
                        <input type="text" class="form-control" value="<?= $note ?>" name="note">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Ghi chú</label>
                        <input type="text" class="form-control" value="<?= $noteSpecial ?>" name="note_special">
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="k3-student.php" class="btn btn-dark">Quay lại</a>
                </form>
            </div>

            <script src="../js/bootstrap.bundle.min.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // const navLinks = document.querySelectorAll("#navLinks li:nth-child(2) a");
                    const navLinks = document.querySelectorAll("#navLinks a:nth-child(6)");
                    if (navLinks.length > 0) {
                        navLinks[0].classList.add('active');
                    }
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