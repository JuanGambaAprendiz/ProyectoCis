<?php 
	session_start();
	class ProveedorMaterial{
		function registrar($nombre, $telefono, $direccion){			
            $estado = 1;
            $contador = 0;					

			include("neg_conexion.php");
			$sql = "SELECT * FROM ProveedorMaterial WHERE proveedorNombre = '$nombre'";
			if(!$result = $db->query($sql)){
				die('Error en consulta ['.$db->error. ']');
			}
			while($row = $result->fetch_assoc()){
				$contador += 1;
			}
			if($contador == 1){
				//error: proveedor ya registrado
				header('location:pre_registrarProveedor.php?e=1');
			}
			if($contador == 0){ 			
                mysqli_query($db, "INSERT INTO ProveedorMaterial (id_ProveedorMaterial, proveedorNombre, proveedorTelefono, ProveedorDireccion, fk_id_estadoProveedor)
                VALUES (NULL, '$nombre', '$telefono', '$direccion','$estado')") or die(mysqli_error($db));
				header('location:pre_proveedores.php?e=1');//Correcto: Proveedor registrado.
			}	
		}
	}
	$proveedor = new ProveedorMaterial();
	$proveedor -> registrar($_POST["nombre"], $_POST["telefono"], $_POST["direccion"]);