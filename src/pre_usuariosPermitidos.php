<?php
	include("neg_seguridad_2.php");
?>

<?php 
	include("est_headMain.php");
?>

<title>Usuarios Permitidos</title>

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
		<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>¡Perfecto!</strong> Documento Agregado Correctamente.
		</div>
		<?php 
			}
        ?>
        <?php 
			if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 2)){			
		?>
		<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>¡Perfecto!</strong> Se Ha Eliminado El Documento Correctamente.
		</div>
		<?php 
			}
		?>
         <?php 
			if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 3)){			
		?>
		<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>¡Perfecto!</strong> Se Ha Editado El Documento Correctamente.
		</div>
		<?php 
			}
		?>
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles text-center">Usuarios Permitidos Para Registrarse En El Sistema</h1>
			</div>
            <center>
			<section id="" class="container">
                <div class="table-responsive" style="max-width: 630px;">
                    <table id="example" class="table table-hover table-bordered">
                    <caption>Lista de los documentos permitidos para ser registrados</caption>
                    <thead class="">
                        <tr class="warning">
                            <th scope="col">N° Documento</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include("neg_conexion.php");
                        $sql = "SELECT * FROM UsuarioPermitido";
                        if(!$result = $db->query($sql)){
                            die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
                        }
                        while($row = $result->fetch_assoc()){
						$documento = $row['fk_usuarioDocumento'];
						if($documento != $_SESSION['documento']){
                    ?>
                        <tr>
                            <th scope="row"><?php echo $documento ?></th>
							<td>
								<form action="pre_editarUsuarioPermitido.php" method="POST" id="editar" name="editar">
									<input type="hidden" name="documento" value="<?php echo $documento ?>">
									<button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
								</form>
							</td>
                            <td>
                                <form action="neg_eliminarUsuarioPermitido.php" method="POST" id="eliminar" name="elimiar">
                                    <input type="hidden" name="documento" value="<?php echo $documento ?>">
                                    <button class="btn btn-danger" onclick ="return ConfirmDelete()"><i class="zmdi zmdi-delete"></i></button>
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
            <div class="container" style="transform: translate(18.3%, 0); margin-top: 5px;">
                <a href="pre_agregarUsuariosPermitidos.php" class="btn btn-primary">Agregar</a>
            </div>
		</div>
        <section>
			<br><hr>
			<?php include("est_footer.php"); ?>
		</section>
	</section>


</body>
</html>