<?php 

class Usuario
{
	//atributos
	public $nombres;
	public $apellidos;
	public $email;
	protected $password;
	public $nickname;
	public $nacimiento;
	public $id_sexo;



	//funciones

	public function listar()
	{
		require "conexion.php";
		$query = $mysqli->query("SELECT * FROM users") or die($mysqli->error());
		if ($query->num_rows > 0) {
			return $query;
		}
	}

	public function insertar($nom, $ape, $email, $pass,$nick, $nac, $sex)
	{
		require "conexion.php";
		
			$pass_hash = password_hash($pass, PASSWORD_BCRYPT);

			$sql = "INSERT INTO users (nombres, apellidos, email, password, nickname, nacimiento, id_sexo)
				VALUES (:nombre, :apellidos, :email, :password, :nickname, :nacimiento, :id_sexo)";
			$estado = $conn->prepare($sql);
			$estado->bindParam(":nombre", $_POST['nombre']);
			$estado->bindParam(":apellidos", $_POST['apellidos']);
			$estado->bindParam(":email", $_POST['email']);
			$estado->bindParam(":password", $pass_hash);
			$estado->bindParam(":nickname", $nick);
			$estado->bindParam(":nacimiento", $nac);
			$estado->bindParam(":id_sexo", $sex);

			if ($estado->execute()) {
				return true;
			}else{
				return false;
			}

	}

	public function actualizar()
	{
		# code...
	}
	public function eliminar($id_user)
	{
		require "conexion.php";
		$id = $id_user;
		$delete = $mysqli->query("DELETE FROM users WHERE id = $id_user");
		
		if($delete == true){
			return true;
		}else{
			return false;
		}
	}
	public function mostrar($id_user)
	{
		require "conexion.php";
		$query = $mysqli->query("SELECT * FROM users WHERE id = $id_user") or die($mysqli->error());
		if ($query->num_rows > 0) {
			return $query;
			// echo "<pre>";
			// print_r($query);
			// echo "</pre>";
		}

	}
}


 ?>