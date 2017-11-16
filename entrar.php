<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Login de Usuarios</title>
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
		<div class="col-sm-6">
			<div class="alert alert-info">
				<div class="alert-heading">
					<h2 class="texto_ciudad">Iniciar Sesión</h2>
				</div>
			</div>
<form class="form-horizontal" method="POST" action="entrar.php">
	<div class="form-group">
		<div class="col-sm-12">
			<label for="usuario">Usuario:</label>
			<input type="text" class="form-control" id="usuario" name="usuario">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-12">
			<label for="clave">Clave:</label>
			<input type="password" class="form-control" id="clave" name="clave">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" name="btEntrar" class="btn btn-primary">Entrar</button>
			<button type="reset" name="btEntrar" class="btn btn-danger">Borrar</button>
		</div>
	</div>
</form>
</div>

	<div class="col-sm-6 centrarImg">
		<small>Desde aqui podras poner tu lugar de nacimiento, o ese lugar favorito.Tu eliges.</small>
		<img src="img/paisaje.jpg" alt="Paisaje vistoso" class="imagen_entrar">
	</div>
</div>
</div>
	<?php
		if (isset($_POST["btEntrar"])){
				//var_dump($_POST);
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
					$stmt = $conn->prepare("SELECT * FROM tbusuario	where usuario=? and clave=?");
					$stmt->execute(array($_POST["usuario"],	md5($_POST["clave"]),
						)
					);
					$stmt->setFetchMode(PDO::FETCH_ASSOC);
          $usuValidado=$stmt->fetchAll();
					//var_dump($usuValidado);
          if (count($usuValidado)>0){
					$_SESSION["UsuarioValidado"]=$usuValidado;
					header('Location: index.php');
					exit;
				}else{
					$_SESSION["mensaje"] = "Usuario no encontrado.";
					//var_dump($usuValidado);
					header('Location: entrar.php');
					exit;
				}
			}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			$conn = null;
		}
		?>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 ">
					<?php
					if (isset($_SESSION["mensaje"])){
						echo '<div class="alert alert-danger">
						<strong>Atención! </strong>' . $_SESSION["mensaje"] .
						'</div>';
						unset($_SESSION["mensaje"]);
					}
					?>
				</div>
			</div>
		</div>
</body>
</html>
