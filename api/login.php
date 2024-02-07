<?php
	session_start();

	include_once "config.php";

	$email = $conn->real_escape_string($_POST["email"]);
	$password = $conn->real_escape_string($_POST["password"]);

	if (!empty($email) && !empty($password)) {
		$query = $conn->query("SELECT * FROM users WHERE email = '{$email}'");

		if ($query->num_rows> 0) {
			$row = $query->fetch_assoc();

			$user_password = md5($password);
			$query_password = $row["password"];

			if ($user_password === $query_password) {
				$status = "Active now";
				$query = $conn->query("UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");

				if ($query) {
					$_SESSION["unique_id"] = $row["unique_id"];
					echo "success";
				} else {
					echo "Something went wrong!";
				}
			} else {
				echo "Your password is incorrect!";
			}
		} else {
			echo "Your email does not exist!";
		}
	} else {
		echo "All input fields are required!";
	}
?>