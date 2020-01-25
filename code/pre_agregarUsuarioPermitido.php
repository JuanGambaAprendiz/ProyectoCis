<?php
    include("neg_seguridad_2.php");
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
	<title>Agregar Usuario Permitido</title>
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
			  <h1 class="text-titles text-center">Agregar Usuario Permitido</h1>
        </div>
        <div class="container" style="max-width: 630px;">
			<?php 
				if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 1)){			
			?>
			<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Error.</strong> El documento ya ha sido registrado.
			</div>
			<?php 
				}
			?>
            <form action="neg_agregarUsuarioPermitido.php" method="POST" autocomplete="off">
                <div class="form-group">
                    <label>Número de Documento</label>
                    <input type="text" class="form-control" name="documento" placeholder="Documento de Identificación" pattern="[0-9 ]+" + required>
                </div>
                <center>
					<a href="pre_usuarioPermitido_superadmin.php" class="btn btn-danger">Cancelar</a>
					<button type="submit" class="btn btn-primary">Agregar</button>
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