<?php

require '../config/conexion.php';

$db = conectarDB();

$codigo = "";
$nombre =  "";
$precio =  "";
$unidadM =  "";
$stock =  "";
$descripcion =  "";
$actualizar = false;
$errores = [];


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $codigoProducto = isset($_GET['cod_producto']) ? $_GET['cod_producto'] : null;;

  if ($codigoProducto) {

    $actualizar = true;
    $query = "SELECT * FROM producto WHERE prod_codigo = '$codigoProducto'";
    $resultado = mysqli_query($db, $query);
    $producto = mysqli_fetch_assoc($resultado);

    $codigo = $producto['prod_codigo'];
    $nombre = $producto['prod_nombre'];
    $precio = $producto['prod_precioVenta'];
    $unidadM = $producto['prod_unidaMedia'];
    $stock = $producto['prod_Stock'];
    $descripcion = $producto['prod_descripcion'];
  }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $actualizar = true;
  $codigo = $_POST['codigo'];
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $unidadM = $_POST['unidad_m'];
  $stock = $_POST['stock'];
  $descripcion = $_POST['descripcion'];

  if (!$codigo) {
    $errores[] = "Debes añadir un codigo";
  }
  if (!$nombre) {
    $errores[] = "Debes añadir un nombre";
  }
  if (!$precio) {
    $errores[] = "Debes añadir un precio";
  }
  if (!$unidadM) {
    $errores[] = "Debes añadir una unidad de medida";
  }
  if (!$stock) {
    $errores[] = "Debes añadir un stock";
  }
  if (!$descripcion) {
    $errores[] = "Debes añadir una descripcion";
  }

  if (empty($errores)) {

    $query = "SELECT * FROM producto WHERE prod_codigo = '$codigo'";
    $resultado = mysqli_query($db, $query);
    $producto = mysqli_fetch_assoc($resultado);
    $codigo_prod = $producto['prod_codigo'];

    if (!$codigo_prod) {
      $query = "INSERT INTO producto (prod_codigo, prod_nombre, prod_precioVenta, prod_unidaMedia, prod_Stock, prod_descripcion)";
      $query = $query . "VALUES ('$codigo', '$nombre', '$precio', '$unidadM', '$stock', '$descripcion')";
      $resultado = mysqli_query($db, $query);
    } else {
      $query = "UPDATE producto ";
      $query = $query . "SET prod_codigo='$codigo', prod_nombre='$nombre', prod_precioVenta='$precio', prod_unidaMedia='$unidadM', prod_Stock='$stock', prod_descripcion='$descripcion' ";
      $query = $query . "WHERE prod_codigo = '$codigo'";

      $resultado = mysqli_query($db, $query);
    }


    if ($resultado) {
      header('Location: ../src/lista_productos.php');
    }
  }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <title>Registro productos</title>
</head>

<body>

  <div class="container">



    <section class="form-register">
      <h4>
        <?php echo $actualizar ? 'Actualizar producto' : 'Registrar producto' ?>
      </h4>

      <?php foreach ($errores as $error) : ?>
        <li class="error"> <?php echo $error; ?> </li>
      <?php endforeach; ?>


      <form method="post" action="producto.php">
        <input class="controls" name="codigo" placeholder="Codigo" value="<?php echo $codigo ?>">
        <input class="controls" name="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>">
        <input class="controls" name="precio" placeholder="Precio" value="<?php echo $precio ?>">
        <input class="controls" name="unidad_m" placeholder="Unidad Medida" value="<?php echo $unidadM ?>">
        <input class="controls" name="stock" placeholder="Stock" value="<?php echo $stock ?>">
        <input class="controls" name="descripcion" placeholder="Descripcion" value="<?php echo $descripcion ?>">

        <input type="hidden" name="registro" value="registrar">
        <div class="Registrar">
          <center><button class="buton"><?php echo $actualizar ? 'Actualizar' : 'Registrar' ?></button></center>
        </div>
      </form>

    </section>
    <a href=<?php echo '../src/lista_productos.php' .  ' button class="btn buton">' ?> <i class="fas fa-arrow-circle-left"></i> Atras</a>

  </div>

  <body>

</html>