<?php
	session_start();

	if (isset($_SESSION["unique_id"])) {
		include_once "config.php";
		$outgoing_id = $_SESSION["unique_id"];
		$incoming_id = $conn->real_escape_string($_POST["incoming_id"]);
		$output = "";
		$sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
		$query = $conn->query($sql);

		if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				if ($row["outgoing_msg_id"] === $outgoing_id) {
					$output .= "<div class='chat outgoing'>
									<div class='details'>
										<p>". base64_decode($row["msg"]) ."</p>
									</div>
								</div>";
				} else {
					$output .= "<div class='chat incoming'>
									<img src='api/images/".$row["img"]."' alt=''>
									<div class='details'>
										<p>". base64_decode($row["msg"]) ."</p>
									</div>
								</div>";
				}
			}
		} else {
			$output .= "<div class='text'>Say Hello and start a new fun and memorable chat! 👋</div>";
		}

		echo $output;
	} else {
		header("location: ../login.php");
	}
?>