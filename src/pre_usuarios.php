<?php
	include("neg_seguridad_2.php");
?>

<?php 
	include("est_headMain.php");
?>

<title>Usuarios</title>

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
		<?php 
			if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 1)){			
		?>
		<div class="alert alert-warning alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>¡Atención!</strong> Se Ha Modificado El Estado Del Usuario.
		</div>
		<?php 
			}
		?>
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles text-center">Usuarios en el sistema</h1>
			</div>
			<section id="" class="container">
                <div class="table-responsive">
                    <table id="example" class="table table-hover table-bordered">
                    <caption>Lista de usuarios registrados</caption>
                    <thead class="">
                        <tr class="info">
                            <th scope="col">N° Documento</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Télefono</th>
                            <th scope="col">Fecha de Registro</th>
							<th scope="col">Estado</th>
							<td scope="col">Permisos</th>
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
                        $telefono = $row['usuarioTelefono'];
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
							
							if($documento != $_SESSION['documento']){
                    ?>
                        <tr>
                            <th scope="row"><?php echo $documento ?></th>
                            <td><?php echo $nombre ?></td>
                            <td><?php echo $correo ?></td>
                            <td><?php echo $telefono ?></td>
                            <td><?php echo $fecha ?></td>
							<td>
								<form class="form-inline" action="neg_cambiarEstadoUsuario.php" method="POST" id="permisos" name="permisos">
									<div class="form-group">
										<?php echo $estado ?>
										<input type='hidden' name='estado' value="<?php echo $fk_estado ?>">
										<input type="hidden" name="documento" value="<?php echo $documento ?>">
									</div>
									<button type="submit" class="btn btn-warning"><i class="zmdi zmdi-edit"></i></button>
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
                            }
                        ?>
                    </tbody>
                    </table>
                </div>
			</section>
		</div>
		<section>
			<br><hr>
			<?php include("est_footer.php"); ?>
		</section>
	</section>

</body>
</html>