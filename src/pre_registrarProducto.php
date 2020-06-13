<?php
	include("neg_seguridad_3.php");
    $_SESSION['capa'] = 3;
    $fecha = new DateTime();
    $fecha -> modify('-6 hours');
    $fechaD = $fecha->format('Y-m-d');
    $fechaT = $fecha->format('H:i:s');
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
	<title>Productos - Administrador</title>
    <script>
        function validarNombre(texto){
            var nombre=document.getElementById("productoNombre");
            if(!/^([A-Z a-zÑñÁÉÍÓÚáéíóú])*$/.test(texto)){
                document.registro_producto.productoNombre.value="";
                alert("El formato de nombre \""+texto+"\" no es válido. Inténtelo de nuevo");
                document.registro_producto.productoNombre.focus();
            }
        }
        function validarDescripcion(texto){
            if(!/^[0-9]*$/.test(texto)){
                document.registro_producto.categoriaTelefono.value="";
                alert("El formato de documento \""+texto+"\" no es válido.\n Verifique que la extensión de su registro no exceda los 400 carácteres. Inténtelo de nuevo");
                document.registro_producto.categoriaTelefono.focus();
            }
        }                      
    </script>
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
			  <h1 class="text-titles"><span class="text-info">Productos</span> - ADMINISTRADOR</h1>
			</div>
		</div>
		
		
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles text-center text-capitalize">Registrar producto</h1>
			</div>
            
			<div class="container" style="max-width: 630px;">
                <a class="btn btn-link" href="pre_productos.php" title="productos Registrados">Volver</a><br><br>
                <noscript>
                    <div class="alert alert-danger">
                        No es posible enviar el formulario sin Javascript. Por favor habilite Javascript en la configuración de su navegador
                    </div>
                </noscript>
                <?php
                    if(isset($_REQUEST["e"]) && $_REQUEST["e"]==1){
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>¡Ups!</strong> El producto indicado ya existe. Está intentando registrar un producto cuyo código ya está registrado.
                    </div>
                <?php
                    }
                ?>
                <div class="alert alert-info alert-dimissible">
                    <strong>El asterisco (*)</strong> indica campos obligatorios
                    <button type="button" class="close overflow-hidden" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form name="registro_producto"  method="POST" action="neg_registrarProducto.php"  class="register-container px-md-5" autocomplete="off">
                    <div class="form-group label-floating">
                        <label class="control-label my-auto" for="productoNombre">Nombre*</label>
                        <input class="form-control" id="productoNombre" name="nombre" type="text" pattern="[A-Z a-zÑñÁÉÍÓÚÜáéíóúü]{1,50}" 
                        onchange="validarNombre(this.value)" placeholder="Ingrese el Nombre del producto" + required autofocus>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label my-auto" for="productoCodigo">Código*</label>
                        <input class="form-control" id="productoCodigo" name="codigo" type="text" placeholder="Ingrese el Código del producto" + required>
                    </div>                    
                    
                    <div class="form-group label-floating">
                        <label for="productoFechaRegistro" class="col-2 col-form-label">Fecha de Registro*</label>
                        <div class="col-10">
                            <input class="form-control" name="fecharegistro" type="datetime-local"   value="<?= $fechaD?>T<?= $fechaT ?>" id="productoFechaRegistro">
                        </div>
                    </div>           

                    <div class="form-group">
                        <label for="categoria">Categoria*</label>
                        <select class="form-control" name="categoria" id="categoria" required="value > 0">
                        <option value="" selected disabled>Categoria del producto</option>
                        <?php
                            include("neg_conexion.php");
							$sql = "SELECT * FROM Categoria";
							if(!$result = $db->query($sql)){
								die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
							}
							while($row = $result->fetch_assoc()){
                                $id_Categoria = $row['id_Categoria'];  
                                $categoria = $row['categoria']; 
                                
                        ?>
                        <option value="<?= $id_Categoria ?>"><?= $categoria ?></option>                                
                        <?php                                
                            }                        
                        ?>
                        </select>
                    </div>

                    <div class="form-group label-floating">
                        <label class="control-label" for="productoDescripcion">Descripción*</label>
                        <textarea class="form-control" name="descripcion" id="productoDescripcion" cols="auto" rows="3" onchange="validarDescripcion(this.value)"
                        placeholder="Ingrese la descripción de la categoria" + required></textarea>
                    </div>  

                    <div class="form-group">
                        <label for="proveedor">Proveedor*</label>
                        <select class="form-control" name="proveedor" id="proveedor" required="value > 0">
                        <option value="" selected disabled>proveedor del producto</option>
                        <?php
                            include("neg_conexion.php");
							$sql2 = "SELECT * FROM ProveedorMaterial";
							if(!$result2 = $db->query($sql2)){
								die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
							}
							while($row2 = $result2->fetch_assoc()){
                                $id_ProveedorMaterial  = $row2['id_ProveedorMaterial'];  
                                $proveedorNombre = $row2['proveedorNombre'];
                                $fk_id_estadoProveedor = $row2['fk_id_estadoProveedor']; 
                                if($fk_id_estadoProveedor == 1){                               
                        ?>
                        <option value="<?= $id_ProveedorMaterial ?>"><?= $proveedorNombre ?></option>
                        <?php
                                }
                                if($fk_id_estadoProveedor == 2){
                        ?>
                        <option disabled><?= $proveedorNombre ?> (inactivo)</option>
                        <?php
                                }
                            }
                        ?>                    
                        </select>
                    </div>
                                     
                    <br>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-raised btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
		<section>
			<br><hr>
			<?php include("est_footer.php"); ?>
		</section>
	</section>

</body>
</html>