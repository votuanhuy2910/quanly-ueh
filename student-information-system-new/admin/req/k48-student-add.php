<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {


        if (
            isset($_POST['admission_num']) &&
            isset($_POST['mssv'])  &&
            isset($_POST['fname']) &&
            isset($_POST['lname']) &&
            isset($_POST['date_of_birth']) &&
            isset($_POST['course']) &&
            isset($_POST['gender'])   &&
            isset($_POST['status'])  &&
            isset($_POST['note'])
        ) {

            include '../../DB_connection.php';
            include "../data/student.php";

            $admission_num = $_POST['admission_num'];
            $mssv = $_POST['mssv'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $date_of_birth = $_POST['date_of_birth'];
            $course = $_POST['course'];
            $gender = $_POST['gender'];
            $status = $_POST['status'];
            $note = $_POST['note'];

            $data = 'admission_num=' . $admission_num . '&mssv=' . $mssv . '&fname=' . $fname . '&lname=' . $lname . '&course=' . $course . '&gender=' . '&status=' . $status . '&note=' . $note;

            if (empty($admission_num)) {
                $em  = "ID Nhập học không được bỏ trống";
                header("Location: ../k48-student-add.php?error=$em&$data");
                exit;
            }
            if (!unameIsUniqueK48($admission_num, $mssv, $conn)) {
                $em  = "ID Nhập học đã tồn tại!";
                header("Location: ../k48-student-add.php?error=$em&$data");
                exit;
            }

            if (empty($mssv)) {
                $em  = "MSSV không được bỏ trống";
                header("Location: ../k48-student-add.php?error=$em&$data");
                exit;
            }

            $sql = "SELECT student_id FROM students WHERE mssv = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$mssv]);

            if ($stmt->rowCount() > 0) {
                $em  = "MSSV đã tồn tại!";
                header("Location: ../k48-student-add.php?error=$em&$data");
                exit;
            }

            if (empty($fname)) {
                $em  = "First name không được bỏ trống";
                header("Location: ../k48-student-add.php?error=$em&$data");
                exit;
            } else if (empty($lname)) {
                $em  = "Last name không được bỏ trống";
                header("Location: ../k48-student-add.php?error=$em&$data");
                exit;
            } else if (empty($date_of_birth)) {
                $em  = "Date of birth không được bỏ trống";
                header("Location: ../k48-student-add.php?error=$em&$data");
                exit;
            } else if (empty($course)) {
                $em  = "Course không được bỏ trống";
                header("Location: ../k48-student-add.php?error=$em&$data");
                exit;
            } else if (empty($gender)) {
                $em  = "Gender không được bỏ trống";
                header("Location: ../k48-student-add.php?error=$em&$data");
                exit;
            } else if (empty($status)) {
                $em  = "Status không được bỏ trống";
                header("Location: ../k48-student-add.php?error=$em&$data");
                exit;
            } else {
                // hashing the password
                // $pass = password_hash($pass, PASSWORD_DEFAULT);
                $sql  = "INSERT INTO
                students48(admission_num, mssv, fname, lname, date_of_birth, course, gender, status, note)
                VALUES(?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$admission_num, $mssv, $fname, $lname, $date_of_birth, $course, $gender, $status, $note]);
                $sm = "Thêm sinh viên mới thành công";
                header("Location: ../k48-student-add.php?success=$sm");
                exit;
            }
        } else {
            $em = "Xảy ra lỗi!";
            header("Location: ../k48-student-add.php?error=$em");
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
