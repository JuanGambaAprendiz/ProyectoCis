<?php
	include("neg_seguridad_3.php");
    $_SESSION['capa'] = 3;
    $idc= $_POST['idc'];
    include("neg_conexion.php");
    $sql = "SELECT * FROM Categoria WHERE id_Categoria = '$idc'";
    if(!$result = $db->query($sql)){
        die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
    }
    while($row = $result->fetch_assoc()){    
    $categoria = $row['categoria'];
    $categoriaDescripcion = $row['categoriaDescripcion'];  
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
	<title>Categorias - Administrador</title>
    <script>
        function validarNombre(texto){
            var nombre=document.getElementById("categoriaNombre");
            if(!/^([A-Z a-zÑñÁÉÍÓÚáéíóú])*$/.test(texto)){
                document.registro_categoria.categoriaNombre.value="";
                alert("El formato de nombre \""+texto+"\" no es válido. Inténtelo de nuevo");
                document.registro_categoria.categoriaNombre.focus();
            }
        }
        function validarDescripcion(texto){
            if(!/^[0-9]*$/.test(texto)){
                document.registro_categoria.categoriaTelefono.value="";
                alert("El formato de documento \""+texto+"\" no es válido.\n Verifique que la extensión de su registro no exceda los 400 carácteres. Inténtelo de nuevo");
                document.registro_categoria.categoriaTelefono.focus();
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
			  <h1 class="text-titles"><span class="text-info">Categorias</span> - ADMINISTRADOR</h1>
			</div>
		</div>
		
		
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles text-center text-capitalize">Editar categoria</h1>
			</div>
            
			<div class="container" style="max-width: 630px;">
                <a class="btn btn-link" href="pre_categorias.php" title="categorias Registrados">Volver</a><br><br>
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

                <form name="registro_categoria"  method="POST" action="neg_editarCategoria.php"  class="register-container px-md-5" autocomplete="off">
                    <input type="hidden" name="idc" value="<?php echo $idc ?>">                    
                    <div class="form-group label-floating">
                        <label class="control-label my-auto" for="categoriaNombre">Nombre*</label>
                        <input class="form-control" id="categoriaNombre" name="nombre" type="text" pattern="[A-Z a-zÑñÁÉÍÓÚÜáéíóúü]{1,50}" 
                        onchange="validarNombre(this.value)" autofocus="autofocus" placeholder="Ingrese el Nombre de la categoria" value="<?= $categoria ?>" + required>
                    </div>                    
                    <div class="form-group label-floating">
                        <label class="control-label" for="categoriaDescripcion">Descripción*</label>
                        <textarea class="form-control" name="descripcion" id="categoriaDescripcion" cols="auto" rows="3" onchange="validarDescripcion(this.value)"
                        placeholder="Ingrese la descripción de la categoria" + required><?= $categoriaDescripcion ?></textarea>
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