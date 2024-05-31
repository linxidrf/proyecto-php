<?php

require '../src/funciones.php';

validarLogin()

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA_Compatible" content=ie=edge>
  <link rel="stylesheet" href="../css/styles.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>Login</title>
</head>

<body>
	<section class="form-register">
		<h4>Login</h4>
		<form method="post" action="../src/iniciose.php">
			<input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo">
			<input class="controls" type="password" name="password" id="password" placeholder="Ingrese su Contraseña">
			<input type="hidden" name="login" value="login">
			<center> <button>Iniciar sesion</button></center>
		</form>

		<center><a href="../src/formulario.php">¿No tienes cuenta?</a></center>

		<br>
		<center><a href="../index.php">Volver al inicio</a></center></br>

	</section>



	<?php
	$error = isset($_REQUEST['error']) ? $_REQUEST['error'] : null;
	if ($error) {
		echo ("<div id='error' style='display:none;'>$error</div>");
	}
	?>
	<script>
		const el = document.getElementById('error')
		const error = el.textContent;

		if (error) {
			mensaje(error);
		}

		function mensaje(msg) {
			Swal.fire({
				title: 'Error!',
				text: msg,
				icon: 'error',
				confirmButtonText: 'Continuar'
			})
		}
	</script>

</body>

</html>