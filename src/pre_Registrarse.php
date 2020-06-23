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
<link rel="stylesheet" href="./css/registro.css">
<link rel="stylesheet" href="./css/bootstrap-material-design.min.css">
<title> Registrarse | Ngr </title>
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
        || formRegistro.userTypeDoc.value==""
        || document.formRegistro.userDoc.value==""
        || document.formRegistro.userEmail.value==""
        || document.formRegistro.userPass.value==""
        || document.formRegistro.userPass1.value==""
        || document.getElementById("checkAuthTerms").checked==false){
            alert("Hay campos vacíos o no diligenciados."
            +" Debe Diligenciar todos los campos del formulario");
            return false;
        }
        if(document.formRegistro.userNombre.value!=""
        || userTypeDoc.value!=""
        || document.formRegistro.userDoc.value!=""
        || document.formRegistro.userEmail.value!=""
        || document.formRegistro.userPass.value!=""
        || document.formRegistro.userPass1.value!=""
        || document.getElementById("checkAuthTerms").checked==true){
            document.formRegistro.submit();
            return true;
        }
        function validarNombre(texto){
            if(!([A-Za-zÑñÁÉÍÓÚáéíóú].test(texto))){
                document.formRegistro.userNombre.value=="";
                alert("El formato del nombre \""+texto+"\" No es válido.")
            }
        }
    }
</script>
<!--Recordar 
<script>
    $('#myAlert').on('closed.bs.alert', function () {
        
    })
</script>-->
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="my-5 p-3">
                <form name="formRegistro"  method="POST" action="neg_registroUsuario.php"  class="register-container px-md-5" onsubmit="return verificarFormRegistro()" autocomplete="off">
                <!--Link para Regresar-->
                <a class="btn btn-outline-link text-white p-2" href="pre_usuarioPermitido.php">Volver</a><br><br>

                <h2 class="text-center text-uppercase text-info">Registrarse</h2>
                <br>

                <div class="form-group label-floating">
                    <label class="control-label my-auto" for="userNombre">Nombre y Apellido</label>
                    <input class="form-control" style="color:#ffffff;" id="userNombre" name="nombre" type="text" pattern="[A-Za-zÑñÁÉÍÓÚáéíóú]{1,50}" 
                     onchange="validarNombre(this.value)" autofocus required>
                    <p class="help-block">Escribe tu primer nombre y tu primer apellido</p>
                </div>
                <div style="" class="form-group">
                    <label for="userTypeDoc" class="control-label" >Tipo de Documento</label>
                    <select style="color:#ffffff; background-color: #000000AA; padding: 5px;" name="tipodocumento" class="form-control" id="userTypeDoc" 
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
                    <label class="control-label" for="userDoc">Documento</label>
                    <input value="<?php echo $_SESSION['documentopermitido']; ?>" class="form-control" style="color:#ffffff;" id="userDoc" name="documento" type="text" pattern="[0-9 ]+" disabled>
                </div>
                
                <div class="form-group label-floating">
                    <label class="control-label my-auto" for="userEmail">Correo Electrónico</label>
                    <input class="form-control" style="color:#ffffff;" id="userEmail" name="correo" type="text" + required>
                    <p class="help-block">Escribe tu correo electrónico</p>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" for="userPass">Contraseña</label>
                    <input class="form-control" style="color:#ffffff;" id="userPass" name="password" type="password" + required>
                    <p class="help-block">Escribe una nueva contraseña</p>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" for="userPass1">Confirmar Contraseña</label>
                    <input class="form-control" style="color:#ffffff;" id="userPass1" name="password1" type="password" + required>
                    <p class="help-block">Vuelve a escribir la contraseña</p>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" for="userTel">Teléfono</label>
                    <input class="form-control" style="color:#ffffff;" id="userTel" name="telefono" type="text" pattern="[0-9 ]{10}+">
                    <p class="help-block">Escribe tu número de contacto</p>
                </div>
                <br>
                <br>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="checkAuthTerms" required>
                    <label class="custom-control-label" for="checkAuthTerms"
                     title="Políticas del Aplicativo. Dentro del mismo podrá consultarlas.">
                     Conozco y Acepto las Políticas de Uso del Aplicativo</label>
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
        </div>
    </div>
    </div>

</body>
</html>
