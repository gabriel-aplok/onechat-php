<?php
	session_start();
	include_once "api/config.php";

	if (!isset($_SESSION["unique_id"])) {
		header("location: login.php");
	}
?>

<?php include_once "header.php"; ?>
<body>
	<div class="wrapper">
		<section class="users">
			<header>
				<div class="content">
					<?php
						$query = $conn->query("SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

						if ($query->num_rows > 0) {
							$row = $query->fetch_assoc();
						}
					?>
					<img src="api/images/<?php echo $row['img']; ?>" alt="<?php echo $row['fname']. " " . $row['lname'] ?>">
					<div class="details">
						<span><?php echo $row['fname']. " " . $row['lname'] ?> <i class="fas fa-chevron-down"></i></span>
						<p><?php echo $row['status']; ?></p>
					</div>
				</div>
				<a href="api/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
			</header>
			<div class="search">
				<span class="text">Users</span>
				<input type="text" placeholder="Enter name to search...">
				<button><i class="fas fa-search"></i></button>
			</div>
			<div class="users-list">
			</div>
		</section>
	</div>
	<script src="assets/js/users.js"></script>
</body>
</html>