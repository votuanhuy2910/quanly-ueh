<?php
session_start();
if (
  isset($_SESSION['admin_id']) &&
  isset($_SESSION['role'])
) {

  if ($_SESSION['role'] == 'Admin') {
    if (isset($_GET['searchKey'])) {
      $students = []; // Không tìm thấy dữ liệu
      // $search_key = $_GET['searchKey'];
      $search_key = trim($_GET['searchKey']); // Xóa khoảng trắng đầu cuối

      if ($search_key === '') {
        echo "<script>alert('Vui lòng nhập từ khóa tìm kiếm!');
            window.history.back();
              </script>";
      } else {
        include "../DB_connection.php";
        include "data/student.php";
        $students = searchStudents($search_key, $conn);

        if (empty($students)) {
          echo "<script>alert('Không tìm thấy sinh viên!');
              window.history.back();
                </script>";
        }
      }


      // include "../DB_connection.php";
      // include "data/student.php";
      // include "data/fee.php";
      // $students = searchStudents($search_key, $conn);
?>
      <?php
      include "req/header.php";
      ?>

      <body>
        <?php
        include "inc/navbar.php";
        if ($students != 0) {
        ?>
          <div class="mt-5">
            <a href="student.php" class="btn btn-dark">Quay lại</a>

            <?php if (isset($_GET['error'])) { ?>
              <div class="alert alert-danger mt-3 n-table" role="alert">
                <?= $_GET['error'] ?>
              </div>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
              <div class="alert alert-info mt-3 n-table" role="alert">
                <?= $_GET['success'] ?>
              </div>
            <?php } ?>

            <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table" style="max-width: 1600px;">
                <thead>
                  <tr style="text-align: center;">
                    <th scope='col'>STT</th>
                    <th scope='col'>ID Nhập học</th>
                    <th scope='col'>MSSV</th>
                    <th scope='col'>Họ và tên</th>
                    <th scope='col'>Ngày sinh</th>
                    <th scope='col'>Khoá học</th>
                    <th scope='col'>Khoá gốc</th>
                    <th scope='col'>Mã hồ sơ</th>
                    <th scope='col'>Số vào sổ</th>
                    <th scope='col'>Ngày tốt nghiệp</th>
                    <th scope='col'>Tình trạng</th>
                    <th scope='col'>Lý do <br> (đã rút hồ sơ)</th>
                    <th scope='col'>Ghi chú</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($students as $student) {
                    $std_id = $student['student_id'];
                  ?>
                    <tr>
                      <td style="text-align: center;border: 1px solid #ddd; padding: 8px;"><?= $student['student_id'] ?></td>
                      <td style="text-align: center;border: 1px solid #ddd; padding: 8px;"><?= $student['admission_num'] ?></td>
                      <td style="text-align: center;border: 1px solid #ddd; padding: 8px;"><?= $student['mssv'] ?></td>
                      <td style="border: 1px solid #ddd; padding: 8px;">
                        <a href="student-view.php?student_id=<?= $student['student_id'] ?>" style="text-decoration: none;">
                          <?= $student['fname'] ?>
                        </a>
                      </td>
                      <td style="text-align: center;border: 1px solid #ddd; padding: 8px;">
                        <?= date('d-m-Y', strtotime($student['date_of_birth'])) ?>
                      </td>
                      <td style="text-align: center;border: 1px solid #ddd; padding: 8px;"><?= $student['course'] ?></td>
                      <td style="text-align: center;border: 1px solid #ddd; padding: 8px;"><?= $student['course_ori'] ?></td>
                      <td style="text-align: center;border: 1px solid #ddd; padding: 8px;"><?= $student['profile_num'] ?></td>
                      <td style="text-align: center;border: 1px solid #ddd; padding: 8px;"><?= $student['bookgraduate_num'] ?></td>
                      <td style="text-align: center;border: 1px solid #ddd; padding: 8px;"><?= (!empty($student['date_graduate']) ? date('d-m-Y', strtotime($student['date_graduate'])) : '') ?></td>
                      <td style="border: 1px solid #ddd; padding: 8px;"><?= $student['status'] ?></td>
                      <td style="border: 1px solid #ddd; padding: 8px;"><?= $student['note'] ?></td>
                      <td style="border: 1px solid #ddd; padding: 8px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis;max-width: 200px;"><?= $student['note_special'] ?></td>

                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          <?php } else { ?>
            <div class="alert alert-info .w-450 m-5" role="alert">
              Không tìm thấy thông tin sinh viên
              <a href="student.php" class="btn btn-dark">Quay lại</a>
            </div>
          <?php } ?>
          </div>

          <script src="../js/bootstrap.bundle.min.js"></script>
          <script>
            document.addEventListener("DOMContentLoaded", function() {
              // const navLinks = document.querySelectorAll("#navLinks li:nth-child(1) a");
              const navLinks = document.querySelectorAll("#navLinks a:nth-child(1)");
              if (navLinks.length > 0) {
                navLinks[0].classList.add('active');
              }
            });
          </script>
      </body>

      </html>
<?php
    } else {
      header("Location: student.php");
      exit;
      // $students = [];
    }
  } else {
    header("Location: ../login.php");
    exit;
  }
} else {
  header("Location: ../login.php");
  exit;
}

?>