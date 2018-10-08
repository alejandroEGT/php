<?php
//require "database.php"
require "clases/usuario.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<?php require 'partials/header.php'; ?>

		<div class="container">
			<a href="index.php">Volver</a>
			<div class="row justify-content-center">
				<div class="col-md-6">
					<h2>Registrate</h2>
					<?php if (!empty($mensaje)): ?>
						<?= $mensaje ?>
					<?php endif ?>
						
					
					<form action="registro_usuario.php" method="post">
						<label>Nombre:</label>
						<input class="form-control" type="text" name="nombre"><br>
						<label>Apellidos:</label>
						<input class="form-control" type="text" name="apellidos"><br>
						<label>Email:</label>
						<input class="form-control" type="email" name="email"><br>
						<label>Password:</label>
						<input class="form-control" type="password" name="password"><br>
						<label>Confirma Password:</label>
						<input class="form-control" type="password" name="confirm_password"><br>
						<input class="btn btn-primary" type="submit" value="Registrar" name="">
					</form>
					
				</div>
			</div>
		</div>

</body>
</html>

<?php 
	$mensaje = '';
	$nick = "prueba";
	$fecha = "1994-11-29";
	$sex = 1;
	if (!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['email']) && !empty($_POST['password'] && !empty($_POST['confirm_password']))) {

		if ($_POST['password'] == $_POST['confirm_password']) {

			$user = Usuario::insertar($_POST['nombre'], $_POST['apellidos'],$_POST['email'],$_POST['password'], "nickname","1994-11-29", 1 );
			if ($user) {
				echo "true";
			}else{
				echo "false";
			}
		}
		
		
	}
 ?>