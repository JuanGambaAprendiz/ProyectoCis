<?php
    include("neg_seguridad_2.php");
    if(isset($_POST['documento'])){
        $_SESSION['docUs'] = $_POST['documento'];
    }
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
	<title>Permisos del usuario</title>
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
        <?php 
            class Permiso{
                function verificarPermisos($documento){
                    include("neg_conexion.php");
                    $nPermisos = 0;
                    if($documento == true){
                        $documento = $_POST['documento'];
                    }
                    if($documento == false){
                        $documento = $_SESSION['docUs'];
                    }
                    $sql = "SELECT * FROM Usuario WHERE UsuarioDocumento = '$documento'";
                    if(!$result = $db->query($sql)){
                        die('Error en consulta ['.$db->error. ']');
                    }
                    while($row = $result->fetch_assoc()){
                        $docum = $row['usuarioDocumento']; 
                        $nombre = $row['usuarioNombre'];
                    }
                    $sql2="SELECT * FROM Permiso WHERE fk_usuarioDocumento='$documento'";
                    if (!$result2=$db->query($sql2)){
                        die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
                    }
                    while ($row2=$result2->fetch_assoc()){
                        $nPermisos = $nPermisos + 1;
                    }
                    if($nPermisos == 0){
                        ?>
                            <section class="container" style="padding-bottom:2%;">
                                <div class="row">
                                    <div class="col-xs-7 col-md-4">
                                        <form action="pre_agregarPermisos.php" method="POST" id="permisos" name="permisos">
                                            <a class="btn btn-link" href="s_indexl_superAdmin.php" title="Inicio-Superadministrador">Volver</a>
                                            <input type="hidden" name="documento" value="<?php echo $documento ?>">
                                            <button type="submit" class="btn btn-primary" title="Agregar Acceso al Módulo de un Rol">Agregar</button>                                            
                                        </form>
                                    </div>
                                </div>
                            </section>
                            <p class="text-center">Este Usuario no tiene permisos</p>                            
                        <?php
                    }
                    if($nPermisos > 0 ){
        ?>
        <?php 
			if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 1)){			
		?>
		<div class="container">
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>¡Perfecto!</strong> Permiso agregado Correctamente.
            </div>
        </div>
		<?php 
			}
        ?>
        <?php 
			if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 2)){			
        ?>
        <div class="container">
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>¡Perfecto!</strong> Se Ha Eliminado El Permiso Correctamente.
            </div>
        </div>
		<?php 
			}
		?>
        <div class="page-header">
			  <h1 class="text-titles text-center">Permisos del Usuario: <?php echo $nombre; ?></h1>
        </div>
        <section class="container" style="padding-bottom:2%;">
            <div class="row">
                <div class="col-xs-7 col-md-4">
                    <form action="pre_agregarPermisos.php" method="POST" id="permisos" name="permisos">
                        <a class="btn btn-link" href="s_indexl_superAdmin.php" title="Inicio-Superadministrador">Volver</a>
                        <input type="hidden" name="documento" value="<?php echo $documento ?>">
                        <button type="submit" class="btn btn-primary" title="Agregar Acceso al Módulo de un Rol">Agregar</button>
                    </form>
                </div>
            </div>
        </section>
        <div class="container table-responsive" style="max-width: 630px;">
            <table class="table table-hover table-bordered">
            <caption>Lista de los roles que el usuario posee</caption>
            <thead class="">
                <tr class="info">
                    <th scope="col">Rol</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    }
                $sql3="SELECT * FROM Permiso WHERE fk_usuarioDocumento='$documento'";
                if (!$result3=$db->query($sql3)){
                    die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
                }
                while ($row3=$result3->fetch_assoc()){
                    $id_Rol = $row3['fk_id_Rol'];
                    $id_permiso = $row3['id_Permiso'];
                    
                    $sql4="SELECT * FROM Rol WHERE id_Rol='$id_Rol'";
                    if (!$result4=$db->query($sql4)){
                        die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
                    }
                    while ($row4=$result4->fetch_assoc()){
                        $rrol = $row4['rolNombre'];
                    }
                ?>
                <tr>
                    <th scope="row"><?php echo $rrol ?></th>
                    <td>
                        <form action="neg_eliminarPermiso.php" method="POST" id="permisos" name="permisos">
                            <input type="hidden" name="id_permiso" value="<?php echo $id_permiso ?>">
                            <?php
                                if(!($id_Rol==1 && $documento==987654321)){
                            ?>
                            <button class="btn btn-danger" onclick ="return ConfirmDelete()"><i class="zmdi zmdi-delete"></i></button>
                            <?php
                                }
                            ?>
                        </form>
                    </td>
                </tr>
                <?php 
                    }   
                ?>
            </tbody>
            </table>
        </div>
        <br>
        <?php
                }
            }
            $permiso = new Permiso();
            $permiso -> verificarPermisos(isset($_POST["documento"]));                       
        ?>
		<section>
			<br><hr>
			<?php include("est_footer.php"); ?>
		</section>
	</section>

</body>
</html>