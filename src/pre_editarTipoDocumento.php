<?php
    include("neg_seguridad_2.php");
    $rolNombre = $_POST['rolNombre'];
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
	<title>Editar Tipo de Documento: <?php$rolNombre?></title>
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
                        <figcaption class="text-center text-titles mb-2">Tipos de Documento de los Usuarios</figcaption>
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
			  <h1 class="text-titles text-center">Editar Tipo de Documento del Sistema</h1>
        </div>
		<?php 
			if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 1)){			
		?>
			<div class="container" style=" margin-top: 7px; max-width: 630px;">
				<div class="alert alert-danger alert-dimissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Ups!</strong> No ha realizado cambios en el Tipo de Documento.
				</div>
			</div>
		<?php 
			}
		?>
        <div class="container" style="max-width: 630px;">
            <form action="neg_editarTipoDocumento.php" method="POST" autocomplete="off">
                <div class="form-group">
                    <label>Nombre del Tipo de Documento</label>
                    <input type="text" class="form-control" name="rolNombre" placeholder="Nombre del Rol" value="<?php echo $rolNombre ?>" required>
                    <input type="hidden" name="rolNombreAnterior" value="<?php echo $rolNombre ?>">
                </div>
                <center>
					<a href="pre_tiposDocumento.php" class="btn btn-danger">Cancelar</a>
					<button type="submit" class="btn btn-primary">Editar</button>
				</center>
            </form>
		</div>
		<section>
			<br><hr>
			<?php include("est_footer.php"); ?>
		</section>
	</section>

</body>
</html>