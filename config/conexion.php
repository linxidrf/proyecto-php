<?php



function conectarDB(): mysqli
{
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_datos = "papeleria";

    $db = new mysqli($servidor, $usuario, $contrasena, $base_datos);

    //$db = new mysqli('mysql_db', 'root', 'secret', 'papeleria');

    if (!$db) {
        echo "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        exit;
    }
    return $db;
}
