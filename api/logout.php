<?php
	session_start();

	if (isset($_SESSION["unique_id"])) {
		include_once "config.php";

		$logout_id = $conn->real_escape_string($_GET["logout_id"]);

		if (isset($logout_id)) {
			$status = "Offline now";
			$query = $conn->query("UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");

			if ($query) {
				session_unset();
				session_destroy();
				header("location: ../login.php");
			}
		} else {
			header("location: ../index.php");
		}
	} else {
		header("location: ../login.php");
	}
?>