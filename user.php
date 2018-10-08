<?php require "clases/usuario.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>User </title>
</head>
<body>
	<?php 
	$user = Usuario::mostrar($_GET['id']);
	while ($row = $user->fetch_assoc()) {
	?>

	<h3><?=$row['nombres'] ?></h3>

	<?php
	}
 	?>
</body>
</html>