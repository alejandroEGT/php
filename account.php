<?php 
require 'database.php';
session_start();
if ($_SESSION['user_id'] != '') {?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>KKCK</h2>
</body>
</html>
<?php
}else{
	header('Location: index.php');
}

 ?>