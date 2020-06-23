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
	<title>Datos de Usuario</title>
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
			include("est_navbar_dashboard_banner.php");
		?>
		
		<!-- Contenido de la página -->
		<div class="container-fluid" style="margin-top: 50px;">
			<div class="page-header">
			  <h1 class="text-titles text-center text-primary">INFORMACIÓN PERSONAL</h1>
			</div>
            <?php 
			if((isset($_REQUEST['e'])) and ($_REQUEST['e'] == 1)){			
            ?>
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>¡Perfecto!</strong> Datos Modificados Correctamente.
            </div>
            <?php 
                }
            ?>
            <?php 
                if((isset($_REQUEST['p'])) and ($_REQUEST['p'] == 2)){			
            ?>
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>¡Perfecto!</strong> Se Ha Cambiado De Contraseña Correctamente.
            </div>
            <?php 
                }
            ?>
            
		</div>

        <!-- caja de información persoonal -->
        <div class="row">
            <div class="col-sm-4 col-md-3"></div>
            <div class="col-sm-4 col-md-6">
                <div class="container-fluid">
                    <div class="panel panel-default" style="width: 100%; margin: auto;">
                        <div class="panel-body bg-primary" style="width: 95%; margin: auto;  margin-top: 15px;">                            
                            <center><img src="img/perfil/account.png" class="bg-info" style="border-radius: 100px;width: 150px;height: 150px; border: #fff 2px solid; transform: translate(0%, 60%);"></center>
                        </div>
                        
                        <center><a href="#" title="Cambiar Foto" class="btn btn-info" style=" width: 40px; height: 40px; -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%; transform: translate(135%, 70%);"><i class="zmdi zmdi-edit  zmdi-hc-lg" ></i></a></center>

                        <br><br><br>                                      
                        <div class="panel-body" style="width: 95%; margin: auto;">
                            <p class="h3 text-center"><?= $_SESSION["usuarioNombre"]; ?></p>
                        </div>                   
                    
                        <div class="panel-body" style="width: 100%; margin: auto;">            
                            <center>
                                <div class="table-responsive" style="max-width: 630px;">
                                    <table class="table">
                                    <?php
                                        $documento = $_SESSION['documento'];
                                        include("neg_conexion.php");
                                        $sql = "SELECT * FROM Usuario WHERE usuarioDocumento = '$documento'";
                                        if(!$result = $db->query($sql)){
                                            die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
                                        }
                                        while($row = $result->fetch_assoc()){
                                            $fk_id_TipoDocumento = $row['fk_id_TipoDocumento'];
                                            $usuarioNombre = $row['usuarioNombre'];
                                            $usuarioPswrd = $row['usuarioPswrd'];
                                            $usuarioCorreoElectronico = $row['usuarioCorreoElectronico'];
                                            
                                            $sql2 = "SELECT * FROM Usuario INNER JOIN TipoDocumento ON fk_id_TipoDocumento=id_TipoDocumento WHERE Usuario.fk_id_TipoDocumento = '$fk_id_TipoDocumento' AND usuarioDocumento='$documento'";
                                            if(!$result2 = $db->query($sql2)){
                                                die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
                                            }
                                            while($row2 = $result2->fetch_assoc()){
                                                $tipoDocumento = $row2['tipoDocumento'];
                                            }
                                    ?>  
                                        <tr>
                                            <th scope="row">Tipo de Documento:</th>
                                            <td><?php echo $tipoDocumento; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Documento:</th>
                                            <td><?php echo $_SESSION['documento']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Nombre:</th>
                                            <td><?php echo $usuarioNombre; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Contraseña:</th>
                                            <td>
                                                <?php
                                                $tam = strlen($usuarioPswrd);
                                                    for ($i = 1; $i <= $tam; $i++) {
                                                        echo '*';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Correo Electrónico:</th>
                                            <td><?php echo $usuarioCorreoElectronico; ?></td>
                                        </tr>
                                        <tr>
                                        </tr>
                                        <tr>
                                            <th scope="row">Rol(es):</th>
                                            <td>
                                                <?php
                                                    $sql3 = "SELECT * FROM Permiso WHERE fk_usuarioDocumento = '$documento'";
                                                    if(!$result3 = $db->query($sql3)){
                                                        die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
                                                    }
                                                    while($row3 = $result3->fetch_assoc()){
                                                        $fk_id_Rol = $row3['fk_id_Rol'];

                                                        $sql4 = "SELECT * FROM Rol WHERE id_Rol = '$fk_id_Rol'";
                                                        if(!$result4 = $db->query($sql4)){
                                                            die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
                                                        }
                                                        while($row4 = $result4->fetch_assoc()){
                                                            $rolNombre = $row4['rolNombre'];

                                                            echo '- '.$rolNombre;
                                                ?>
                                                <br>
                                                <?php 
                                                        }
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </table>
                                </div>

                                <hr>
                                <div>
                                    <a href="pre_editarDatosUsuario.php" class="btn btn-info">Modificar Información</a>
                                    <a href="#" class="btn btn-success">Cambiar Contraseña</a>
                                </div>

                            </center>  
                        </div>    
                       

                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3"></div>
        </div>
        
            

		<section>
			<br><br><hr>
			<?php include("est_footer.php"); ?>
		</section>
	</section>

</body>
</html>