<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])     &&
    isset($_GET['student_id'])
) {

    if ($_SESSION['role'] == 'Admin') {
        include "../DB_connection.php";
        include "data/student.php";

        $id = $_GET['student_id'];
        if (removeStudentK48($id, $conn)) {
            $sm = "Xóa thành công!";
            header("Location: k48-student.php?success=$sm");
            exit;
        } else {
            $em = "Xảy ra lỗi!";
            header("Location: k48-student.php?error=$em");
            exit;
        }
    } else {
        header("Location: k48-student.php");
        exit;
    }
} else {
    header("Location: teacher.php");
    exit;
}
