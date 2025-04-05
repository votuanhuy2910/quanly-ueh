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



    $student_id = $_GET['student_id'];
    $student = getStudentById($student_id, $conn);

    if ($student == 0) {
      header("Location: student.php");
      exit;
    }


?>
    <?php
    include "req/header.php";
    ?>

    <body>
      <?php
      include "inc/navbar.php";
      ?>
      <div class="container mt-5">
        <a href="student.php"
          class="btn btn-dark">Quay lại</a>

        <form method="post"
          class="shadow p-3 mt-5 form-w"
          action="req/student-edit.php">
          <h3>Chỉnh sửa thông tin sinh viên</h3>
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
            <label class="form-label">Họ và tên đệm</label>
            <input type="text"
              class="form-control"
              value="<?= $student['fname'] ?>"
              name="fname">
          </div>
          <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text"
              class="form-control"
              value="<?= $student['lname'] ?>"
              name="lname">
          </div>
          <div class="mb-3">
            <label class="form-label">Mã số sinh viên</label>
            <input type="text"
              class="form-control"
              value="<?= $student['mssv'] ?>"
              name="mssv"
              disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">ID Nhập học</label>
            <input type="text"
              class="form-control"
              value="<?= $student['admission_num'] ?>"
              name="admission_num"
              disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">Ngày/Tháng/Năm sinh</label>
            <input type="date"
              class="form-control"
              value="<?= $student['date_of_birth'] ?>"
              name="date_of_birth">
          </div>
          <div class="mb-3">
            <label class="form-label">Giới tính</label><br>
            <input type="radio"
              value="Nam"
              <?php if ($student['gender'] == 'Nam') echo 'checked';  ?>
              name="gender"> Nam
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio"
              value="Nữ"
              <?php if ($student['gender'] == 'Nữ') echo 'checked';  ?>
              name="gender"> Nữ
          </div>

          <div class="mb-3">
            <label class="form-label">Khóa học</label>
            <select class="form-control" name="course">
              <option <?php if ($student['course'] == "K51") echo "selected"; ?>>K51</option>
              <option <?php if ($student['course'] == "K50") echo "selected"; ?>>K50</option>
              <option <?php if ($student['course'] == "K49") echo "selected"; ?>>K49</option>
              <option <?php if ($student['course'] == "K48") echo "selected"; ?>>K48</option>
              <option <?php if ($student['course'] == "K47") echo "selected"; ?>>K47</option>
              <option <?php if ($student['course'] == "K46") echo "selected"; ?>>K46</option>
              <option <?php if ($student['course'] == "K45") echo "selected"; ?>>K45</option>
              <option <?php if ($student['course'] == "K44") echo "selected"; ?>>K44</option>
              <option <?php if ($student['course'] == "K43") echo "selected"; ?>>K43</option>

            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Tình trạng</label>
            <select class="form-control" name="status">
              <option <?php if ($student['status'] == "Còn học") echo "selected"; ?>>Còn học</option>
              <option <?php if ($student['status'] == "Chuyển trường") echo "selected"; ?>>Chuyển trường</option>
              <option <?php if ($student['status'] == "Nghỉ học tạm thời") echo "selected"; ?>>Nghỉ học tạm thời</option>
              <option <?php if ($student['status'] == "Buộc thôi học") echo "selected"; ?>>Buộc thôi học</option>
              <option <?php if ($student['status'] == "Thôi học") echo "selected"; ?>>Thôi học</option>
              <option <?php if ($student['status'] == "Tốt nghiệp") echo "selected"; ?>>Thôi học</option>
              <option <?php if ($student['status'] == "Không nhập học") echo "selected"; ?>>Thôi học</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Lý do</label>
            <input type="text"
              class="form-control"
              value="<?= $student['note'] ?>"
              name="note">
          </div>
          <hr>
          <input type="text"
            value="<?= $student['student_id'] ?>"
            name="student_id" hidden>

          <button type="submit" class="btn btn-primary">
            Cập nhật
          </button>
          <a href="student.php"
            class="btn btn-dark">Quay lại</a>
        </form>
      </div>

      <script src="../js/bootstrap.bundle.min.js"></script>
      <script>
        // $(document).ready(function() {
        //   $("#navLinks li:nth-child(3) a").addClass('active');
        // });
      </script>

    </body>

    </html>
<?php

  } else {
    header("Location: student.php");
    exit;
  }
} else {
  header("Location: student.php");
  exit;
}

?>