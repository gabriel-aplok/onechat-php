<?php
	session_start();

	include_once "config.php";

	$outgoing_id = $_SESSION["unique_id"];
	$sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
	$query = $conn->query($sql);
	$output = "";

	if ($query->num_rows > 0) {
		include_once "data.php";
	} elseif ($query->num_rows == 0) {
		$output .= "No users are available to chat";
	}
	echo $output;
?>