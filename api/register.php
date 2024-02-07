<?php
	session_start();

	include_once "config.php";

	$fname = $conn->real_escape_string($_POST["fname"]);
	$lname = $conn->real_escape_string($_POST["lname"]);
	$email = $conn->real_escape_string($_POST["email"]);
	$password = $conn->real_escape_string($_POST["password"]);

	if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$query = $conn->query("SELECT * FROM users WHERE email = '{$email}'");
			if ($query->num_rows > 0) {
				echo "This email already exists!";
			} else {
				if (isset($_FILES["image"])) {
					$img_name = $_FILES["image"]["name"];
					$img_type = $_FILES["image"]["type"];
					$tmp_name = $_FILES["image"]["tmp_name"];

					$img_explode = explode(".", $img_name);
					$img_ext = end($img_explode);

					$extensions = ["png", "jpg", "jpeg"];

					if (in_array($img_ext, $extensions) === true) {
						$types = ["image/png", "image/jpg", "image/jpeg"];

						if (in_array($img_type, $types) === true) {
							$time = time();
							$new_img_name = $time . $img_name;

							if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
								$ran_id = rand(time(), 100000000);
								$status = "Active now";
								$query_password = md5($password);
								$query = $conn->query("INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$query_password}', '{$new_img_name}', '{$status}')");

								if ($query) {
									$query = $conn->query("SELECT * FROM users WHERE email = '{$email}'");

									if ($query->num_rows > 0) {
										$result = $query->fetch_assoc();
										$_SESSION["unique_id"] = $result["unique_id"];
										echo "success";
									} else {
										echo "This email does not exist!";
									}
								} else {
									echo "Something went wrong!";
								}
							}
						} else {
							echo "Please upload an image file - PNG, JPG, JPEG";
						}
					} else {
						echo "Please upload an image file - PNG, JPG, JPEG";
					}
				}
			}
		} else {
			echo "$email is not a valid email!";
		}
	} else {
		echo "All input fields are required!";
	}
?>