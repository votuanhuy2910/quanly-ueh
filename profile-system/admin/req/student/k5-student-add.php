<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {


        if (
            isset($_POST['admission_num']) &&
            isset($_POST['profile_num']) &&
            isset($_POST['mssv'])  &&
            isset($_POST['fname']) &&
            isset($_POST['date_of_birth']) &&
            isset($_POST['gender']) &&
            isset($_POST['course']) &&
            isset($_POST['course_ori'])   &&
            isset($_POST['status'])  &&
            isset($_POST['note']) &&
            isset($_POST['note_special'])
        ) {

            include '../../DB_connection.php';
            include "../data/student.php";

            $admission_num = $_POST['admission_num'];
            $profile_num = $_POST['profile_num'];
            $mssv = $_POST['mssv'];
            $fname = $_POST['fname'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender = $_POST['gender'];
            $course = $_POST['course'];
            $courseOri = $_POST['course_ori'];
            $status = $_POST['status'];
            $note = $_POST['note'];
            $noteSpecial = $_POST['note_special'];

            $data = 'admission_num=' . $admission_num . 'profile_num=' . $profile_num . '&mssv=' . $mssv . '&fname=' . $fname . '&gender=' . '&course=' . $course . '&course_ori=' . $courseOri . '&status=' . $status . '&note=' . $note . '&note_special=' . $noteSpecial;

            if (empty($admission_num)) {
                $em  = "ID Nhập học không được bỏ trống";
                header("Location: ../k5-student-add.php?error=$em&$data");
                exit;
            }

            if (!unameIsUnique($admission_num, $profile_num, $mssv, $conn)) {
                $em  = "ID Nhập học đã tồn tại!";
                header("Location: ../k5-student-add.php?error=$em&$data");
                exit;
            }

            if (empty($profile_num)) {
                $em  = "Mã hồ sơ không được bỏ trống";
                header("Location: ../k5-student-add.php?error=$em&$data");
                exit;
            }

            $sql = "SELECT student_id FROM students5 WHERE profile_num = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$profile_num]);

            if ($stmt->rowCount() > 0) {
                $em  = "Mã hồ sơ đã tồn tại!";
                header("Location: ../k5-student-add.php?error=$em&$data");
                exit;
            }

            if (empty($mssv)) {
                $em  = "MSSV không được bỏ trống";
                header("Location: ../k5-student-add.php?error=$em&$data");
                exit;
            }

            $sql = "SELECT student_id FROM students5 WHERE mssv = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$mssv]);

            if ($stmt->rowCount() > 0) {
                $em  = "MSSV đã tồn tại!";
                header("Location: ../k5-student-add.php?error=$em&$data");
                exit;
            }

            if (empty($fname)) {
                $em  = "Họ và tên không được bỏ trống";
                header("Location: ../k5-student-add.php?error=$em&$data");
                exit;
            } else if (empty($date_of_birth)) {
                $em  = "Ngày sinh không được bỏ trống";
                header("Location: ../k5-student-add.php?error=$em&$data");
                exit;
            } else if (empty($gender)) {
                $em  = "Vui lòng chọn Giới tính!";
                header("Location: ../k5-student-add.php?error=$em&$data");
                exit;
            } else if (empty($course)) {
                $em  = "Vui lòng chọn Khóa học!";
                header("Location: ../k5-student-add.php?error=$em&$data");
                exit;
            } else if (empty($courseOri)) {
                $em  = "Vui lòng chọn Khóa học gốc!";
                header("Location: ../k5-student-add.php?error=$em&$data");
                exit;
            } else if (empty($status)) {
                $em  = "Vui lòng chọn Tình trạng!";
                header("Location: ../k5-student-add.php?error=$em&$data");
                exit;
            } else {
                // hashing the password
                // $pass = password_hash($pass, PASSWORD_DEFAULT);
                $sql  = "INSERT INTO
                students5(admission_num, profile_num, mssv, fname, date_of_birth, gender, course, course_ori, status, note, note_special)
                VALUES(?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$admission_num, $profile_num, $mssv, $fname, $date_of_birth, $gender, $course, $courseOri, $status, $note, $noteSpecial]);
                $sm = "Thêm sinh viên mới thành công";
                header("Location: ../k5-student.php?success=$sm");
                exit;
            }
        } else {
            $em = "Xảy ra lỗi!";
            header("Location: ../k5-student-add.php?error=$em");
            exit;
        }
    } else {
        header("Location: ../../logout.php");
        exit;
    }
} else {
    header("Location: ../../logout.php");
    exit;
}
