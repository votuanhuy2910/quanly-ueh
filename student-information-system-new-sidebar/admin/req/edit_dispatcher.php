<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {

        if (
            isset($_POST['student_id']) &&
            isset($_POST['fname']) &&
            isset($_POST['date_of_birth']) &&
            isset($_POST['course']) &&
            isset($_POST['gender']) &&
            isset($_POST['status']) &&
            isset($_POST['note']) &&
            isset($_POST['note_special'])
        ) {

            include '../../DB_connection.php';
            include "../data/student.php";

            $student_id = $_POST['student_id'];
            $fname = $_POST['fname'];
            $date_of_birth = $_POST['date_of_birth'];
            $course = $_POST['course'];
            $gender = $_POST['gender'];
            $status = $_POST['status'];
            $note = $_POST['note'];
            $noteSpecial = $_POST['note_special'];
            $data = 'student_id=' . $student_id;

            // Chuyển khóa vào tên bảng dựa theo quy ước students => K51, students1 => K50, ...
            function getTableByCourse($course)
            {
                $course = strtolower(trim($course));
                if (preg_match('/k(\d+)/', $course, $matches)) {
                    $year = (int)$matches[1];
                    $latest = 51;
                    $offset = $latest - $year;
                    if ($offset == 0) return 'students';
                    return 'students' . $offset;
                }
                return null;
            }

            function formatCourse($course)
            {
                $course = strtoupper(trim($course));
                if (strpos($course, 'K') === 0) {
                    return 'Khóa ' . substr($course, 1);
                }
                return $course;
            }

            $allTables = ['students', 'students1', 'students2', 'students3', 'students4', 'students5', 'students6', 'students7', 'students8'];
            $student = null;
            $current_table = null;

            foreach ($allTables as $table) {
                $student = getStudentByIdFromTable($student_id, $table, $conn);
                if ($student) {
                    $current_table = $table;
                    break;
                }
            }

            if (!$student || !$current_table) {
                $em = "Không tìm thấy sinh viên trong bất kỳ bảng nào!";
                header("Location: ../student.php?error=$em");
                exit;
            }

            if (empty($fname) || empty($date_of_birth) || empty($course) || empty($gender) || empty($status)) {
                $em = "Vui lòng điền đủ đủ thông tin!";
                header("Location: ../student-edit.php?error=$em&$data");
                exit;
            }

            $current_course = 'k' . (51 - (int)str_replace('students', '', $current_table));
            $new_course = strtolower($course);
            $new_table = getTableByCourse($new_course);

            if ($current_course !== $new_course) {
                try {
                    $conn->beginTransaction();

                    $sql_insert = "INSERT INTO $new_table 
                        (admission_num, mssv, fname, date_of_birth, course, gender, status, note, note_special, course_ori, profile_num, bookgraduate_num, date_graduate)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $stmt_insert = $conn->prepare($sql_insert);
                    $stmt_insert->execute([
                        $student['admission_num'],
                        $student['mssv'],
                        $student['fname'],
                        $date_of_birth,
                        strtoupper($new_course),
                        $gender,
                        $status,
                        $note,
                        $noteSpecial,
                        $student['course_ori'],
                        $student['profile_num'],
                        $student['bookgraduate_num'],
                        $student['date_graduate']
                    ]);

                    $sql_delete = "DELETE FROM $current_table WHERE student_id=?";
                    $stmt_delete = $conn->prepare($sql_delete);
                    $stmt_delete->execute([$student_id]);

                    $conn->commit();

                    $sm = "Sinh viên '" . ucwords(strtolower($student['fname'])) . "' (MSSV: " . $student['mssv'] . ") đã được chuyển từ " . formatCourse($current_course) . " sang " . formatCourse($new_course) . " thành công!";

                    header("Location: ../student.php?success=$sm");
                    exit;
                } catch (Exception $e) {
                    $conn->rollBack();
                    $em = "Lỗi khi chuyển dữ liệu: " . $e->getMessage();
                    header("Location: ../student-edit.php?error=$em&$data");
                    exit;
                }
            } else {
                $sql = "UPDATE $current_table SET
                            fname=?, date_of_birth=?, course=?, gender=?, status=?, note=?, note_special=?
                        WHERE student_id=?";

                $stmt = $conn->prepare($sql);
                $stmt->execute([$fname, $date_of_birth, $course, $gender, $status, $note, $noteSpecial, $student_id]);

                $sm = "Cập nhật thông tin thành công!";
                header("Location: ../student-edit.php?success=$sm&$data");
                exit;
            }
        } else {
            $em = "Thiếu dữ liệu!";
            header("Location: ../student.php?error=$em");
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
