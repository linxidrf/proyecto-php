<?php


require '../config/conexion.php';

$db = conectarDB();


$nombre = isset($_POST["nombre"]) ? $_POST["correo"] : null;
$apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : null;
$identificacion = isset($_POST["identificacion"]) ? $_POST["identificacion"] : null;
$correo = isset($_POST["correo"]) ? $_POST["correo"] : null;
$correo = isset($_POST["celular"]) ? $_POST["celular"] : null;
$password = isset($_POST["password"]) ? $_POST["password"] : null;
$registro = isset($_POST["registro"]) ? $_POST["registro"] : null;
$login = isset($_POST["login"]) ? $_POST["login"] : null;

// echo "Nombre: {$nombre}, Apellido: {$apellido}, Identidicacion: {$identificacion}, Correo: {$correo}, Password: {$password}";


// Registrar
if (isset($registro)) {

    // Consulta SQL preparada
    $sql = "INSERT INTO administrador (nombre, apellido, identificacion,celular, correo,  pass) values (?, ?, ?, ?, ?, ?)";


    // Preparar la consulta
    $stmt = $db->prepare($sql);

    // Vincular parámetros y valores
    $stmt->bind_param("isssss", $nombre,$apellido, $identificacion, $correo,$celular , $password);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        //echo "Datos insertados correctamente.";
        header("Location: ../src/login-admin.php");
    } else {
        echo "Error al insertar datos: " . $stmt->error;
    }
}



//Login
if (isset($login)) {
    // Consulta SQL preparada
    $sql = "SELECT * FROM administrador WHERE correo = ? AND pass = ?";
    // SELECT identificacion FROM usuario WHERE correo = 'correo@gmail.com' and pass = '123456'

    // Preparar la consulta
    $stmt = $db->prepare($sql);

    // Vincular parámetros y valores
    $stmt->bind_param("ss", $correo, $password);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        //echo "Datos insertados correctamente.";
        //header("Location;inicio-sesion.html");
        // Obtener el resultado
        $resultado = $stmt->get_result();

        // Comprobar si se encontraron registros
        if ($resultado->num_rows === 1) {

            session_start();
            $_SESSION['logged_in_user_id'] = '1';

           header("Location: ../src/lista_productos.php");
        } else {
            $error="Correo electrónico o contraseña incorrectos.";
            header("Location: ../src/login.php?error=".$error);
          
        }
    } else {
        echo "Error al insertar datos: " . $stmt->error;
    }

    // Cerrar la consulta preparada
    $stmt->close();
}
