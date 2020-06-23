<?php
	include("neg_seguridad_2.php");
	$_SESSION['capa'] = 2;
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
	<title>Inicio - Superadministrador</title>
</head>
<body>
	<?php 
		include('neg_conexion.php');
		$estado_session = session_status();

		if($estado_session == PHP_SESSION_NONE){
			session_start();
		}
		if($estado_session != PHP_SESSION_NONE){
			$usuarioNombre=$_SESSION["usuarioNombre"];
			if($_SESSION["rol"] > 0){
			}
		}
		$documento=$_SESSION["documento"];
		$sql="SELECT * FROM Permiso WHERE fk_usuarioDocumento='$documento'";
		if (!$result=$db->query($sql)){
			die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
		}
		while ($row=$result->fetch_assoc()){
			$iid_Rol = $row['fk_id_Rol'];
		}
		$sql2="SELECT * FROM Rol WHERE id_Rol='$iid_Rol'";
		if (!$result2=$db->query($sql2)){
			die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
		}
		while ($row2=$result2->fetch_assoc()){
			$rrol = $row2['rolNombre'];
		}

		$_SESION["rol"] = $rrol;

	?>
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
                            <option hidden value="" title="select" label="" selected disabled>Superadministrador</option>
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
		
		
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles text-center text-capitalize">Usuarios en el sistema</h1>
			</div>
			<?php
				if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 1)){			
			?>
			<div class="container">
				<div class="alert alert-warning alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Atención!</strong> Se Ha Modificado El Estado Del Usuario.
				</div>
			</div>
			<?php 
				}
			?>
			<?php
            	if(isset($_REQUEST["e"]) && $_REQUEST["e"]==1){
        	?>
			<div class="container">
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Correcto.</strong> Se ha registrado correctamente el usuario
				</div>
			</div>
        	<?php
            	}
        	?>

			<section class="container" style="padding-bottom:3%;">
				<div class="row">
					<div class="col-xs-7 col-md-10">
						<div class="btn-group" role="group" arial-label="Herarmientas">
							<a class="btn btn-primary" href="pre_registrarUsuario_superadmin.php"
							 title="Registrar un usuario &#13;desde el Superadministrador">+ Registrar</a>
							<a class="btn btn-default" href="pre_usuarioPermitido_superadmin.php" title="Permisos para registrarse">Usuarios Permitidos</a>
							<a class="btn btn-default" href="pre_roles.php" title="Roles del Sistema">Roles</a>
							<a class="btn btn-default" href="pre_tiposDocumento.php" title="Tipos de Documento del Sistema">Tipos de Documento</a>
						</div>
					</div>
				</div>
			</section>
			
			<div class="panel panel-default" title="Tabla de los usuarios regístrados en el sistema">				
				<div class="panel-body">
					<div class="table-responsive">
						<table id="example" class="table table-responsive-sm table-hover table-outline mb-0">
						<caption>Lista de usuarios registrados</caption>
						<thead class="">
							<tr class="info">
								<th scope="col">N° Documento</th>
								<th scope="col">Nombre</th>
								<th scope="col">Correo</th>
								<th scope="col">Fecha de Registro</th>
								<th scope="col">Estado</th>
								<th scope="col">Permisos</th>
							</tr>
						</thead>
						<tbody>
						<?php
							include("neg_conexion.php");
							$sql = "SELECT * FROM Usuario";
							if(!$result = $db->query($sql)){
								die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
							}
							while($row = $result->fetch_assoc()){
							$documento = $row['usuarioDocumento'];  
							$nombre = $row['usuarioNombre'];
							$correo = $row['usuarioCorreoElectronico'];
							$fecha = $row['usuarioFechaRegistro'];
							$fk_estado = $row['fk_id_EstadoUsuario'];
							$permitido = $row['fk_id_UsuarioPermitido'];
						
							//sub consulta estado usuario
								$sql2 = "SELECT * FROM EstadoUsuario WHERE id_EstadoUsuario='$fk_estado'";
								if(!$result2 = $db->query($sql2)){
									die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
								}
								while($row2 = $result2->fetch_assoc()){	
									$estado = $row2['estadoUsuario'];
								}
						?>
							<tr>
								<th scope="row"><?php echo $documento ?></th>
								<td><?php echo $nombre ?></td>
								<td><?php echo $correo ?></td>
								<td><?php echo $fecha ?></td>
								<td>
									<form class="form-inline" action="neg_cambiarEstadoUsuario.php" method="POST" id="permisos" name="permisos">
										<div class="form-group">
											<?php echo $estado ?>
											<input type='hidden' name='estado' value="<?php echo $fk_estado ?>">
											<input type="hidden" name="documento" value="<?php echo $documento ?>">
										</div>
										<?php
											if($documento != $_SESSION['documento']){
										?>
										<button type="submit" class="btn btn-warning"><i class="zmdi zmdi-edit"></i></button>
										<?php
											}
										?>
									</form>
								</td>
								<td>
									<form action="pre_permisos.php" method="POST" id="permisos" name="permisos">
										<input type="hidden" name="documento" value="<?php echo $documento ?>">
										<button type="submit" class="btn btn-secondary">consultar</button>
									</form>
								</td>
							</tr>
							<?php
								}
							?>
						</tbody>
						</table>
					</div>					
				</div>
			</div>

			<section id="" class="container">

                
			
			</section>
			
		</div>
		<section>
			<br><hr>
			<?php include("est_footer.php"); ?>
		</section>
	</section>

</body>
</html>