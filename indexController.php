<?php 

	require "clases/usuario.php";
	$laquery = Usuario::listar();
	$json = [];
	$i=0;

	while ($row = $laquery->fetch_assoc()) {
		$json[$i]['id'] = $row['id'];
		$json[$i]['nombres'] = $row['nombres'];
		$json[$i]['apellidos'] = $row['apellidos'];
		$json[$i]['email'] = $row['email'];
		$i++;
	}

	echo json_encode($json);

	//mysqli_close($laquery);

 ?>