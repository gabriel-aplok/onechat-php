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
		<section class="chat-area">
			<header>
				<?php
					$user_id = $conn->real_escape_string($_GET['user_id']);
					$query = $conn->query("SELECT * FROM users WHERE unique_id = {$user_id}");

					if ($query->num_rows > 0) {
						$row = $query->fetch_assoc();
					} else {
						header("location: index.php");
					}
				?>
				<a href="index.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
				<img src="api/images/<?php echo $row['img']; ?>" alt="<?php echo $row['fname']. " " . $row['lname'] ?>">
				<div class="details">
					<span><?php echo $row['fname']. " " . $row['lname'] ?></span>
					<p><?php echo $row['status']; ?></p>
				</div>
			</header>
			<div class="chat-box">
			</div>
			<form action="#" class="typing-area">
				<input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
				<input type="text" name="message" class="input-field" placeholder="Type your message here..." autocomplete="off">
				<button>></button>
			</form>
		</section>
	</div>
	<script src="assets/js/chat.js"></script>
</body>
</html>