<?php

require 'app.php';

function incluirTemplate($nombre)
{
    include TEMPLATES_URL . "/" . $nombre . ".php";
}

function obtenerData(string $nombre): string
{
    return isset($nombre) ? $nombre : null;
}

function validarLogin()
{
    session_start();

    $session = isset($_SESSION['logged_in_user_id']) ? $_SESSION['logged_in_user_id'] : null;

    if ($session) {

        header('Location: ../src/lista_productos.php');
    }
}


function logout()
{
    session_start();
    unset($_SESSION['logged_in_user_id']);
    header('Location: ../index.php');
}
