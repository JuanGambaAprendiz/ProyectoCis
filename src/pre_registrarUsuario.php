<?php
    include("neg_seguridad_2.php");
?>

<?php 
	include("est_headMain.php");
?>

<title>Agregar Rol</title>

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
			include("est_navbar_dashboard.php");
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
        <form name="registro"  method="POST" onsubmit="return comprobarPassword(this)" action="neg_registrarUsuario.php"  class="register-container px-md-5" autocomplete="off">
                <div class="form-group label-floating">
                    <label class="control-label my-auto" for="UserNom">Nombre y Apellido</label>
                    <input class="form-control"  id="UserNom" name="nombres" type="text" pattern="[A-ZÑÁÉÍÓÚa-zñáéíóú ]+" placeholder="Ingrese el Nombre y Apellido del Usuario" + required>
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" for="UserDoc">Documento</label>
                    <input class="form-control"  id="UserDoc" name="documento" type="text" pattern="[0-9 ]+" placeholder="Ingrese el Documento de Identificación del Usuario" + required>
                </div>
                <div style="" class="form-group">
                    <label for="UserTypeDoc" class="control-label" >Tipo de Documento</label>
                    <select name="tipodocumento" class="form-control" id="UserTypeDoc"  required="value > 0">
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
                    <label class="control-label my-auto" for="UserEmail">Correo Electrónico</label>
                    <input class="form-control"  id="UserEmail" name="correo" type="text" placeholder="Ingrese el Correo de recuperación del Usuario" + required>                    
                </div>
            
                <div class="form-group label-floating">
                    <label class="control-label" for="UserTel">Teléfono</label>
                    <input class="form-control"  id="UserTel" name="telefono" type="text" pattern="[0-9 ]+" placeholder="Ingrese el Teléfono de Contacto del Usuario" + required>                    
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" for="UserPass">Contraseña</label>
                    <input class="form-control"  id="UserPass" name="password" type="password" placeholder="Ingrese la Contraseña de Ingreso Para Usuario" + required>                    
                </div>
                <div class="form-group label-floating">
                    <label class="control-label" for="UserPass">Confirmar Contraseña</label>
                    <input class="form-control"  id="UserPass1" name="password1" type="password" placeholder="Ingrese la Contraseña Nuevamente" + required>                
                </div>
                <br>
                <br>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" + required>
                    <label class="custom-control-label" for="customCheck1">Acepto Términos y Condiciones</label>
                </div>
                <br>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-raised btn-primary" onClick="comprobarPassword()">Registrar</button>
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