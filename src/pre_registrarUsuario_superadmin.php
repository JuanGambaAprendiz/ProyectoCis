<?php
    include("neg_seguridad_2.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="./img/logo/favicon_ngr.ico">
    <link rel="stylesheet" href="./css/main.css">
	<?php 
		include("din_headMain.php");
	?>
    <script>
        <?php
        /*function verificarregistro_superadmin(){
            if(document.registro_superadmin.userNombre.value==""
            || userTypeDoc.value==""
            || document.registro_superadmin.userDoc.value==""
            || document.registro_superadmin.userEmail.value==""
            || document.registro_superadmin.userPass.value==""
            || document.registro_superadmin.userPass1.value==""
            || document.getElementById("checkAuthTerms").checked==false){
                alert("Hay campos vacíos o no diligenciados."
                +" Debe diligenciar todos los campos marcados con asterisco (*) en el formulario");
                document.registro_superadmin.userNombre.focus();
                if(document.getElementById("checkAuthTerms").checked==false){
                    alert("No ha aceptado las Políticas, Términos y Condiciones de Uso.");
                    document.getElementById("checkAuthTerms").focus();
                }
                return false;
            }
            
            if(document.registro_superadmin.userNombre.value!=""
            && userTypeDoc.value!=""
            && document.registro_superadmin.userDoc.value!=""
            && document.registro_superadmin.userEmail.value!=""
            && document.registro_superadmin.userPass.value!=""
            && document.registro_superadmin.userPass1.value!=""
            && document.getElementById("checkAuthTerms").checked==true){
                document.registro_superadmin.submit();
                return true;
            }
        }*/
        ?>
        function validarNombre(texto){
            var nombre=document.getElementById("userNombre");
            if(!/^([A-Z a-zÑñÁÉÍÓÚáéíóú])*$/.test(texto)){
                document.registro_superadmin.userNombre.value="";
                alert("El formato de nombre \""+texto+"\" no es válido. Inténtelo de nuevo");
                document.registro_superadmin.userNombre.focus();
            }
        }
        function validarDocumento(texto){
            if(!/^[0-9]*$/.test(texto)){
                document.registro_superadmin.userDoc.value="";
                alert("El formato de documento \""+texto+"\" no es válido.\n Verifique que la extensión de su registro no exceda los 20 dígitos. Inténtelo de nuevo");
                document.registro_superadmin.userDoc.focus();
            }
        }
        function validarCorreo(texto){
            expr=/^[a-zA-ZÑñÜü0-9\.!#$%&'*+/=?^_`{|}~-]+\@[a-zA-Z0-9]+\.+[a-zA-Z0-9\.]*$/;
            if(!expr.test(texto)){
                document.registro_superadmin.userEmail.value="";
                alert("El formato de documento \""+texto+"\" no es válido.\n Debe ser un correo real para recuperar su contraseña. Inténtelo de nuevo");
                document.registro_superadmin.userEmail.focus();
            }
        }
        function validarPswrd(texto){
            if(!/^[A-ZÁÉÍÓÚÑ]+[0-9A-Za-zÑñÁÉÍÓÚÜáéíóúü.!#$%&'*+/=?^_`{|}~-]*$/.test(texto)){
                document.registro_superadmin.userPass.value="";
                alert('El formato de contraseña no es válido.\n Debe ser de más de 6 caracteres, con mayúscula inicial, y debe contener caracteres especiales. Inténtelo de Nuevo');
                document.registro_superadmin.userPass.focus();
            }
        }
        function validarPswrd1(texto){
            if(!/^[A-ZÁÉÍÓÚÑ]+[0-9A-Za-zÑñÁÉÍÓÚÜáéíóúü.!#$%&'*+/=?^_`{|}~-]*$/.test(texto)){
                document.registro_superadmin.userPass1.value="";
                alert("El formato de contraseña no es válido. Inténtelo de Nuevo");
                document.registro_superadmin.userPass1.focus();
            }
            if((document.registro_superadmin.userPass1.value)!=(document.registro_superadmin.userPass.value)){
                alert("Las contraseñas no coinciden. Inténtelo de nuevo.");
                document.registro_superadmin.userPass.value="";
                document.registro_superadmin.userPass1.value="";
                document.registro_superadmin.userPass.focus();
            }
        }
    </script>
	<title>Registrar Usuario - Superadministrador</title>
</head>
<body>
	<!-- Barra de la izquierda -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				Muebles NGR <i class="zmdi zmdi-close btn-menu-dashboard"></i>
			</div>
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
                    <div class="form-group">
                        <figcaption class="text-center text-titles mb-2">Rol de Usuario</figcaption>
                        <select class="form-control" name="rol" id="rol" onchange="location = this.value">
                            <option hidden value="" title="select" label="" selected disabled>Superadministrador</option>
							<?php
								include('est_select.php');
							?>
                        </select>
                    </div>
				</figure>
			</div>
			<!--Menú interno-->
			<?php
				include('est_sideBar_superAdmin.php');
			?>
		</div>
	</section>

	<!-- Contenido del tablero -->
	<section class="full-box dashboard-contentPage">
		
		<?php
			include("est_navbar_dashboard_banner.php");
		?>
		
		<!-- Contenido de la página -->
		<div class="container-fluid" style="margin-top: 15px;">
			<div class="page-header">
			  <h1 class="text-titles"><span class="text-info">Sistema</span> Control de Inventarios - SUPERADMINISTRADOR</h1>
			</div>
        </div>
        <div class="page-header">
			  <h1 class="text-titles text-center">Registrar Usuario</h1>
        </div>
        <div class="container" style="max-width: 630px;">
            <a class="btn btn-link" href="s_indexl_superAdmin.php" title="Inicio-Superadministrador">Volver</a><br><br>
            <noscript>
                <div class="alert alert-danger">
                    No es posible enviar el formulario sin Javascript. Por favor habilite Javascript en la configuración de su navegador
                </div>
            </noscript>
            <?php
                if(isset($_REQUEST["e"]) && $_REQUEST["e"]==1){
            ?>
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>¡Ups!</strong> El documento indicado ya existe. Está intentando registrar un usuario que ya está registrado.
                </div>
            <?php
                }
            ?>
            <div class="alert alert-info alert-dimissible">
                <strong>El asterisco (*)</strong> indica campos obligatorios
                <button type="button" class="close overflow-hidden" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="registro_superadmin"  method="POST" action="neg_registrarUsuario_superadmin.php"  class="register-container px-md-5" autocomplete="off">
                <div class="form-group label-floating">
                    <label class="control-label my-auto" for="UserNom">Nombre y Apellido*</label>
                    <input class="form-control" id="userNombre" name="nombre" type="text" pattern="[A-Z a-zÑñÁÉÍÓÚÜáéíóúü]{1,50}" 
                     onchange="validarNombre(this.value)" autofocus="autofocus" placeholder="Ingrese el Nombre y Apellido del Usuario" required>
                </div>
                <div style="" class="form-group">
                    <label for="UserTypeDoc" class="control-label" >Tipo de Documento*</label>
                    <select name="tipoDocumento" class="form-control" id="userTypeDoc"
                     title="Elija un Tipo de Documento" alt="Tipos de Documento" required="value > 0">
                        <option value="" selected="selected">Seleccione una Opción...</option>
                        <?php
                            include("neg_conexion.php");
                            $sql = "SELECT * FROM TipoDocumento";
                            if (!$result = $db -> query($sql))
                            {
                                die ('Hay un error corriendo en la consulta o datos no encontrados [' .$db->error . ']');
                            }
                            while($row = $result->fetch_assoc())
                            {
                                $id = $row['id_TipoDocumento'];
                                $TD = $row['tipoDocumento'];

                                echo "<option value='$id'>$TD</option>";
                            }

                        ?>
                    </select>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" for="userDoc">Documento*</label>
                    <input class="form-control"  id="userDoc" name="documento" type="text" pattern="[0-9]{1,20}" onchange="validarDocumento(this.value)"
                     placeholder="Ingrese el Documento de Identificación del Usuario" + required>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label my-auto" for="userEmail">Correo Electrónico*</label>
                    <input class="form-control" id="userEmail" name="correo" type="email" placeholder="Ingrese el Correo de recuperación del Usuario"
                     pattern="[a-zA-ZÑñÜü0-9\.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+\.+[a-zA-Z0-9\.]{1,100}" onchange="validarCorreo(this.value)"+ required>                
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" for="userPass">Contraseña*</label>
                    <input class="form-control" id="userPass" name="password" type="password" placeholder="Ingrese la Contraseña de Ingreso Para Usuario"
                     pattern="[A-ZÁÉÍÓÚÑ]+[0-9A-Za-zÑñÁÉÍÓÚÜáéíóúü.!#$%&'*+/=?^_`{|}~]{6,50}" onchange="validarPswrd(this.value)"+ required>                
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" for="userPass1">Confirmar Contraseña*</label>
                    <input class="form-control" id="userPass1" name="password1" type="password" placeholder="Ingrese la Contraseña Nuevamente"
                     pattern="[A-ZÁÉÍÓÚÑ]+[0-9A-Za-zÑñÁÉÍÓÚÜáéíóúü.!#$%&'*+/=?^_`{|}~]{6,50}" onchange="validarPswrd1(this.value)"+ required>
                </div>
                <br>
                <br>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkAuthTerms" + required>
                    <label class="custom-control-label" for="checkAuthTerms">
                     Conozco y Acepto las <a href="pre_politcs.php" target="_blank" title="Políticas del Aplicativo. Dentro del mismo también podrá consultarlas.">Políticas de Uso del Aplicativo</a>*</label>
                </div>
                <br>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-raised btn-primary">Registrar</button>
                </div>
            </form>
		</div>
		<section>
			<br><hr>
			<?php include("est_footer.php"); ?>
		</section>
	</section>
    
</body>
</html>