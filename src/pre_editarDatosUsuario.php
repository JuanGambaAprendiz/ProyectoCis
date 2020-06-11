<?php
    include("neg_seguridad_1.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
	<?php 
		include("din_headMain.php");
	?>
	<title>Modificar Información Personal</title>
</head>
<body>
	<!-- Barra de la izquierda -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				Muebles NGR <i class="zmdi zmdi-close btn-menu-dashboard"></i>
			</div>
			<?php 
				if($_SESSION['rol'] > 1){
			?>
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
                    <div class="form-group">
                        <figcaption class="text-center text-titles mb-2">Rol de Usuario</figcaption>
                        <select class="form-control" name="rol" id="rol" onchange="location = this.value">
                            <option hidden value="" title="select" label="" selected disabled>Usuario</option>
							<?php
								include('est_select.php');
							?>
                        </select>
                    </div>
				</figure>
			</div>
			<?php
				}
			?>
			<!--Menú interno-->
			<?php
				include('est_sideBar_usuario.php');
			?>
		</div>
	</section>

	<!-- Contenido del tablero -->
	<section class="full-box dashboard-contentPage">
		
		<?php
			include("est_navbar_dashboard_banner.php");
		?>
		
		<!-- Contenido de la página -->
		<div class="container-fluid" style="margin-top: 50px;">
			<div class="page-header">
			  <h1 class="text-titles text-center text-primary">INFORMACIÓN PERSONAL</h1>
			</div>
        </div>
        <div class="page-header">
			  <h1 class="text-titles text-center">Modificar información personal</h1>
        </div>
        <div class="container" style="max-width: 630px;">
        <form name="registro"  method="POST" action="neg_editarDatosUsuario.php"  class="register-container px-md-5" autocomplete="off">
                <div class="form-group label-floating">
                    <label class="control-label my-auto" for="UserNom">Nombre y Apellido</label>
                    <input class="form-control" value="<?php echo $_SESSION['usuarioNombre']; ?>" id="UserNom" name="usuarioNombre" type="text" pattern="[A-ZÑÁÉÍÓÚa-zñáéíóú ]+" placeholder="Ingrese el Nombre y Apellido del Usuario" + required>
                </div>
                <div style="" class="form-group">
                    <label for="UserTypeDoc" class="control-label" >Tipo de Documento</label>
                    <select name="usuarioTipoDocumento" class="form-control" id="UserTypeDoc"  required="value > 0">
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
                    <input class="form-control" value="<?php echo $_SESSION['usuarioCorreo']; ?>" id="UserEmail" name="usuarioCorreo" type="text" placeholder="Ingrese el Correo de recuperación del Usuario" + required>                    
                </div>
                <br>
                <center>
					<a href="pre_datosUsuario.php" class="btn btn-danger">Cancelar</a>
					<button type="submit" class="btn btn-primary">Editar</button>
				</center>
            </form>
		</div>
		
		<?php 
			if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 1)){			
		?>
			<div class="container" style=" margin-top: 7px; max-width: 630px;">
				<center><p class="text-danger">No ha realizado cambios en el rol.</p></center>
			</div>
		<?php 
			}
		?>
		<?php
			if((isset($_REQUEST['r'])) and ($_REQUEST['r'] == 1)){
		?>
			<div class="container" style=" margin-top: 7px; max-width: 630px;">
				<center><p class="text-danger">El Nombre que ingresó es el mismo que ya estaba<br>
				registrado</p></center>
			</div>
		<?php
			}
		?>
		<section>
			<br><hr>
			<?php include("est_footer.php"); ?>
		</section>
	</section>

</body>
</html>