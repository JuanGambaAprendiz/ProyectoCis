<?php 
	session_start();
	class Producto{
		function registrar($nombre, $codigo, $fecharegistro, $categoria, $descripcion, $proveedor){			            
            $contador = 0;					

			include("neg_conexion.php");
			$sql = "SELECT * FROM Producto WHERE productoCodigo = '$codigo'";
			if(!$result = $db->query($sql)){
				die('Error en consulta ['.$db->error. ']');
			}
			while($row = $result->fetch_assoc()){
				$contador = 1;
			}
			if($contador == 1){
				//error: producto ya registrado
				header('location:pre_registrarProducto.php?e=1');
			}
			if($contador == 0){ 			
                mysqli_query($db, "INSERT INTO Producto (id_Producto, productoNombre , productoCodigo, productoFechaRegistro, fk_id_Categoria, productoDescripcion, fk_id_ProveedorMaterial)
                VALUES (NULL, '$nombre', '$codigo', '$fecharegistro','$categoria','$descripcion','$proveedor')") or die(mysqli_error($db));
				header('location:pre_productos.php?e=1');//Correcto: Producto registrado.
			}	
		}
	}
	$producto = new Producto();
	$producto -> registrar($_POST["nombre"], $_POST["codigo"], $_POST["fecharegistro"], $_POST["categoria"], $_POST["descripcion"], $_POST["proveedor"]);