<?php
session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {

    if ($_SESSION['role'] == 'Admin') {
?>
        <?php
        include "req/header.php";
        ?>

        <body>
            <?php
            include "inc/navbar.php";
            ?>
            <div class="container mt-5">
                <div class="container text-center">
                    <div class="row row-cols-4">
                        <a href="student.php" class="col btn btn-dark m-2 py-3">
                            <i class="fa fa-graduation-cap fs-1" aria-hidden="true"></i><br>
                            Thống kê số lượng hồ sơ
                        </a>
                        <a href="../logout.php" class="col btn btn-warning m-2 py-3">
                            <i class="fa fa-sign-out fs-1" aria-hidden="true"></i><br>
                            Đăng xuất
                        </a>
                    </div>
                </div>
            </div>

            <script src="../js/bootstrap.bundle.min.js"></script>
            <script>
                // $(document).ready(function() {
                //     $("#navLinks li:nth-child(1) a").addClass('active');
                // });
            </script>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const navLinks = document.querySelectorAll("#navLinks li:nth-child(1) a");
                    if (navLinks.length > 0) {
                        navLinks[0].classList.add('active');
                    }

                    // Add custom CSS for the 'active' class
                    const style = document.createElement('style');
                    style.textContent = `
                        .active {
                        color: #fff !important;
                        background-color: #007bff !important;
                        border-radius: 5px;
                        }
                    `;
                    document.head.appendChild(style);
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