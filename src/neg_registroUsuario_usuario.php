<?php 
	session_start();
	class Usuario{
		function registrar($nombre, $tipoDocumento, $correo, $password){
			$documento = $_SESSION['documentopermitido'];
			$fecha = new DateTime();
			$fecha -> modify('-6 hours');
			$fechaCol = $fecha->format('Y-m-d H:i:s');
			$codigoVerif = "N/A";
            $estado = 1;
			$permitido = $_SESSION['idpermitido'];
			$contador = 0;
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
				header('location:pre_usuarioPermitido_usuario.php?e=1');
			}
			if($contador == 0){
				mysqli_query($db, "INSERT INTO Usuario (usuarioDocumento, fk_id_TipoDocumento, usuarioNombre, usuarioPswrd, usuarioCodigoVerif, usuarioFechaRegistro, usuarioCorreoElectronico, fk_id_EstadoUsuario, fk_id_UsuarioPermitido)
				 VALUES ('$documento', '$tipoDocumento', '$nombre', '$password', '$codigoVerif','$fechaCol', '$correo','$estado', '$permitido')") or die(mysqli_error($db)) ;
				mysqli_query($db, "INSERT INTO Permiso (fk_id_Rol, fk_usuarioDocumento) VALUES ('1', '$documento')") or die(mysqli_error($db));
				header('location:pre_iniciarSesion.php?e=4');
			}
		}
	}
	$user = new Usuario();
	$user -> registrar($_POST["nombre"],$_POST["tipoDocumento"],$_POST["correo"],$_POST["password"]);
 ?>
