<?php

require '../config/conexion.php';

$db = conectarDB();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cod_producto = isset($_GET["cod_producto"]) ? $_GET["cod_producto"] : null;

    if ($cod_producto) {

        $query = "DELETE FROM producto WHERE prod_codigo = '$cod_producto'";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header("Location: ../src/lista_productos.php");
        } else {
            echo "Error al insertar datos: " . $stmt->error;
        }
    }
}
