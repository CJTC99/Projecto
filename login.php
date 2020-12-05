<?php 

	if (!isset($_SESSION)) {
		session_start();
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>
		Iniciar sesión
	</title>
</head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="./carpeta/css/login.css?v=0.0.18" media="all">

<body>


<div class="fondo">
	<!-- Fondo del Login-->
	<div class="gi">
		<img src="./carpeta/img/fondo1.jpg">
	</div>
	<!-- Parte donde se ingresaran los datos-->
	<div class="tarjeta">

		<div class="formulario">

			<form action="../app/authController.php" method="POST">

			<img src="./carpeta/img/totoro2.png">
  			<input type="email" id="email" name="correo" placeholder="Email" required="">
  			<br><br>
  			<img src="./carpeta/img/contrasena.png">
  			<input type="password" id="email" name="contraseña" placeholder="Contraseña" required="">
  			<br>
  			<a href="./carpeta/html/registrar.php" target="_blank">¿No tienes una?, ¡Registrate ahora!</a>
  			<br>
  			<button type="submit" id="submit">
  				Ingresar
  			</button>
  			<input type="hidden" name="action" value="access" >
  			

		</form>
		</div>
		
	</div>

	<!--Foto de inicio -->
	<div class="fotoTo">
		<img src="./carpeta/img/totoro.png">
		
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