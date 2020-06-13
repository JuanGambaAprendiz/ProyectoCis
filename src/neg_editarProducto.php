<?php 
	session_start();
	class Producto{
		function editar($idp, $nombre, $codigo, $categoria, $descripcion, $proveedor){			            
            $contador = 0;
            include("neg_conexion.php");
            $sql = "SELECT * FROM Producto WHERE id_Producto = '$idp'";
            if(!$result = $db->query($sql)){
                die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
            }						
            while($row = $result->fetch_assoc()){
                $dbproductoNombre = $row['productoNombre'];
                $dbproductoCodigo = $row['productoCodigo'];     
                $dbfk_id_Categoria = $row['fk_id_Categoria'];   
                $dbproductoDescripcion = $row['productoDescripcion'];   
                $dbfk_id_ProveedorMaterial = $row['fk_id_ProveedorMaterial'];
            }
            
            if(($dbproductoNombre == $nombre) && ($dbproductoCodigo == $codigo) && ($dbfk_id_Categoria == $categoria)
            && ($dbproductoDescripcion == $descripcion) && ($dbfk_id_ProveedorMaterial == $proveedor)){
                header('location:pre_productos.php?e=3');//Error: Sin cambios.
            }
            if(($dbproductoNombre != $nombre) || ($dbproductoCodigo != $codigo) || ($dbfk_id_Categoria != $categoria)
            || ($dbproductoDescripcion != $descripcion) || ($dbfk_id_ProveedorMaterial != $proveedor)){
                $sql2 = "SELECT * FROM Producto WHERE productoCodigo = '$codigo'";
                if(!$result2 = $db->query($sql2)){
                    die('Error en consulta ['.$db->error. ']');
                }
                while($row2 = $result2->fetch_assoc()){
                    $id_Producto = $row2['id_Producto'];
                    if($id_Producto != $idp)
                        $contador = 1;
                }
                if($contador == 1){
                    //error: proveedor ya registrado
                    header('location:pre_productos.php?e=4');
                }   
                        
                if($contador == 0){         
                    mysqli_query($db, "UPDATE Producto SET productoNombre = '$nombre', 
                    productoCodigo = '$codigo', fk_id_Categoria = '$categoria', productoDescripcion = '$descripcion', 
                    fk_id_ProveedorMaterial = '$proveedor' WHERE Producto.id_Producto = '$idp'")
                     or die(mysqli_error($db));
                    header('location:pre_productos.php?e=2');//Correcto: Producto registrado.
                }                                
            }                        
        }
	}
	$producto = new Producto();
	$producto -> editar($_POST["idp"], $_POST["nombre"], $_POST["codigo"], $_POST["categoria"], $_POST["descripcion"], $_POST["proveedor"]);