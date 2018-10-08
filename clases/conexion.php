<?php 

$mysqli = new mysqli('localhost','root','','gastos') or die (mysqli_error($mysql));

$server = "localhost";
	$username = "root";
	$password = "";
	$database = "gastos";

	try {
		$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

		
	} catch (PDOException $e) {
		echo $e;
	}
//echo $mysql;
// if ($mysqli){

// 	$query = $mysqli->query("SELECT * FROM users") or die($mysqli->error());

// 	if ($query->num_rows > 0) {

// 		//echo json_encode($query->fetch_assoc());
// 		//var_dump($query->fetch_assoc());

// 		// $json = [
// 		// 	'nombre' => 'Alejandro',
// 		// 	'apellido' => 'elkkck'
// 		// ];

// 		// echo json_encode($json);

// 		// while($row = $query->fetch_assoc()) {
// 	 //        var_dump($row['nombres']);
// 	 //        echo "<br><br>";
// 	 //    }
		
// 	}


// }else{
// 	echo "falla";
// }

 ?>