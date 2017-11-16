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
        $sql="SELECT imagen FROM tbimagenes where idciudad=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($_GET['c']));
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ListaImagenes=$stmt->fetchAll();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>
