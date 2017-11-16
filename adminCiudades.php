<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ciudades</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="estilo.css" type="text/css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
include 'menu.php';
if(!isset($_SESSION["UsuarioValidado"])){
  header("Location: entrar.php");
}

 ?>
<body>
  <div class="container">

    <div class="row">
      <div class="col-sm-12">
        <div class="alert alert-info">
        <div class="alert-heading">
        <h2 class="texto_ciudad">Inserta una ciudad</h2>
        </div>
        </div>
      </div>
    </div>

    <div class="row">
    <form  method="POST" action="adminCiudades.php">
    <div class="form-group">
    <div class="col-sm-6">
    <label for="ciudad">Ciudad:</label>
    <input type="text" class="form-control" id="ciudad" name="ciudad">
    </br>
    <label for="descripcion">Descripcion:</label>
    <textarea type="text" class="form-control" id="descripcion" name="descripcion"></textarea>
    </br>
    <small>Debes de elegir una opción. Si esta ACTIVA se vera en el menu.</small>
    </br>
    <div class="radio">
    <label><input type="radio" name="activo" id="activo" value="1">Si</label>
    </div>
    <div class="radio">
    <label><input type="radio" name="activo" id="activo" value="0">No</label>
    </div>
    <div class="">
    <button type="submit" name="btAlta" class="btn btn-primary">Entrar</button>
    <button type="reset" name="btBorrar" class="btn btn-danger">Borrar</button>
    </div>
    </div>
    </div>
    </form>

    <div class="col-sm-6 center-block">
      <img src="img/espana.jpg" alt="Mapa de España." class="centrarAdminCiud">
    </div>
  </div>
  </div>
<?php
if (isset($_POST["btAlta"])){
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
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("Insert INTO tbciudades
		 (ciudad,descripcion,activo) values (?, ?, ?)");
		$stmt->execute(
			array($_POST["ciudad"],
				    $_POST["descripcion"],
            $_POST["activo"]
				)
			);
		$autonumerico = $conn->lastInsertId();
		return $autonumerico;
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}
?>
</body>
</html>
