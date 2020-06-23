<?php 
	session_start();
	class Datos{
		public function iniciar($nombres, $documento, $tipodocumento, $correo, $telefono, $password){
            $fecha = date("Y-m-d H:i:s");
            $estado = 1;
            $contador1 = 0;
            $contador2 = 0;

            include("neg_conexion.php");
            $sql = "SELECT * FROM UsuarioPermitido WHERE fk_usuarioDocumento = '$documento'";
			if(!$result = $db->query($sql)){
				die('Error en consulta ['.$db->error. ']');
			}
			while($row = $result->fetch_assoc()){
				$contador1 = $contador1 + 1;
            }
            if($contador1 == 0){
                mysqli_query($db, "INSERT INTO UsuarioPermitido (id_usuarioPermitido, fk_usuarioDocumento) VALUES ('$documento', '$tipodocumento', '$nombres', '$password', '$fecha', '$correo', '$telefono', '$estado', '$permitido')") or die(mysqli_error($db)) ;
            }
            
			$sql2 = "SELECT * FROM Usuario WHERE UsuarioDocumento = '$documento'";
			if(!$result2 = $db->query($sql2)){
				die('Error en consulta ['.$db->error. ']');
			}
			while($row2 = $result2->fetch_assoc()){
				$contador2 = $contador2 + 1;
			}
			if($contador2 == 1){
				header('location:pre_usuarioPermitido.php?e=1');
			}
			if($contador2 == 0){
				mysqli_query($db, "INSERT INTO usuario (usuarioDocumento, fk_id_TipoDocumento, 	usuarioNombre, 	usuarioPswrd, usuarioFechaRegistro, usuarioCorreoElectronico, usuarioTelefono, fk_id_EstadoUsuario, fk_id_UsuarioPermitido) VALUES ('$documento', '$tipodocumento', '$nombres', '$password', '$fecha', '$correo', '$telefono', '$estado', '$permitido')") or die(mysqli_error($db)) ;
				mysqli_query($db, "INSERT INTO permiso (id_Permiso, fk_id_Rol, fk_usuarioDocumento) VALUES (NULL, '1', '$documento')") or die(mysqli_error($db)) ;
				header('location:pre_iniciarSesion2.php?e=4');
			}	
		}
	}
	$insertar = new Datos();
	$insertar -> iniciar($_POST["nombres"], $_POST["documento"], $_POST["tipodocumento"], $_POST["correo"], $_POST["telefono"], $_POST["password"]);

 ?>
