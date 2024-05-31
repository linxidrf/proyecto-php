<?php
require '../src/funciones.php';
validarLogin()
?>

<!DOCTYPE html>
<html lange="en">

<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA_Compatible" content=ie=edge>
  <link rel="stylesheet" href="../css/styles.css">
  <title>Formulario Registro</title>

</head>

<body>
  <section class="form-register">
    <h4>Formulario Registro</h4>
    <form method="post" action="../src/iniciose.php">
      <input class="controls" name="nombre" id="nombre" placeholder="Ingrese su Nombre">
      <input class="controls" type="numero" name="identificacion" id="identificacion"
        placeholder="Ingrese tu numero de identificacion">
      <input class="controls" name="apellido" id="apellido" placeholder="Ingrese su Apellido">
      <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo">
      <input class="controls" type="password" name="password" id="password" placeholder="Ingrese su Contraseña">
      <input type="hidden" name="registro" value="registrar">
      <div class="Registrar">
        <center><button class="buton">Registrar</button></center>
      </div>
    </form>


    <p><a href="#">Terminos y Condiciones</a></p>

    <p><a href="../index.php">¿Ya tengo Cuenta?</a></p>


  </section>

</body>

</html>
</head>