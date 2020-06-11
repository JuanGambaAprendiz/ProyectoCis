<?php 
	session_start();
	class Permiso{
		public function agregar($rol, $documento){
            $contador = 0;
			include("neg_conexion.php");
			$sql = "SELECT * FROM Permiso WHERE fk_id_Rol = '$rol' AND fk_usuarioDocumento = '$documento'";
			if(!$result = $db->query($sql)){
				die('Error en consulta ['.$db->error. ']');
			}
			while($row = $result->fetch_assoc()){
                $contador = $contador + 1;
			}
			if($contador == 1){
				header('location:pre_agregarPermisos.php?p=1');
			}
			if($contador == 0){
				mysqli_query($db, "INSERT INTO Permiso (id_Permiso, fk_id_Rol, fk_usuarioDocumento) VALUES (NULL, '$rol', '$documento')") or die(mysqli_error($db)) ;
				header("Cache-Control: no-cache, must-revalidate");
				header('location:pre_permisos.php?p=1');
            }	
		}
	}
	$permiso = new Permiso();
	$permiso -> agregar($_POST["rolNombre"], $_POST["documento"]);

 ?>
