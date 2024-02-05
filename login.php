<?php
	session_start();

	if (isset($_SESSION["unique_id"])) {
		header("location: index.php");
	}
?>

<?php include_once "header.php"; ?>
<body>
	<div class="wrapper">
		<section class="form login">
			<header><i class="far fa-comment"></i> OneChat</header>
			<form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
				<div class="error-text"></div>
				<div class="field input">
					<label>Email</label>
					<input type="text" name="email" placeholder="Enter your email" required>
				</div>
				<div class="field input">
					<label>Password</label>
					<input type="password" name="password" placeholder="Enter your password" required>
					<i class="fas fa-eye"></i>
				</div>
				<div class="field button">
					<input type="submit" name="submit" value="LOGIN">
				</div>
			</form>
			<div class="link">
				Not registered yet? <a href="register.php">Register</a>
			</div>
		</section>
	</div>
	<script src="assets/js/password-toggle.js"></script>
	<script src="assets/js/login.js"></script>
</body>
</html>