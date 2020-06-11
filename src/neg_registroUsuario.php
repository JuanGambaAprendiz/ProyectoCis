<?php 
	session_start();
	class Datos{
		public function iniciar($nombres, $tipodocumento, $correo, $telefono, $password){
			$documento = $_SESSION['documentopermitido'];
            $fecha = date("Y-m-d H:i:s");
            $estado = 1;
			$permitido = $_SESSION['idpermitido'];
			$contador = 0;

			include("neg_conexion.php");
			$sql = "SELECT * FROM Usuario WHERE UsuarioDocumento = '$documento'";
			if(!$result = $db->query($sql)){
				die('Error en consulta ['.$db->error. ']');
			}
			while($row = $result->fetch_assoc()){
				$contador = $contador + 1;
			}
			if($contador == 1){
				header('location:pre_usuarioPermitido.php?e=1');
			}
			if($contador == 0){
				mysqli_query($db, "INSERT INTO usuario (usuarioDocumento, fk_id_TipoDocumento, 	usuarioNombre, 	usuarioPswrd, usuarioFechaRegistro, usuarioCorreoElectronico, usuarioTelefono, fk_id_EstadoUsuario, fk_id_UsuarioPermitido) VALUES ('$documento', '$tipodocumento', '$nombres', '$password', '$fecha', '$correo', '$telefono', '$estado', '$permitido')") or die(mysqli_error($db)) ;
				mysqli_query($db, "INSERT INTO permiso (id_Permiso, fk_id_Rol, fk_usuarioDocumento) VALUES (NULL, '1', '$documento')") or die(mysqli_error($db)) ;
				header('location:pre_iniciarSesion.php?e=4');
			}	
		}
	}
	$insertar = new Datos();
	$insertar -> iniciar($_POST["nombres"], $_POST["tipodocumento"], $_POST["correo"], $_POST["telefono"], $_POST["password"]);

 ?>
