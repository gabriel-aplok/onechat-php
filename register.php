<?php
	session_start();

	if (isset($_SESSION["unique_id"])) {
		header("location: index.php");
	}
?>

<?php include_once "header.php"; ?>
<body>
	<div class="wrapper">
		<section class="form register">
			<header><i class="far fa-comment"></i> OneChat</header>
			<form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
				<div class="error-text"></div>
				<div class="name">
					<div class="field input">
						<label>First Name</label>
						<input type="text" name="fname" placeholder="Enter your first name" required>
					</div>
					<div class="field input">
						<label>Last Name</label>
						<input type="text" name="lname" placeholder="Enter your last name" required>
					</div>
				</div>
				<div class="field input">
					<label>Email</label>
					<input type="text" name="email" placeholder="Enter your email" required>
				</div>
				<div class="field input">
					<label>Password</label>
					<input type="password" name="password" placeholder="Enter new password" required>
					<i class="fas fa-eye"></i>
				</div>
				<div class="field image">
					<label>Select Image</label>
					<input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
				</div>
				<div class="field button">
					<input type="submit" name="submit" value="REGISTER">
				</div>
			</form>
			<div class="link">
				Already registered? <a href="login.php">Login</a>
			</div>
		</section>
	</div>
	<script src="assets/js/password-toggle.js"></script>
	<script src="assets/js/register.js"></script>
</body>
</html>