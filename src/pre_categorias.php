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
	<title>Categorias - Administrador</title>
</head>

<body>
	<!-- Barra de la izquierda -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				MENÚ <i class="zmdi zmdi-close btn-menu-dashboard"></i>
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
			  <h1 class="text-titles"><span class="text-info">Categorias</span> - ADMINISTRADOR</h1>
			</div>
		</div>
		
		
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles text-center text-capitalize">Categorias registradas</h1>
			</div>			
            <?php
				if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 1)){			
			?>
			<div class="">
				<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Alerta!</strong> Se Ha Eliminado La Categoria.
				</div>
			</div>
			<?php 
				}
			?>
			<?php
				if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 2)){			
			?>
			<div class="">
				<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php if($_REQUEST['c'] > 1){ ?>
						<strong>¡Error!</strong> Hay <?= $_REQUEST['c'] ?> Productos que tienen esta categoría, modifique la categoría de los productos correspondientes para continuar.
					<?php } ?>
					<?php if($_REQUEST['c'] == 1){ ?>
						<strong>¡Error!</strong> Hay <?= $_REQUEST['c'] ?> Producto que tiene esta categoría, modifique la categoría del producto correspondiente para continuar.
					<?php } ?>
				</div>
			</div>
			<?php 
				}
			?>
			<?php
            	if(isset($_REQUEST["e"]) && $_REQUEST["e"]==1){
        	?>
			<div class="">
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Correcto.</strong> Se ha registrado correctamente la categoria.
				</div>
			</div>
        	<?php
            	}
            ?>
            <?php
            	if(isset($_REQUEST["e"]) && $_REQUEST["e"]==2){
        	?>
			<div class="">
				<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Correcto.</strong> Se ha actualizado correctamente la información de la categoria.
				</div>
			</div>
        	<?php
            	}
            ?>
            <?php
                if(isset($_REQUEST["e"]) && $_REQUEST["e"]==3){
            ?>
            <div class="">
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>¡Error!</strong> Se envió el formulario sin ningún cambio.
                </div>
            </div>
            <?php
                }
            ?>

			<?php
				if(isset($_REQUEST["e"]) && $_REQUEST["e"]==4){
			?>
				<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Ups!</strong> La categoria indicada ya existe. Está intentando cambiar al nombre de una categoria que ya está registrada.
				</div>
			<?php
				}
			?>
			
			<div class="panel panel-default">
				<div class="panel-body">

					<!-- botones -->					
					<div class="btn-group" role="group" arial-label="Herarmientas">
						<a class="btn btn-primary" href="pre_registrarCategoria.php" title="Registrar una Categoria">+ Registrar</a>						
					</div>
					<br>
					<br>

					<!--- Tabla -->
					<div class="table-responsive">
						<table id="example" class="table table-responsive-sm table-hover table-outline mb-0">
						<caption>Lista de Categorias registradas</caption>
						<thead class="">
							<tr class="warning">								
								<th scope="col">Nombre de la Categoria</th>
								<th scope="col">Descripción</th>							                               						
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
							</tr>
						</thead>
						<tbody>
						<?php
							include("neg_conexion.php");
							$sql = "SELECT * FROM Categoria";
							if(!$result = $db->query($sql)){
								die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
							}
							while($row = $result->fetch_assoc()){
							$id_Categoria = $row['id_Categoria'];  
							$categoria = $row['categoria'];
							$categoriaDescripcion = $row['categoriaDescripcion'];																		
						?>
							<tr>
								<th scope="row"><?php echo $categoria ?></th>
								<td><?php echo $categoriaDescripcion ?></td>								
                                <td>
                                    <form class="form-inline" action="pre_editarCategoria.php" method="POST" id="" name="">
										<div class="form-group">																					
                                            <input type="hidden" name="idc" value="<?php echo $id_Categoria ?>">
                                            <center><button type="submit" class="btn btn-primary"><i class="zmdi zmdi-border-color"></i></button></center>
										</div>										
									</form> 
                                </td>
                                <td>                                    
                                    <form class="form-inline" action="neg_eliminarCategoria.php" method="POST" id="eliminar" name="elimiar">
										<div class="form-group">																						
                                            <input type="hidden" name="idc" value="<?= $id_Categoria; ?>">
                                            <center><button class="btn btn-danger" onclick ="return ConfirmDelete()"><i class="zmdi zmdi-delete"></i></button></center>
										</div>										
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