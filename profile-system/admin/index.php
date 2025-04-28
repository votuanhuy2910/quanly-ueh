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
			<section class="dashboard">
				<!-- <div class="text-center mt-5 text">
                <h1 class="text-center">Chào mừng bạn đến với trang quản trị</h1>
                <div class="row row-cols-4">
                    <a href="#" class="col btn btn-dark m-2 py-3">
                        <i class="fa fa-graduation-cap fs-1" aria-hidden="true"></i><br>
                        Thống kê số lượng hồ sơ
                    </a>
                    <a href="../logout.php" class="col btn btn-warning m-2 py-3">
                        <i class="fa fa-sign-out fs-1" aria-hidden="true"></i><br>
                        Đăng xuất
                    </a>
                </div>
            </div> -->

				<div class="top">
					<i class="uil uil-bars sidebar-toggle"></i>
					<div class="input-box">
						<i class="uil uil-search"></i>
						<input type="text" placeholder="Search here..." />
						<button class="button">Search</button>
					</div>
				</div>

				<div class="dash-content">
					<div class="overview">
						<div class="title">
							<i class="uil uil-tachometer-fast-alt"></i>
							<span class="text">Dashboard</span>
						</div>
						<div class="boxes">
							<div class="box box1">
								<i class="uil uil-thumbs-up"></i>
								<span class="text">Total Likes</span>
								<span class="number">50,120</span>
							</div>
							<div class="box box2">
								<i class="uil uil-comments"></i>
								<span class="text">Comments</span>
								<span class="number">20,120</span>
							</div>
							<div class="box box3">
								<i class="uil uil-share"></i>
								<span class="text">Total Share</span>
								<span class="number">10,120</span>
							</div>
						</div>
					</div>
					
					<div class="activity">
						<div class="title">
							<i class="uil uil-clock-three"></i>
							<span class="text">Recent Activity</span>
						</div>
						<div class="activity-data">
							<div class="data names">
								<span class="data-title">Name</span>
								<span class="data-list">Prem Shahi</span>
								<span class="data-list">Deepa Chand</span>
								<span class="data-list">Manisha Chand</span>
								<span class="data-list">Pratima Shahi</span>
								<span class="data-list">Man Shahi</span>
								<span class="data-list">Ganesh Chand</span>
								<span class="data-list">Bikash Chand</span>
							</div>
							<div class="data email">
								<span class="data-title">Email</span>
								<span class="data-list">premshahi@gmail.com</span>
								<span class="data-list">deepachand@gmail.com</span>
								<span class="data-list">prakashhai@gmail.com</span>
								<span class="data-list">manishachand@gmail.com</span>
								<span class="data-list">pratimashhai@gmail.com</span>
								<span class="data-list">manshahi@gmail.com</span>
								<span class="data-list">ganeshchand@gmail.com</span>
							</div>
							<div class="data joined">
								<span class="data-title">Joined</span>
								<span class="data-list">2022-02-12</span>
								<span class="data-list">2022-02-12</span>
								<span class="data-list">2022-02-13</span>
								<span class="data-list">2022-02-13</span>
								<span class="data-list">2022-02-14</span>
								<span class="data-list">2022-02-14</span>
								<span class="data-list">2022-02-15</span>
							</div>
							<div class="data type">
								<span class="data-title">Type</span>
								<span class="data-list">New</span>
								<span class="data-list">Member</span>
								<span class="data-list">Member</span>
								<span class="data-list">New</span>
								<span class="data-list">Member</span>
								<span class="data-list">New</span>
								<span class="data-list">Member</span>
							</div>
							<div class="data status">
								<span class="data-title">Status</span>
								<span class="data-list">Liked</span>
								<span class="data-list">Liked</span>
								<span class="data-list">Liked</span>
								<span class="data-list">Liked</span>
								<span class="data-list">Liked</span>
								<span class="data-list">Liked</span>
								<span class="data-list">Liked</span>
							</div>
						</div>
					</div>
				</div>
			</section>

			<script src="../js/bootstrap.bundle.min.js"></script>
			<script src="../js/scripts.js"></script>
			<script>
				// $(document).ready(function() {
				//     $("#navLinks li:nth-child(1) a").addClass('active');
				// });
			</script>

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
		header("Location: ../login.php");
		exit;
	}
} else {
	header("Location: ../login.php");
	exit;
}

?>