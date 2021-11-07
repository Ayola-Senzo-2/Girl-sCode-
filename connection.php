<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
	$database = "allcanteen";

	//Create database connection
	$conn = new mysqli($servername, $username, $password, $database);

	//Check database connection
	if ($conn->connect_error) {
		die("Connection failed -- Error : " . $conn->connect_error);
		echo("DB connection failed");
	}
?>