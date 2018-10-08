<?php 

	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "gastos";

	try {
		$conn = new PDO("mysql:host=$server;dbname=$database", $username, $password);

		
	} catch (PDOException $e) {
		echo $e;
	}

 ?>