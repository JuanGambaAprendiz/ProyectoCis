<?php
	include("est_headSesion.php");
?>

<title>Validar Registro</title>

<body>
	<div class="full-box login-container cover p-3">
		<form action="neg_evaluarRegistro.php" method="POST" autocomplete="off" class="logInForm">
			<a class="btn btn-outline-link text-white p-2" href="pre_iniciarSesion2.php">Volver</a><br><br>
            <h2 class="text-center text-uppercase text-danger">Verificación de Seguridad</h2>
            <br>
            <p class="text-center">Señor Usuario, se va a hacer una comprobación de su identidad, para verificar su permiso para poder registrarse.</p>
			<p class="text-center">Por favor diligencie la siguiente información:</p>
			<div class="form-group label-floating">
			  <label class="control-label" for="UserDoc" style="color:#ffffff;">Documento</label>
			  <input class="form-control" style="color:#ffffff;" id="UserDoc" name="documento" type="text" pattern="[0-9 ]+" autofocus="autofocus" + required>
			  <p class="help-block">Escribe tu número de identificación</p>
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
			<div class="form-group text-center">
				<center><input type="submit" value="Validar" class="btn btn-raised btn-info" style="color: #FFF;"></center>
			</div>
        </form>
    </div>

</body>
</html>
