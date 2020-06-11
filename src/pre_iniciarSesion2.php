<?php
	//include("est_headSesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/sesion.css">
	<link rel="stylesheet" href="./css/bootstrap-material-design.min.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<title>Iniciar Sesión</title>
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script>
    	$.material.init();
	</script>
</head>

<body style="background-image: url('./img/fondos/prueba2.jpg');">
	<div class="container">
		<div class="flex-row">
			<div class="d-flex justify-content-md-center">
					<form action="neg_evaluarSesion.php" method="POST" autocomplete="off" class="logInForm">
						<a class="btn btn-outline-link text-white p-2" href="index.php">Volver</a><br><br>
			            <h2 class="text-center text-uppercase">Iniciar Sesión</h2>
			            <br>
						<div class="form-group label-floating">
						  <label class="control-label" for="UserDoc" style="color:#ffffff;">Documento</label>
						  <input class="form-control" style="color:#ffffff;" id="UserDoc" name="documento" type="text" pattern="[0-9 ]+" + required autofocus="autofocus">
						  <p class="help-block">Escribe tu número de identificación</p><br>
						</div>
						<div class="form-group label-floating">
						  <label class="control-label" for="UserPass" style="color:#ffffff;">Contraseña</label>
						  <input class="form-control" style="color:#ffffff;" id="UserPass" name="password" type="password" + required>
						  <p class="help-block">Escribe tu contraseña</p><br>
						</div>
						<div class="form-group text-center">
							<input type="submit" value="Iniciar sesión" class="btn btn-info" style="color: #FFF;">
							<p>¿No tienes cuenta? <a href="pre_usuarioPermitido.php" style="color: #03A9F4;">Regístrate</a></p>
						</div>
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
	</div>
</div>
</body>
</html>
