<?php 
	session_start();
	class UsuarioPermitido{
		public function registrar($documento){
			$contador = 0;
			include("neg_conexion.php");
			$sql = "SELECT * FROM UsuarioPermitido WHERE fk_usuarioDocumento = '$documento'";
			if(!$result = $db->query($sql)){
				die('Error en consulta ['.$db->error. ']');
			}
			while($row = $result->fetch_assoc()){
                $contador = $contador + 1;
			}
			if($contador == 1){
				header('location:pre_agregarUsuarioPermitido.php?p=1');
			}
			if($contador == 0){
				mysqli_query($db, "INSERT INTO UsuarioPermitido (id_usuarioPermitido , fk_usuarioDocumento) VALUES (NULL, '$documento')") or die(mysqli_error($db)) ;
				header("Cache-Control: no-cache, must-revalidate");
				header('location:pre_usuarioPermitido_superadmin.php?p=1');
            }	
		}
	}
	$user = new UsuarioPermitido();
	$user -> registrar($_POST["documento"]);

 ?>