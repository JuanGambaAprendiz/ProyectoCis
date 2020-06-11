
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/userStyles.css">
	<link rel="stylesheet" href="./css/bootstrap-material-design.min.css">
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script>
    	$.material.init();
	</script>
	<title>Iniciar Sesión</title>
</head>

<body>
	<div class="full-box login-container cover mt-5 p-5">
		<form action="neg_evaluarSesion.php" method="POST" autocomplete="off" class="logInForm">
			<a class="btn btn-outline-link text-white p-2" href="index.php">Volver</a><br><br>
			<h2 class="text-center text-uppercase">Iniciar Sesión</h2>
			<br>
			<div class="form-group label-floating">
				<label class="control-label" for="UserDoc" style="color:#ffffff;">Documento</label>
				<input class="form-control" style="color:#ffffff;" id="UserDoc" name="documento" type="text" pattern="[0-9 ]+" + required autofocus="autofocus">
				<p class="help-block">Escriba su número de identificación</p><br>
				<noscript><p class="text-white"><small><i>Escriba su número de identificación</i></small></p></noscript>
			</div>
			<div class="form-group label-floating">
				<label class="control-label" for="UserPass" style="color:#ffffff;">Contraseña</label>
				<input class="form-control" style="color:#ffffff;" id="UserPass" name="password" type="password" + required>
				<p class="help-block">Escribe tu contraseña</p>
				<noscript><p class="text-white"><small><i>Escribe tu contraseña</i></small></p></noscript><br>
			</div>
			<div class="form-group text-center">
				<input type="submit" value="Iniciar sesión" class="btn btn-info" style="color: #FFF;">
				<p>¿No tienes cuenta? <a class="link-decorated" href="pre_usuarioPermitido_usuario.php" style="color: #03A9F4;">Regístrate</a></p>
			</div>
			<noscript>
				<div class="form-group text-center">
					<small><i><p class="text-white bg-danger p-2">Es posible que algunas Funciones no estén disponibles sin Javascript. Por favor habilite Javascript en la Configuración del Navegador.</p></i></small>
				</div>
			</noscript>
		<!-- Mensajes de error:-->
		<?php
			if((isset($_REQUEST['e'])) and ($_REQUEST['e'] == 1)){
		?>
		<div>
			<p class="text-center bg-danger">Ha ingresado datos incorrectos. Por favor Inténtelo de nuevo</p>
		</div>
		<?php
			}
		?>
		<?php
			if((isset($_REQUEST['e'])) and ($_REQUEST['e'] == 2)){
		?>
		<div>
			<p class="text-center bg-danger">Esta cuenta se encuantra inactiva en el sistema.</p>
		</div>
		<?php
			}
		?>
		<?php
			if((isset($_REQUEST['e'])) and ($_REQUEST['e'] == 3)){
		?>
		<div>
			<p class="text-center bg-danger">No tiene permisos para ingresar al sistema.</p>
		</div>
		<?php
			}
		?>
		<?php
			if((isset($_REQUEST['e'])) and ($_REQUEST['e'] == 4)){
		?>
		<div>
			<p class="text-center bg-success">Usuario Registrado Correctamente.</p>
		</div>
		<?php
			}
		?>
		</form>
	</div>
</body>
</html>
