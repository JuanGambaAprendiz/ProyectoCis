<?php
	include("neg_seguridad_1.php");
	$_SESSION['capa'] = 1;
?>

<?php 
	include("est_headMain.php");
?>

<title>Inicio</title>

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
			include("est_navbar_dashboard.php");
		?>
		
		<!-- Contenido de la página -->
		<div style="margin-top: 150px;" class="container text-center">
			<div class="page-header">
			  <h1 style="font-size: 60px;" class="text-titles">BIENVENIDO</h1>
			  <br>
			  <p>Seleccione El Rol En El Menú Para Continuar</p>
			</div>
		</div>
		<section>
			<br><br><br><br><br><br><hr>
			<?php include("est_footer.php"); ?>
		</section>
	</section>

</body>
</html>