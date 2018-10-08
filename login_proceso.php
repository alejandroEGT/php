<?php 
	
	require "database.php";
	$pass = '';
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		
		$verify =$conn->prepare("SELECT * from users WHERE email = :email");
		$verify->bindParam(':email', $_POST['email']);
		$verify->execute();

		$results = $verify->fetch(PDO::FETCH_ASSOC);
		$message = '';
		
			
		$pass = $_POST['password'];

		if (count($results) > 0 && password_verify($pass, $results['password'])) {
			session_start();
			$_SESSION['user_id'] = $results['id'];
			header('Location: account.php');
		}else{
			$message = 'error de credenciales';
			echo "$message";
		}
	}else{
		$message="LLena los campos";
		header('Location: login.php?mensaje='.$message);
	}

 ?>