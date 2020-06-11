<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="./css/userStyles.css">
    <link rel="stylesheet" href="./css/bootstrap-material-design.min.css">
	<script src="./js/jquery-3.4.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script>
		$.material.init();
	</script>
	<script>
		function verificarFormUsPermitido(){
			var documento=document.usPermitido.userDoc;
			if(documento.value==""){
				documento.setCustomValidity('No ha ingresado su documento');
			}
			if(documento.value!=""){
				documento.setCustomValidity('');
			}
		}
	</script>
	<title>Validar Registro | NGR</title>
</head>

<body>
	<div class="full-box login-container cover mt-5 p-5">
		<form name="usPermitido" action="neg_evaluarRegistro_usuario.php" method="POST" autocomplete="off" class="logInForm">
			<a class="btn btn-outline-link text-white p-2" href="pre_iniciarSesion.php">Volver</a><br><br>
            <h2 class="text-center text-uppercase text-danger">Verificación de Seguridad</h2>
            <br>
            <p class="text-center">Señor Usuario, se va a hacer una comprobación de su identidad, para verificar su permiso para poder registrarse.</p>
			<p class="text-center">Por favor diligencie la siguiente información:</p>
			<div class="form-group label-floating">
			  <label class="control-label" for="userDoc" style="color:#ffffff;">Documento</label>
			  <input class="form-control" style="color:#ffffff;" id="userDoc" name="documento" type="text" pattern="[0-9 ]+" autofocus="autofocus" title="Ingrese su documento aquí si está autorizado" required>
			  <p class="help-block">Escriba su número de identificación</p>
			  <noscript><p class="text-white"><small><i>Escriba su número de identificación</i></small></p></noscript>
			</div>
			<?php
				if((isset($_REQUEST['e'])) and ($_REQUEST['e'] == 1)){
			?>
			<div>
                <br>
				<p class="text-center bg-danger">Usted ya se encuentra registrado en el sistema.</p>
			</div>
			<?php
				}
			?>
			<?php
				if((isset($_REQUEST['e'])) and ($_REQUEST['e'] == 2)){
			?>
			<div>
                <br>
				<p class="text-center bg-danger">Usted no se encuentra autorizado para registrarse.</p>
			</div>
			<?php
				}
			?>
			<noscript>
				<p class="text-white bg-danger p-2"><small><i>Es posible que algunas funciones no esten disponibles (Javascript Deshabilitado)</i></small></p>
			</noscript>
			<div class="form-group text-center">
				<center><input type="submit" value="Validar" class="btn btn-raised btn-info" style="color: #FFF;" onclick="verificarFormUsPermitido()"></center>
			</div>
        </form>
    </div>

</body>
</html>
