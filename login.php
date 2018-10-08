
<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	
	<?php 
		require 'partials/header.php';
	 ?>
	<a href="index.php">Atras</a>
	<div class="row justify-content-center">
		<div class="col-md-6">
		  <h2>Log In</h2>
		  <?php if (!empty($_GET['mensaje'])): ?>
		  	<label style="color:red"><?= $_GET['mensaje'] ?></label>
		  <?php endif ?>
			<form action="login_proceso.php" method="post">
				<label>Correo:</label>
				<input class="form-control" type="email" name="email">
				<br>
				<label>Password:</label>
				<input class="form-control" type="password" name="password">
				<br>
				<input class="btn btn-success" type="submit" value="Log in" name="">
			</form>
		</div>
	</div>
	</div>
</body>
</html>
