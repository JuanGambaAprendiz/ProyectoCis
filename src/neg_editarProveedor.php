<?php 
	session_start();
	class ProveedorMaterial{
		function editar($idp, $nombre, $telefono, $direccion){			            
            $contador = 0;
            include("neg_conexion.php");
            $sql = "SELECT * FROM ProveedorMaterial WHERE id_ProveedorMaterial = '$idp'";
            if(!$result = $db->query($sql)){
                die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
            }						
            while($row = $result->fetch_assoc()){
                $dbproveedorNombre = $row['proveedorNombre'];
                $dbproveedorTelefono = $row['proveedorTelefono'];
                $dbProveedorDireccion = $row['ProveedorDireccion'];
            }
            
            if(($dbproveedorNombre == $nombre) && ($dbproveedorTelefono == $telefono) && ($dbProveedorDireccion == $direccion)){
                header('location:pre_proveedores.php?e=3');//Error: Sin cambios.
            }
            if(($dbproveedorNombre != $nombre) || ($dbproveedorTelefono != $telefono) || ($dbProveedorDireccion != $direccion)){                                    
                $sql2 = "SELECT * FROM ProveedorMaterial WHERE proveedorNombre = '$nombre'";
                if(!$result2 = $db->query($sql2)){
                    die('Error en consulta ['.$db->error. ']');
                }
                while($row2 = $result2->fetch_assoc()){
                    $id_ProveedorMaterial = $row2['id_ProveedorMaterial'];
                    if($id_ProveedorMaterial != $idp)
                        $contador = 1;
                }
                if($contador == 1){
                    //error: proveedor ya registrado
                    header('location:pre_proveedores.php?e=4');
                }   
                        
                if($contador == 0){         
                    mysqli_query($db, "UPDATE proveedormaterial SET proveedorNombre = '$nombre', 
                    proveedorTelefono = '$telefono', ProveedorDireccion = '$direccion' WHERE proveedormaterial.
                    id_ProveedorMaterial = '$idp'") or die(mysqli_error($db));
                    header('location:pre_proveedores.php?e=2');//Correcto: Proveedor registrado.
                }                                
            }                        
        }
	}
	$proveedor = new ProveedorMaterial();
	$proveedor -> editar($_POST["idp"], $_POST["nombre"], $_POST["telefono"], $_POST["direccion"]);