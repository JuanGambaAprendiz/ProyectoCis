<?php 
	session_start();
	class TipoDocumento{
		public function agregar($tipoDocNombre){
            $contador = 0;
			include("neg_conexion.php");
			$sql = "SELECT * FROM TipoDocumento WHERE tipoDocumento = '$tipoDocNombre'";
			if(!$result = $db->query($sql)){
				die('Error en consulta ['.$db->error. ']');
			}
			while($row = $result->fetch_assoc()){
                $contador += 1;
			}
			if($contador == 1){
				header('location:pre_agregarTipoDocumento.php?p=1');
			}
			if($contador == 0){
				mysqli_query($db, "INSERT INTO TipoDocumento (tipoDocumento) VALUES ('$tipoDocNombre')") or die(mysqli_error($db)) ;
				header("Cache-Control: no-cache, must-revalidate");
				header('location:pre_tiposDocumento.php?p=1');
            }	
		}
	}
	$tipoDocumento = new TipoDocumento();
	$tipoDocumento -> agregar($_POST["tipoDocumento"]);

 ?>