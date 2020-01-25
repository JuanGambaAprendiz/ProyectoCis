<?php 
class Usuario{
	function editarDatos($usuarioNombre,$usuarioTipoDoc,$usuarioCorreo){
		session_start();
		include("neg_conexion.php");
		
		$contador = 0;
		$documento = $_SESSION['documento'];

		$sql = "SELECT * FROM Usuario WHERE UsuarioDocumento = '$documento'";
		if(!$result = $db->query($sql)){
			die('Error en consulta ['.$db->error. ']');
		}
		while($row = $result->fetch_assoc()){
			$contador +=1;
		}
		if($contador == 0){
			header('location: pre_datosUsuario.php?e=3');
		}
		if($contador == 1){
			mysqli_query($db, "UPDATE Usuario SET usuarioNombre  = '$usuarioNombre' WHERE Usuario . usuarioDocumento = '$documento';") or die (mysqli_error($db));
			mysqli_query($db, "UPDATE Usuario SET fk_id_TipoDocumento  = '$usuarioTipoDoc' WHERE Usuario . usuarioDocumento = '$documento';") or die (mysqli_error($db));
			mysqli_query($db, "UPDATE Usuario SET usuarioCorreoElectronico  = '$usuarioCorreo' WHERE Usuario . usuarioDocumento = '$documento';") or die (mysqli_error($db));
			$_SESSION['usuarioNombre']=$usuarioNombre;
			$_SESSION["tipoDoc"] = $usuarioTipoDoc;
			$_SESSION['usuarioCorreo'] = $usuarioCorreo;
			header('location: pre_datosUsuario.php?e=1');
		}
	}
}
$usuarioRegistrado=new Usuario();
$usuarioRegistrado->editarDatos($_POST["usuarioNombre"],$_POST["usuarioTipoDocumento"],$_POST["usuarioCorreo"]);
?>