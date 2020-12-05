<?php 

	if (!isset($_SESSION)) {
		session_start();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Registrar ahora
	</title>
</head>

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/registrar.css?v=0.0.16" media="all">
<body>


<div class="fondo">
	<!-- Fondo del Login-->
	<div class="gi">
		<img src="../img/fondo1.jpg">
	</div>
	<!-- Parte donde se ingresaran los datos-->
	<div class="tarjeta">

		<div class="formulario">
			<h2>
				¡Registrate ahora! 
			</h2>

			<form action="../app/authController.php" method="POST">

				<label></label>
				<input type="text" name="nombre" placeholder="Nombre" required=""><br><br>
				<input type="text" name="apellidos" placeholder="Apellidos" required=""><br><br>
				<input type="email" name="correo" placeholder="Email" required=""><br><br>

				<input type="password" name="contraseña" placeholder="* * * * *" required=""><br><br><br>
				<label for="start">Fecha de nacimiento:  </label>
				<input type="date" id="start" name="trip-start" value="2020-12-03" min="1970-01-01" max="2030-12-31">
				<br>
				<button type="submit">
					Registrar
				</button>
				<input type="hidden" name="action" value="register">
				
	
  			

			</form>
		</div>

		<div class="im2">
			<img src="../img/rabano.png">
		</div>

		<div class="im3">
			<img src="../img/rabano.png">
		</div>
		
	</div>
</div>




<div class="footer">

	<hr>

	<p>
		Integrantes:<br>
		Martínez Barrios, Alexis <br>
		Turrubiates Carrillo, Cinthya Josselyn
	</p>

	<label>
		© Matínez & Turrubiates |  <span> All rights reserved 2020 </span>
	</label>
</div>



</body>
</html>