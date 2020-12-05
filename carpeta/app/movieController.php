<?php 
	if (!isset($_SESSION)) {
		session_start();
	}
	include_once "connectionController.php";

	if (isset($_POST['action'])) {

		$movieController = new MovieController();

		switch ($_POST['action']) {
			case 'store':
				$title = strip_tags($_POST['titulo']);
				$description = strip_tags($_POST['descripcion']);
				$minutes = strip_tags($_POST['tiempo']);
				$clasification = strip_tags($_POST['clasificacion']);
				$idCategories = strip_tags($_POST['idCategoria']);

				$movieController->store($titulo, $descripcion, $tiempo, $clasificacion, $idCategoria);

				//var_dump($_POST);
			break;
		}
	}

	class MovieController{

		public function get(){
			$conn = connect();
			if ($conn->connect_error==false) {
				$query = "select * from movies";
				$prepared_query = $conn->prepare($query);
				$prepared_query->execute();

				$results = $prepared_query->get_result();
				$movies = $results->fetch_all(MYSQLI_ASSOC);

				if (count($movies )>0) {
					return $movies;
				}else
				return array();
			}else
			return array();
		}

		public function store($titulo, $descripcion, $tiempo, $clasificacion, $idCategoria){
			
			$conn = connect();
			if ($conn->connect_error==false) {
				
				if ($title !="" && $description !="" && $minutes !="" && $clasification !="" && $idCategories !="") {
					
					//echo "1";
					//Subir archivo cover
					$target_path = "../img/";
					$original_name = basename($_FILES['cover']['name']);
					$new_file_name = $target_path.basename($_FILES['cover']['name']);
					if (move_uploaded_file($_FILES['cover']['tmp_name'], $new_file_name)) {
						$query = "insert into movies (titulo, descripcion, tiempo, cover, clasificacion, idCategoria) values (?,?,?,?,?,?)";
						$prepared_query = $conn->prepare($query);
						$prepared_query->bind_param('ssissi', $titulo, $descripcion, $tiempo, $original_name, $clasificacion, $idCategoria);

						if ($prepared_query->execute()) {
							$_SESSION['success'] = 'El registro se ha guardado correctamente.';
							header("Location: ". $_SERVER['HTTP_REFERER']);
						}else{
							$_SESSION['error'] = 'Verifique los datos enviados.';
							header("Location: ". $_SERVER['HTTP_REFERER']);
						}
					}
					echo $new_file_name;
					//basename($_FILES['cover']['name']);


				}else{
					$_SESSION['error'] = 'Verifique la información del formulario.';
				header("Location: ". $SERVER['HTTP_REFERER']);
				}

			}else{
				$_SESSION['error'] = 'Verifique la conexión a la Base de Datos.';
				header("Location: ". $SERVER['HTTP_REFERER']);
			}
		}

	}
?>