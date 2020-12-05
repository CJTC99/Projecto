<?php
	if (!isset($_SESSION)) {
			session_start();

	 		
	 	} 

	 	include_once "connectionController.php";

if (isset($_POST['action'])) {
	$authController = new AuthController();

	switch ($_POST['action']) {
		case 'register':

			$nombre = strip_tags($_POST['nombre']);
			$apellidos = strip_tags($_POST['apellidos']);
			$correo= strip_tags($_POST['correo']);
			$contraseña= strip_tags($_POST['contraseña']);
			$authController->register($nombre, $apellidos, $correo, $contraseña);		
		break;
		
		case 'access':
			$correo = strip_tags($_POST['correo']);
			$contraseña = strip_tags($_POST['contraseña']);
			$authController->login($correo, $contraseña);
		break;
	}
}

class AuthController{
	
	public function register($nombre, $apellidos, $correo, $contraseña){
		$conn = connect();
		if (!$conn->connect_error) {
			if ($nombre != "" && $apellidos !="" && $correo != "" && $contraseña != "") {
				$originalPassword = $contraseña;
				$contraseña = md5($contraseña.'yamete_kudasai');
				
				$query = "insert into usuario (nombre, apellidos, correo, contraseña) value (?,?,?,?)";
				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('ssss', $nombre, $apellidos, $correo, $contraseña);

				if ($prepared_query->execute()) {
					$this->access($correo, $originalPassword);
				}else{
					$_SESSION['error'] = 'verifique datos enviados.';
					header("Location: ". $_SERVER['HTTP_REFERER']);
				}
			}
		}else{
			$_SESSION['error'] = 'verifique la conexión a la base de datos';
			header("Location: ". $_SERVER['HTTP_REFERER']);
		}
	}


	public  function access($correo, $contraseña){
		$conn = connect();

		if (!$conn->connect_error) {
			if ($correo !="" && $contraseña !="") {
				$contraseña = md5($contraseña.'yamete_kudasai');

				$query = "select * from usuario where correo = ? and contraseña = ?";

				$prepared_query = $conn->prepare($query);
				$prepared_query->bind_param('ss', $correo, $contraseña);

				if ($prepared_query->execute()) {
					
					$results = $prepared_query->get_result();
					$user = $results->fetch_all(MYSQLI_ASSOC);

					if (count($user)>0) {
						$user = array_pop($user);
						$_SESSION['idUsuario'] = $user['idUsuario'];
						$_SESSION['nombre'] = $user['nombre'];
						$_SESSION['correo'] = $user['correo'];

						header("Location: ../carpeta/html/interfaz.php");
					}

				}else{
					$_SESSION['error'] = 'verifique los datos enviados';
			header("Location: ". $_SERVER['HTTP_REFERER']);
				}
			}else{
				$_SESSION['error'] = 'verifique la información del formulario';
			header("Location: ". $_SERVER['HTTP_REFERER']);
			}
		}else{
			$_SESSION['error'] = 'verifique la conexión a la base de datos';
			header("Location: ". $_SERVER['HTTP_REFERER']);
		}



		$query = "select from usuario where correo = ? and contraseña = ?";

		
	}

	public function logout(){

	}
}




 ?>