<?php
	include("neg_seguridad_1.php");
	$_SESSION['capa'] = 1;
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
	<title>Inicio</title>
</head>
<body>
	<?php
		include("est_sidebar_dashboard.php");
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
		<div class="container-fluid" style="margin-top: 150px;">
			<div class="page-header text-center">
				<h1 style="font-size: 60px;" class="text-titles">BIENVENIDO</h1>
			  	<br>
			  	<p>Seleccione el rol en el menú para continuar</p>
			</div>
		</div>


		<section>
			<br><br><br><br><br><br><hr>
			<?php include("est_footer.php"); ?>
		</section>
	</section>

</body>
</html>