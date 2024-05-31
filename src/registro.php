<?php

include("conexion.php");

$correo = isset($_POST["codigo"]) ? $_POST["codigo"] : null;
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : null;
$identificacion = isset($_POST["precio"]) ? $_POST["precio"] : null;
$apellido = isset($_POST["unidad_m"]) ? $_POST["apellido"] : null;
$correo = isset($_POST["stock"]) ? $_POST["stock"] : null;
$password = isset($_POST["descripcion"]) ? $_POST["descripcion"] : null;
$login = isset($_POST["ingresar"]) ? $_POST["ingresar"] : null;

// Ingresar datos

if (isset($ingresar)) {

    $sql = "INSERT INTO productos ( codigo , nombre , precio, unidad_m,stock, descripcion) values (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    // Vincular parámetros y valores
    $stmt->bind_param("isssss", $codigo , $nombre , $precio, $unidad_m, $stock, $descripcion);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        //echo "Datos insertados correctamente.";
        header("Location:prod.html");
    } else {
        echo "Error al insertar datos: " . $stmt->error;
    }

    // Cerrar la consulta preparada
    $stmt->close();
}


//actualizar registros

$sql = "UPDATE usuarios SET apellido = 'Britto' WHERE id = 1";

if (
    $conexion->query($sql) === TRUE
) {
    echo "Registro actualizado correctamente";
} else {

    $conexion->error;
};

$conexion->close();