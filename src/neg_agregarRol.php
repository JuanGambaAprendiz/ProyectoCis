<?php 
	session_start();
	class Rol{
		public function agregar($rolNombre){
            $contador = 0;
			include("neg_conexion.php");
			$sql = "SELECT * FROM Rol WHERE rolNombre = '$rolNombre'";
			if(!$result = $db->query($sql)){
				die('Error en consulta ['.$db->error. ']');
			}
			while($row = $result->fetch_assoc()){
                $contador = $contador + 1;
			}
			if($contador == 1){
				header('location:pre_agregarRol.php?p=1');
			}
			if($contador == 0){
				mysqli_query($db, "INSERT INTO Rol (id_Rol , rolNombre) VALUES (NULL, '$rolNombre')") or die(mysqli_error($db)) ;
				header("Cache-Control: no-cache, must-revalidate");
				header('location:pre_roles.php?p=1');
            }	
		}
	}
	$rol = new Rol();
	$rol -> agregar($_POST["rolNombre"]);

 ?>