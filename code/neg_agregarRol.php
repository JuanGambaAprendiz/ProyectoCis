<?php 
	session_start();
	class Datos{
		public function iniciar($rolNombre){
            $contador = 0;
			include("neg_conexion.php");
			$sql = "SELECT * FROM rol WHERE rolNombre = '$rolNombre'";
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
				mysqli_query($db, "INSERT INTO rol (id_Rol , rolNombre) VALUES (NULL, '$rolNombre')") or die(mysqli_error($db)) ;
				header("Cache-Control: no-cache, must-revalidate");
				header('location:pre_roles.php?p=1');
            }	
		}
	}
	$insertar = new Datos();
	$insertar -> iniciar($_POST["rolNombre"]);

 ?>