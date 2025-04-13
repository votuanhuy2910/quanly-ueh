<?php
include "DB_connection.php";
include "data/setting.php";
$admin = getSetting($conn);

if ($admin != 0) {

?>
    <?php
    include "req/header.php";
    ?>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <body>
        <!-- <body class="body-login"> -->
        <div>
            <div class="d-flex justify-content-center align-items-center flex-column">
                <form class="login"
                    method="post"
                    action="req/other_login.php">

                    <h3>ĐĂNG NHẬP</h3>
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_GET['error'] ?>
                        </div>
                    <?php } ?>
                    <div class="mb-3">
                        <label class="form-label">Tài khoản:</label>
                        <input type="text"
                            class="form-control"
                            name="uname">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mật khẩu:</label>
                        <input type="password"
                            class="form-control"
                            name="pass">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Đăng nhập với:</label>
                        <select class="form-control"
                            name="role">
                            <option value="1">Admin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </form>

                <br /><br />
                <div class="text-center">
                    Copyright &copy; 2025 VTH-UEH
                </div>

            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>


    </html>
<?php
} else {
    header("Location: index.php");
    exit;
}  ?>