<?php
    include("neg_conexion.php");
    $estado = $_POST["estado"];
    $documento = $_POST["documento"];
	
	if($estado == 1){
		$estado = 2;
	}else{
		if($estado == 2){
			$estado = 1;
		}
	}
    
	mysqli_query($db, "UPDATE Usuario SET fk_id_EstadoUsuario = '$estado' WHERE Usuario . usuarioDocumento = '$documento';") or die (mysqli_error($db));
	header("location: s_indexl_superAdmin.php?p=1");
?>