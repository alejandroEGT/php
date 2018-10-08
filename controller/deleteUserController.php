<?php 

require "../clases/usuario.php";

	$user = new Usuario;
	echo $user->eliminar($_POST['id_user']);



 ?>