<?php
	include("neg_seguridad_3.php");
	$_SESSION['capa'] = 3;
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
	<title>Inicio - Administrador</title>
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
				if($_SESSION['nPermisos'] != 1){
			?>
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
                    <div class="form-group">
                        <figcaption class="text-center text-titles mb-2">Rol de Usuario</figcaption>
                        <select class="form-control" name="rol" id="rol" onchange="location = this.value">
                            <option hidden value="" title="select" label="" selected disabled>Administrador</option>
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
				include('est_sideBar_admin.php');
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
			  <h1 class="text-titles"><span class="text-info">Sistema</span> Control de Inventarios - ADMINISTRADOR</h1>
			</div>
		</div>
		
		
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles text-center">Últimas Actualizaciones <?php echo $_SESSION['nPermisos']; ?></h1>
			</div>
			<section id="" class="container">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                    <caption>Lista de los últimos cambios en el sistema</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mesa</td>
                            <td>01/09/2019</td>
                            <td>Mesa principal - comedor</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Silla</td>
                            <td>26/08/2019</td>
                            <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Sillón</td>
                            <td>05/08/2019</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint itaque unde sit.</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Cama</td>
                            <td>15/07/2019</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Armario</td>
                            <td>10/07/2019</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
			</section>
			<hr>
			<section>
				<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda quae unde necessitatibus repellat debitis enim dolorem, temporibus mollitia nemo velit aspernatur excepturi ut esse pariatur reprehenderit eos nisi natus?</p>
				<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda quae unde necessitatibus repellat debitis enim dolorem, temporibus mollitia nemo velit aspernatur excepturi ut esse pariatur reprehenderit eos nisi natus?</p>
				<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda quae unde necessitatibus repellat debitis enim dolorem, temporibus mollitia nemo velit aspernatur excepturi ut esse pariatur reprehenderit eos nisi natus?</p>
				<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda quae unde necessitatibus repellat debitis enim dolorem, temporibus mollitia nemo velit aspernatur excepturi ut esse pariatur reprehenderit eos nisi natus?</p>
				<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda quae unde necessitatibus repellat debitis enim dolorem, temporibus mollitia nemo velit aspernatur excepturi ut esse pariatur reprehenderit eos nisi natus?</p>
				<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda quae unde necessitatibus repellat debitis enim dolorem, temporibus mollitia nemo velit aspernatur excepturi ut esse pariatur reprehenderit eos nisi natus?</p>
				<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda quae unde necessitatibus repellat debitis enim dolorem, temporibus mollitia nemo velit aspernatur excepturi ut esse pariatur reprehenderit eos nisi natus?</p>
				<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda quae unde necessitatibus repellat debitis enim dolorem, temporibus mollitia nemo velit aspernatur excepturi ut esse pariatur reprehenderit eos nisi natus?</p>
				<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam assumenda quae unde necessitatibus repellat debitis enim dolorem, temporibus mollitia nemo velit aspernatur excepturi ut esse pariatur reprehenderit eos nisi natus?</p>
			</section>
		</div>
		<section>
			<br><hr>
			<?php include("est_footer.php"); ?>
		</section>
	</section>

</body>
</html>