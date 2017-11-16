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
<body>
  <?php
    include 'dameCiudades.php';
    //var_dump($ListaCiudades);
    include 'menu.php';
      if(isset($_GET['c'])){
        include 'dameImagenes.php';
        if (!isset($_SESSION["UsuarioValidado"])){
        header('Location: entrar.php');
        }
      }
  ?>
<br>

<div class="container">
  <?php if(isset($_GET['c'])){
    for ($contador=0;$contador<count($ListaCiudades);$contador++){
      if($ListaCiudades[$contador]['id']==$_GET['c'] &&
      $ListaCiudades[$contador]['activo']==1){
  ?>
  <div class="row">
    <div class="col-sm-12 alert alert-success">
      <div class="panel-heading texto_ciudad">
        <?php echo $ListaCiudades[$contador]['ciudad']; ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12 panel-body texto_descripcion">
      <?php echo ($ListaCiudades[$contador]['descripcion']);?>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-12">
      <?php
        if (count($ListaImagenes)>0){
          for ($cont=0;$cont<count($ListaImagenes);$cont++){
          echo "<img class='imagen_ciudad' src='" . $ListaImagenes[$cont]['imagen'] . "'>";
          }
        }
      ?>
    </div>
  </div>
  <?php
      }
    }
  }
    else{
      if (isset($_SESSION["UsuarioValidado"])){
  ?>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 alert alert-success">
          <h2 class="texto_ciudad">Seleccione una ciudad en el menú. <small>Recuerda que primero deves de darla de alta.</small></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="alert-heading">
            <img src="img/paisaje01.jpg" alt="" class="img-rounded center-block ing_index">
          </div>
        </div>
      </div>
    </div>
  <?php
      }
      else{
  ?>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 alert alert-info">
        <h2 class="texto_ciudad">Primero debes iniciar sesión<small> Recuerda que para Iniciar sesión debes de Registrarte.</small></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="alert-heading">
          <img src="img/paisaje02.jpg" alt="" class="img-rounded center-block ing_index">
        </div>
      </div>
    </div>
  </div>
  <?php
      }
    }
  ?>
</div>
</body>
</html>
