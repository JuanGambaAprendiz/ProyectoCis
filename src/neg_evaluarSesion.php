<?php
class Usuario{
	function compararDatos($documento, $password){

		session_start();
		include("neg_conexion.php");
		$cont = 0;
		$estado = 0;

		$sql1="SELECT * FROM Usuario WHERE usuarioDocumento='$documento'";
		if (!$result1=$db->query($sql1)){
			die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
		}
		while ($row1=$result1->fetch_assoc()){
			$usuarioTipoDocumento = $row1['fk_id_TipoDocumento'];
			$ddocumento = $row1['usuarioDocumento'];
			$hash = $row1['usuarioPswrd'];
			$uusuario = $row1['usuarioNombre'];
			$usuarioCorreoElectronico = $row1['usuarioCorreoElectronico'];			
			$usuarioFechaReg = $row1['usuarioFechaRegistro'];
			$estado = $row1['fk_id_EstadoUsuario'];
			$cont=$cont+1;
		}
		if(($password==$hash) || (password_verify($password,$hash))){
			if($estado == 0){
				header("Location:pre_iniciarSesion.php?e=1");
			}
			if($estado == 2){
				header('location: pre_iniciarSesion.php?e=2');
			}
			if($estado == 1){
				$_SESSION['usuarioDocumento'] = $ddocumento;
				$_SESSION['fk_id_TipoDoc'] = $usuarioTipoDocumento;
				$_SESSION['usuarioCorreo'] = $usuarioCorreoElectronico;
				
				$nPermisos = 0;
				$sql2="SELECT * FROM Permiso WHERE fk_usuarioDocumento='$documento'";
				if (!$result2=$db->query($sql2)){
					die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
				}
				while ($row2=$result2->fetch_assoc()){
					$iid_Rol = $row2['fk_id_Rol'];
					$nPermisos +=1;
					if($iid_Rol == 1){
						$usuario = 1;
					}
					if($iid_Rol == 2){
						$superadministrador = 2;
					}
					if($iid_Rol == 3){
						$administrador = 3;
					}
					if($iid_Rol == 0){
						$sinpermiso == 1;
					}
				}
				$_SESSION['nPermisos'] = $nPermisos;

				//Permutaciones
				if($nPermisos == 0){
					header('location:pre_iniciarSesion.php?e=3');
				}
				if($nPermisos > 0){	
					if((isset($usuario)) and (isset($superadministrador)) and (isset($administrador))){
						$id_Rol = $superadministrador;
					}
					if((isset($usuario)) and (isset($superadministrador)) and (!isset($administrador))){
						$id_Rol = $superadministrador;
					}
					if((isset($superadministrador)) and (isset($administrador)) and (!isset($usuario))){
						$id_Rol = $superadministrador;
					}
					if((isset($usuario)) and (isset($administrador)) and (!isset($superadministrador))){
						$id_Rol = $administrador;
					}
					if((isset($usuario)) and (!isset($superadministrador)) and (!isset($administrador))){
						$id_Rol = $usuario;
					}
					if((!isset($usuario)) and (isset($superadministrador)) and (!isset($administrador))){
						$id_Rol = $superadministrador;
					}
					if((!isset($usuario)) and (!isset($superadministrador)) and (isset($administrador))){
						$id_Rol = $administrador;
					}
				}
				$sql3="SELECT * FROM Rol WHERE id_Rol='$id_Rol'";
				if (!$result3=$db->query($sql3)){
					die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
				}
				while ($row3=$result3->fetch_assoc()){
					$rrol = $row3['rolNombre'];
				}

				if($cont!="0"){
					$_SESSION["documento"]=$ddocumento;
					$_SESSION["usuarioNombre"]=$uusuario;
					$_SESSION["rol"]=$id_Rol;
					$_SESSION["rolNombre"] = $rrol;
					if($id_Rol == 1){
						header("Location:s_indexl.php");
					}
					if($id_Rol == 2){
						if($nPermisos == 1){
							header("Location:s_indexl_superAdmin.php");
						}
						if($nPermisos > 1){
							header("Location:s_indexl.php");
						}				
					}
					if($id_Rol == 3){
						if($nPermisos == 1){
							header("Location:s_indexl_admin.php");
						}
						if($nPermisos > 1){
							header("Location:s_indexl.php");
						}	
					}
					if($id_Rol > 3 or $iid_Rol < 1){
						die('Hay un error en la gestión de usuarios, id_Rol = "'.$iid_Rol.'"');
					}
				}

				if($cont==0){
					header("Location:pre_iniciarSesion.php?e=1");
				}
			}
		}else{
			header("Location:pre_iniciarSesion.php?e=1");
		}
	}
}
$usuarioReg=new Usuario();
$usuarioReg->compararDatos($_POST["documento"],$_POST["password"]);

?>
