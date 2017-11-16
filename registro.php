<!DOCTYPE html>
<html lang="es">
<head>
	<title>Alta de Usuarios</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="estilo.css" type="text/css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		include 'dameCiudades.php';
		include 'menu.php';
		if (isset($_SESSION["UsuarioValidado"])){
        	header('Location: index.php');
      	}
	?>
<div class="container">
	<div class="row">
			<div class="col-sm-12">
			<div class="alert alert-info">
				<h2 class="texto_ciudad">Alta de Usuarios</h2>
			</div>
		</div>
	</div>

		<form  method="POST" action="registro.php">
			<div class="form-group">
				<div class="col-sm-6">
					<label for="nombre">Nombre:</label>
					<input type="text" class="form-control" id="Nombre" name="Nombre">
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-6">
					<label for="apellido">Apellido:</label>
					<input type="text" class="form-control" id="Apellido" name="Apellido">
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-6">
					<label for="usuario">Usuario:</label>
					<input type="text" class="form-control" id="Usuario" name="Usuario">
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-6">
					<label for="clave">Clave:</label>
					<input type="password" class="form-control" id="Clave" name="Clave">
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-6">
				</br>
					<button type="submit" name="btAlta" class="btn btn-success">Regístrate</button>
					<button type="reset" name="Borrar" class="btn btn-danger">Borrar</button>
					</br>
					</br>
				</div>
			</div>
		</form>
	</div>
		<?php
		if (isset($_POST["btAlta"])){
			if ($_POST["Nombre"]=="" || $_POST["Usuario"]==""){
				$_SESSION["mensaje"] = "Debe completar los campos.";
				header('Location: registro.php');
				exit;
			}
				// var_dump($_POST);
				// $servername = "localhost";
				// $username = "root";
				// $password = "";
				// $dbname = "ciudades";

				$servername = "localhost";
				$username = "id3642959_ciudadesgcr";
				$password = "g913312245";
				$dbname = "id3642959_ciudadesgcr";
				try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conn->prepare("Insert INTO tbusuario
						(Nombre,Apellido,Usuario,Clave) values (?, ?, ?, ?)");
					$stmt->execute(
						array($_POST["Nombre"],
								  $_POST["Apellido"],
								  $_POST["Usuario"],
								  md5($_POST["Clave"]),
						)
					);
					$_SESSION["mensaje"] = "Alta realizado correctamente";
					header('Location: registro.php');
					exit;
				}
				catch(PDOException $e) {
					echo "Error: " . $e->getMessage();
				}
				$conn = null;
			}
			?>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<?php
						if (isset($_SESSION["mensaje"])){
							echo '<div class="alert alert-success">
							<strong>Aviso...! </strong>' . $_SESSION["mensaje"] .
							'</div>';
							unset($_SESSION["mensaje"]);
						}
						 ?>
				</div>
			</div>
		</div>
	</body>
</html>
