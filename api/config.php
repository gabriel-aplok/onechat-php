<?php
	define("DB_SERVER", "0.0.0.0");
	define("DB_NAME", "onechat");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "root");

	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>
