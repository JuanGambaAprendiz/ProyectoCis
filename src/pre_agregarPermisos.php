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
	<title>Agregar Permiso</title>
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
			  <h1 class="text-titles text-center">Agregar Permiso</h1>
        </div>
        <div class="container" style="max-width: 630px;">
            <form action="neg_agregarPermiso.php" method="POST">
                <select name="rolNombre" id="" class="form-control">
        <?php 
            class Rol{
                function imprimirRolesSelector($documento){
                    include("neg_conexion.php");
                    $nPermisos = 0;
                    $sql = "SELECT * FROM Rol";
                    if(!$result = $db->query($sql)){
                        die('Error en consulta ['.$db->error. ']');
                    }
                    while($row = $result->fetch_assoc()){  
                        $id_Rol = $row['id_Rol'];
                        $rolNombre = $row['rolNombre'];                         
                ?>
                    <option value="<?php echo $id_Rol ?>"><?php echo $rolNombre; ?></option>
                <?php        
                    }   
                ?>
                </select>
                <input type="hidden" name="documento" value="<?php echo $documento ?>">
                <center>
					<a href="pre_permisos.php" class="btn btn-danger">Cancelar</a>
					<button type="submit" class="btn btn-primary">Agregar</button>
				</center>
        <?php
                }
            }
            $rol = new Rol();
            $rol -> imprimirRolesSelector($_POST["documento"]);                       
        ?>
            </form>
		</div>
		<?php 
			if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 1)){			
		?>
			<div class="container" style=" margin-top: 7px; max-width: 630px;">
				<center><p class="text-danger">El usuario ya tiene ese permiso, seleccione otro.</p></center>
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