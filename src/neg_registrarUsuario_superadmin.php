<?php 
	session_start();
	class Usuario{
		function registrar_superadmin($nombre, $documento, $tipoDocumento, $correo, $password){
			$fecha = new DateTime();
			$fecha -> modify('-6 hours');
			$fechaCol = $fecha->format('Y-m-d H:i:s');
			$codigoVerif = "N/A";
            $estado = 1;
            $contador = 0;
			$contador2 = 0;
			$password = password_hash($password,PASSWORD_DEFAULT);

			include("neg_conexion.php");
			$sql = "SELECT * FROM Usuario WHERE UsuarioDocumento = '$documento'";
			if(!$result = $db->query($sql)){
				die('Error en consulta ['.$db->error. ']');
			}
			while($row = $result->fetch_assoc()){
				$contador += 1;
			}
			if($contador == 1){
				//error: usuario ya registrado
				header('location:pre_registrarUsuario_superadmin.php?e=1');
			}
			if($contador == 0){
				$sql1="SELECT * FROM UsuarioPermitido WHERE fk_usuarioDocumento='$documento';";
				if(!$result1 = $db->query($sql1)){
					die('Error en consulta ['.$db->error. ']');
				}
				while($row1 = $result1->fetch_assoc()){
					$iid_usuarioPermitido= $row1['id_usuarioPermitido'];
					$docPermitido = $row1['fk_usuarioDocumento'];
					$contador2 += 1;
				}
				if($contador2 < 1){
					mysqli_query($db, "INSERT INTO UsuarioPermitido (fk_usuarioDocumento) VALUES ('$documento')") or die(mysqli_error($db));
					$sql2="SELECT * FROM UsuarioPermitido WHERE fk_usuarioDocumento='$documento';";
					if(!$result2 = $db->query($sql2)){
						die('Error en consulta ['.$db->error. ']');
					}
					while($row2 = $result2->fetch_assoc()){
						$iid_usuarioPermitido= $row2['id_usuarioPermitido'];
					}
					if(isset($permitido) && $permitido > 1){
						$iid_usuarioPermitido+=1;
					}
					mysqli_query($db, "INSERT INTO Usuario (usuarioDocumento, fk_id_TipoDocumento, usuarioNombre, usuarioPswrd, usuarioCodigoVerif, usuarioFechaRegistro, usuarioCorreoElectronico, fk_id_EstadoUsuario, fk_id_UsuarioPermitido)
					 VALUES ('$documento', '$tipoDocumento', '$nombre', '$password', '$codigoVerif','$fechaCol', '$correo','$estado', '$iid_usuarioPermitido')") or die(mysqli_error($db));
				}
				if($contador2 == 1){
					mysqli_query($db, "INSERT INTO Usuario (usuarioDocumento, fk_id_TipoDocumento, usuarioNombre, usuarioPswrd, usuarioCodigoVerif, usuarioFechaRegistro, usuarioCorreoElectronico, fk_id_EstadoUsuario, fk_id_UsuarioPermitido)
				 	 VALUES ('$documento', '$tipoDocumento', '$nombre', '$password', '$codigoVerif','$fechaCol', '$correo','$estado', '$iid_usuarioPermitido')") or die(mysqli_error($db));
				}
				if($contador2 > 1){
					die("Hay un error corriendo en el funcionamiento del registro desde este rol");
				}
				header('location:s_indexl_superAdmin.php?e=1');//Correcto: Usuario registrado.
			}	
		}
	}
	$user = new Usuario();
	$user -> registrar_superadmin($_POST["nombre"], $_POST["documento"], $_POST["tipoDocumento"], $_POST["correo"], $_POST["password"]);

 ?>
