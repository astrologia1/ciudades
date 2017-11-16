<?php
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
        $sql="SELECT id,ciudad, descripcion,activo FROM tbciudades";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ListaCiudades=$stmt->fetchAll();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>
