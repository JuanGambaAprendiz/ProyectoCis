<?php 
	session_start();
	class Categoria{
		function editar($idc, $nombre, $descripcion){			            
            $contador = 0;
            include("neg_conexion.php");
            $sql = "SELECT * FROM Categoria WHERE id_Categoria = '$idc'";
            if(!$result = $db->query($sql)){
                die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
            }						
            while($row = $result->fetch_assoc()){                
                $categoria = $row['categoria'];
                $categoriaDescripcion = $row['categoriaDescripcion'];
            }

            if(($categoria == $nombre) && ($categoriaDescripcion == $descripcion)){
                $contador = 2;
                header('location:pre_categorias.php?e=3');//Error: Sin cambios.
            }

            if(($categoria != $nombre) || ($categoriaDescripcion != $descripcion)){ 
                $sql2 = "SELECT * FROM Categoria WHERE categoria = '$nombre'";
                if(!$result2 = $db->query($sql2)){
                    die('Error en consulta ['.$db->error. ']');
                }
                while($row2 = $result2->fetch_assoc()){
                    $id_Categoria = $row2['id_Categoria'];
                    if($id_Categoria != $idc)
                        $contador = 1;
                }            
                if($contador == 1){
                    //error: categoria ya registrado
                    header('location:pre_categorias.php?e=4');
                }   
              
                if($contador == 0){                                                                         
                    mysqli_query($db, "UPDATE Categoria SET categoria = '$nombre', 
                    categoriaDescripcion = '$descripcion' WHERE Categoria.
                    id_Categoria = '$idc'") or die(mysqli_error($db));
                    header('location:pre_categorias.php?e=2');//Correcto: categoria registrado.
                }                                
            }                        
        }
	}
	$categoria = new Categoria();
	$categoria -> editar($_POST["idc"], $_POST["nombre"], $_POST["descripcion"]);