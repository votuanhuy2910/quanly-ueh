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
                $em  = "ID Nhập học is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($mssv)) {
                $em  = "MSSV is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($fname)) {
                $em  = "First name is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($lname)) {
                $em  = "Last name is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($date_of_birth)) {
                $em  = "Date of birth is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($course)) {
                $em  = "Course is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($gender)) {
                $em  = "Gender is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            } else if (empty($status)) {
                $em  = "Status is required";
                header("Location: ../student-add.php?error=$em&$data");
                exit;
            }
            // else if ($note) {
            //     $em  = "Note is required";
            //     header("Location: ../student-add.php?error=$em&$data");
            //     exit;
            // } 
            else {
                // hashing the password
                // $pass = password_hash($pass, PASSWORD_DEFAULT);
                $sql  = "INSERT INTO
                 students(admission_num, mssv, fname, lname, date_of_birth, course, gender, status, note)
                 VALUES(?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$admission_num, $mssv, $fname, $lname, $date_of_birth, $course, $gender, $status, $note]);
                $sm = "New student registered successfully";
                header("Location: ../student-add.php?success=$sm");
                exit;
            }
        } else {
            $em = "An error occurred";
            header("Location: ../student-add.php?error=$em");
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
