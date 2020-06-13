<?php
	include("neg_seguridad_3.php");
    $_SESSION['capa'] = 3;
    $idp= $_POST['idp'];
    include("neg_conexion.php");
    $sql = "SELECT * FROM Producto WHERE id_Producto = '$idp'";
    if(!$result = $db->query($sql)){
        die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
    }
    while($row = $result->fetch_assoc()){
        $productoNombre = $row['productoNombre'];
        $productoCodigo = $row['productoCodigo'];     
        $dbfk_id_Categoria = $row['fk_id_Categoria'];   
        $productoDescripcion = $row['productoDescripcion'];   
        $dbfk_id_ProveedorMaterial = $row['fk_id_ProveedorMaterial'];
        
        $sql2 = "SELECT * FROM Categoria WHERE id_Categoria = '$dbfk_id_Categoria'";
        if(!$result2 = $db->query($sql2)){
            die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
        }
        while($row2 = $result2->fetch_assoc()){    
            $dbcategoria = $row2['categoria']; 
        }
        $sql3 = "SELECT * FROM ProveedorMaterial WHERE id_ProveedorMaterial = '$dbfk_id_ProveedorMaterial'";
        if(!$result3 = $db->query($sql3)){
            die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
        }
        while($row3 = $result3->fetch_assoc()){         
            $dbproveedorNombre = $row3['proveedorNombre'];
        }
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
			  <h1 class="text-titles text-center text-capitalize">Editar producto</h1>
			</div>
            
			<div class="container" style="max-width: 630px;">
                <a class="btn btn-link" href="pre_productos.php" title="productos Registrados">Volver</a><br><br>
                <noscript>
                    <div class="alert alert-danger">
                        No es posible enviar el formulario sin Javascript. Por favor habilite Javascript en la configuración de su navegador
                    </div>
                </noscript>

                <div class="alert alert-info alert-dimissible">
                    <strong>El asterisco (*)</strong> indica campos obligatorios
                    <button type="button" class="close overflow-hidden" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form name="registro_producto"  method="POST" action="neg_editarProducto.php"  class="register-container px-md-5" autocomplete="off">
                    <input type="hidden" name="idp" value="<?php echo $idp ?>">                   
                    <div class="form-group label-floating">
                        <label class="control-label my-auto" for="productoNombre">Nombre*</label>
                        <input class="form-control" id="productoNombre" name="nombre" type="text" pattern="[A-Z a-zÑñÁÉÍÓÚÜáéíóúü]{1,50}" 
                        onchange="validarNombre(this.value)" autofocus="autofocus" placeholder="Ingrese el Nombre del producto" value="<?= $productoNombre ?>" + required>
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label my-auto" for="productoCodigo">Código*</label>
                        <input class="form-control" id="productoCodigo" name="codigo" type="text" placeholder="Ingrese el Código del producto" value="<?= $productoCodigo ?>" + required>
                    </div>                                                                      

                    <div class="form-group">
                        <label for="categoria">Categoria*</label>
                        <select class="form-control" name="categoria" id="categoria">
                        <option value="<?= $dbfk_id_Categoria ?>" selected><?= $dbcategoria ?></option>
                        <?php
                            include("neg_conexion.php");
							$sql4 = "SELECT * FROM Categoria";
							if(!$result4 = $db->query($sql4)){
								die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
							}
							while($row4 = $result4->fetch_assoc()){
                                $id_Categoria = $row4['id_Categoria'];  
                                $categoria = $row4['categoria']; 
                                
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
                        placeholder="Ingrese la descripción de la categoria" + required><?= $productoDescripcion ?></textarea>
                    </div>  

                    <div class="form-group">
                        <label for="proveedor">Proveedor*</label>
                        <select class="form-control" name="proveedor" id="proveedor">
                        <option value="<?= $dbfk_id_ProveedorMaterial ?>" selected><?= $dbproveedorNombre ?></option>
                        <?php
                            include("neg_conexion.php");
							$sql5 = "SELECT * FROM ProveedorMaterial";
							if(!$result5 = $db->query($sql5)){
								die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
							}
							while($row5 = $result5->fetch_assoc()){
                                $id_ProveedorMaterial  = $row5['id_ProveedorMaterial'];  
                                $proveedorNombre = $row5['proveedorNombre'];
                                $fk_id_estadoProveedor = $row5['fk_id_estadoProveedor']; 
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
                        <button type="submit" class="btn btn-raised btn-primary">Editar</button>
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