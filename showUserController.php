<?php 

	require "clases/usuario.php";

	$id_user = $_GET['id'];

	$u = Usuario::mostrar($id_user);

	echo json_encode($u->fetch_assoc());
	


 ?>