<?php
    include('neg_seguridadUsuarioPermitido.php');
    $_SESSION['permitido'] = 0;
?>

<?php
    //Eliminado e implementado debajo
	//include("est_headRegistro.php");
?>
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
<?php//function comprobarPassword (eliminada)?>
<script>
    function verificarFormRegistro(){
        if(document.formRegistro.userNombre.value==""
        || userTypeDoc.value==""
        || document.formRegistro.userDoc.value==""
        || document.formRegistro.userEmail.value==""
        || document.formRegistro.userPass.value==""
        || document.formRegistro.userPass1.value==""
        || document.getElementById("checkAuthTerms").checked==false){
            alert("Hay campos vacíos o no diligenciados."
            +" Debe diligenciar todos los campos marcados con asterisco (*) en el formulario");
            document.formRegistro.userNombre.focus();
            if(document.getElementById("checkAuthTerms").checked==false){
                alert("No ha aceptado las Políticas, Términos y Condiciones de Uso.");
                document.getElementById("checkAuthTerms").focus();
            }
            return false;
        }
        
        if(document.formRegistro.userNombre.value!=""
        && userTypeDoc.value!=""
        && document.formRegistro.userDoc.value!=""
        && document.formRegistro.userEmail.value!=""
        && document.formRegistro.userPass.value!=""
        && document.formRegistro.userPass1.value!=""
        && document.getElementById("checkAuthTerms").checked==true){
            document.formRegistro.submit();
            return true;
        }
    }
    function validarNombre(texto){
        var nombre=document.getElementById("userNombre");
        if(!/^([A-Z a-zÑñÁÉÍÓÚáéíóú])*$/.test(texto)){
            document.formRegistro.userNombre.value="";
            alert("El formato de nombre \""+texto+"\" no es válido. Inténtelo de nuevo");
            document.formRegistro.userNombre.focus();
        }
    }

    function validarCorreo(texto){
        expr=/^[a-zA-ZÑñÜü0-9\.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+\.+[a-zA-Z0-9][{1,100}]*$/;
        if(!expr.test(texto)){
            document.formRegistro.userEmail.value="";
            alert("El formato de documento \""+texto+"\" no es válido. Inténtelo de nuevo");
            document.formRegistro.userEmail.focus();
        }
    }
    function validarPswrd(texto){
        if(!/^[A-ZÁÉÍÓÚÑ]+[0-9A-Za-zÑñÁÉÍÓÚÜáéíóúü.!#$%&'*+/=?^_`{|}~-]*$/.test(texto)){
            document.formRegistro.userPass.value="";
            alert('El formato de contraseña no es válido.\n Debe ser de más de 6 caracteres, con mayúscula inicial, y debe contener caracteres especiales. Inténtelo de Nuevo');
            document.formRegistro.userPass.focus();
        }
    }
    function validarPswrd1(texto){
        if(!/^[A-ZÁÉÍÓÚÑ]+[0-9A-Za-zÑñÁÉÍÓÚÜáéíóúü.!#$%&'*+/=?^_`{|}~-]*$/.test(texto)){
            document.formRegistro.userPass1.value="";
            alert("El formato de contraseña no es válido. Inténtelo de Nuevo");
            document.formRegistro.userPass1.focus();
        }
        if((document.formRegistro.userPass1.value)!=(document.formRegistro.userPass.value)){
            alert("Las contraseñas no coinciden. Inténtelo de nuevo.");
            document.formRegistro.userPass.value="";
            document.formRegistro.userPass1.value="";
            document.formRegistro.userPass.focus();
        }
    }
</script>
<!--Script para Material Design, sobre la validación de formularios
    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>-->
<!--Recordar 
<script>
    $('#myAlert').on('closed.bs.alert', function () {
        
    })
</script>-->
<title> Registrarse | Ngr </title>
</head>
<body>
<div class="full-box login-container p-xs-0 p-sm-5">
    <form name="formRegistro"  method="POST" action="neg_registroUsuario_usuario.php"  class="register-container px-md-5" onsubmit="return verificarFormRegistro()" autocomplete="off" novalidate>
    <!--Link para Regresar-->
    <a class="btn btn-outline-link text-white p-2 volver" href="pre_usuarioPermitido_usuario.php">Volver</a><br><br>

    <h2 class="text-center text-uppercase text-info">Registrarse</h2>
    <br>
    <noscript>
    <div class="form-group label-floating">
            <div class="alert alert-danger text-white">
                No es posible enviar el formulario sin Javascript. Por favor habilite Javascript en la configuración de su navegador
            </div>
        </div>
    </noscript>
    <div class="form-group label-floating">
        <div class="alert alert-secondary alert-dimissible text-dark">
            <strong>El asterisco (*)</strong> indica campos obligatorios
            <button type="button" class="close overflow-hidden" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <div class="form-group label-floating">
        <label class="control-label my-auto" for="userNombre">Nombre Completo*</label>
        <input class="form-control" style="color:#ffffff;" id="userNombre" name="nombre" type="text" pattern="[A-Z a-zÑñÁÉÍÓÚÜáéíóúü]{1,50}" 
            onchange="validarNombre(this.value)" autofocus="autofocus" required>
        <p class="help-block">Escriba aquí su nombre en letras para personalizar el servicio</p>
        <noscript>
            <small><i><p class="text-white">Escriba aquí su nombre en letras para personalizar el servicio</p></i></small>
        </noscript>
    </div>
    <div style="" class="form-group">
        <label for="userTypeDoc" class="control-label" >Tipo de Documento*</label>
        <select style="color:#ffffff; background-color: #000000AA; padding: 5px;" name="tipoDocumento" class="form-control" id="userTypeDoc"
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
        <p class="help-block">Seleccione su Tipo de Documento de Identidad</p>
        <noscript>
            <small><i><p class="text-white">Seleccione su Tipo de Documento de Identidad</p></i></small>
        </noscript>
        <br>
    </div>
    <div class="form-group label-floating">
        <label class="control-label" for="userDoc">Documento*</label>
        <input value="<?php echo $_SESSION['documentopermitido']; ?>" class="form-control" style="color:#ffffff;" id="userDoc" name="documento" type="text" pattern="[0-9]" disabled>
        <small class="text-white"><i>(Este es el Documento que podrá usar para acceder al sistema)</i></small>
        <br>
        <br>
    </div>

    <div class="form-group label-floating">
        <label class="control-label my-auto" for="userEmail">Correo Electrónico*</label>
        <input class="form-control" style="color:#ffffff;" id="userEmail" name="correo" type="email"
            pattern="[a-zA-ZÑñÜü0-9\.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9]+\.+[a-zA-Z0-9]+{1,100}" onchange="validarCorreo(this.value)"+ required>
        <p class="help-block">Escribe tu correo electrónico.<br>&nbsp;<i>Debe ser un correo real para enviarle un código de seguridad en caso de que olvide su contraseña</i></p>
        <noscript>
            <small><i><p class="text-white">Escribe tu correo electrónico.<br>&nbsp;<i>Debe ser un correo real para enviarle un código de seguridad en caso de que olvide su contraseña</p></i></small>
        </noscript>
        <br>
        <br>
    </div>
    <div class="form-group label-floating">
        <label class="control-label" for="userPass">Contraseña*</label>
        <input class="form-control" style="color:#ffffff;" id="userPass" name="password" type="password"
            pattern="[A-ZÁÉÍÓÚÑ]+[0-9A-Za-zÑñÁÉÍÓÚÜáéíóúü.!#$%&'*+/=?^_`{|}~]{6,50}" onchange="validarPswrd(this.value)"+ required>
        <p class="help-block">Escribe una nueva contraseña.<br>&nbsp; <i>Debe ser de más de 6 caracteres, con mayúscula inicial, y debe contener caracteres especiales como proceso de seguridad.</i></p>
        <noscript>
            <small><i><p class="text-white">Escribe una nueva contraseña.<br>&nbsp; <i>Debe ser de más de 6 caracteres, con mayúscula inicial, y debe contener caracteres especiales como proceso de seguridad.</i></p></p></i></small>
        </noscript>
        <br>
        <br>
    </div>
    <div class="form-group label-floating">
        <label class="control-label" for="userPass1">Confirmar Contraseña*</label>
        <input class="form-control" style="color:#ffffff;" id="userPass1" name="password1" type="password" pattern="[A-ZÁÉÍÓÚÑ]+[0-9A-Za-zÑñÁÉÍÓÚÜáéíóúü.!#$%&'*+/=?^_`{|}~]{6,50}" onchange="validarPswrd1(this.value)"+ required>
        <p class="help-block">Vuelve a escribir la contraseña.</p>
        <br>
    </div>
    <br>
    <br>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="checkAuthTerms" required>
        <label class="custom-control-label" for="checkAuthTerms">
            Conozco y Acepto las <a class="link-decorated" href="pre_politcs.php" target="_blank" title="Políticas del Aplicativo. Dentro del mismo también podrá consultarlas.">Políticas de Uso del Aplicativo</a>*</label>
    </div>
    <!--<div class="form-group label-floating">
        <label class="control-label" for="noRobot">(No soy un Robot)</label>
        <input type="text" class="form-control" style="color:#ffffff;" id="noRobot" name="noRobot" + required>
        <p class="help-block">Resuelve esto para indicarnos que no eres un Robot</p>
    </div>-->
    <div class="form-group text-center">
        <button type="button" class="btn btn-raised btn-info" name="btnRegistrar" onClick="verificarFormRegistro()">Regístrarte</button>
    </div>
    </form>
</div>
</body>
</html>
