<?php
    include("neg_conexion.php");
    $estado = $_POST["estado"];
    $idp = $_POST["idp"];
	
	if($estado == 1){
		$estado = 2;
	}else{
		if($estado == 2){
			$estado = 1;
		}
	}
    
	mysqli_query($db, "UPDATE ProveedorMaterial SET fk_id_estadoProveedor = '$estado' WHERE ProveedorMaterial . id_ProveedorMaterial = '$idp';") or die (mysqli_error($db));
	header("location: pre_proveedores.php?p=1");
?>