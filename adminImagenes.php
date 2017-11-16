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
include 'dameCiudades.php';
include 'menu.php';
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12 alert alert-success">
      <div class="panel-heading texto_ciudad">
        <h2 class="texto_ciudad">Imagenes de tu ciudad <small>Recuerda que debes de haber dado de alta antes tu ciudad</small></h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <form method='POST' enctype="multipart/form-data" action='adminImagenes.php'>
      	<select class="form-control input-lg" name="listaCiudades">
          <?php  for ($contador=0;$contador<count($ListaCiudades);$contador++){  ?>
          	<option value="<?php echo $ListaCiudades[$contador]['id']; ?>">
              <?php	echo $ListaCiudades[$contador]['ciudad'];  ?>
        		</option>
      		<?php }  ?>
      	</select>
        </br>
        <input class="btn btn-default" type="file" name="fileToUpload" id="fileToUpload"></br>
      	<input class="btn btn-success" type="submit" value="Alta" name="btAlta">
      </form>
      </div>
      <div class="col-sm-6 center-block">
        <img src="img/espana.jpg" alt="Mapa de España." class="centrarAdminImga">
      </div>
  </div>



<?php

if (isset($_POST["btAlta"])){
	var_dump($_POST);

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

		$stmt = $conn->prepare("Insert INTO tbimagenes
		 (imagen,idciudad) values (?, ?)");
		$stmt->execute(
			array("",$_POST["listaCiudades"])
			);
		$autonumerico = $conn->lastInsertId();
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;


	$target_dir = "uploads/" . $autonumerico . "_" ;
	$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);


	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("UPDATE tbimagenes SET imagen=? WHERE id=?");
		$stmt->execute(
			array($target_file,$autonumerico)
			);
	}
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
}
?>
