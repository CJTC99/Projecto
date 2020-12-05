<!DOCTYPE html>
<html>
<head>
	<title>
		Categories
	</title>
</head>

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../css/categories.css?v=0.0.13" media="all">

<body>

	<div class="fondo">
		<div class="imagenF">
			<img src="../img/sg2.jpg">

		</div>
	</div>
	<div class="tarjeta">

		<div class="formulario">
			<h2>
				Agregar una película
			</h2>

			<form action="../app/authController.php" method="POST">

				<label></label>
				<input type="text" name="titulo" placeholder="Titulo" required=""><br><br>
				<input type="text" name="descripcion" placeholder="Descripcion" required=""><br><br>
				<input type="text" name="tiempo" placeholder="Duracion" required=""><br><br>
				<input type="file" name="cover" required="" accept="image/*">
				<br>
				<h4>Clasificacion</h4>
				<select name="clasificacion">
				<option>B15</option>
				<option>R</option>
				<option>AA</option>
				</select>
				<h4>Categoria</h4>
				<select name="idCategoria" required="">
					<?php foreach ($categories as $category): ?>
						<option value="<?=$category['idCategoria']?>"><?=$category['name']?></option>
					<?php endforeach ?>
				</select>
				<button type="submit">
					Registrar
				</button>
				<input type="hidden" name="action" value="store">
				
	
  			

			</form>
		</div>		
	</div>




</body>
</html>