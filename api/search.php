<?php
	session_start();
	include_once "config.php";

	$outgoing_id = $_SESSION["unique_id"];
	$search = $conn->real_escape_string($_POST["search"]);

	$sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$search}%' OR lname LIKE '%{$search}%')";
	$output = "";
	$query = $conn->query($sql);
	if ($query->num_rows > 0) {
		include_once "data.php";
	} else {
		$output .= "No users found";
	}
	echo $output;
?>