<?php
    class UsuarioPermitido{
        function editarDocumento($documento, $anterior){
            include("neg_conexion.php");
            $sql = "SELECT * FROM UsuarioPermitido WHERE fk_usuarioDocumento = '$anterior'";
            if(!$result = $db->query($sql)){
                die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
            }
            while($row = $result->fetch_assoc()){
                $id = $row['id_usuarioPermitido'];
            }
            if($documento == $anterior){
                header('location: pre_editarUsuarioPermitido.php?p=1');
            }
            if($documento != $anterior){
                mysqli_query($db, "UPDATE UsuarioPermitido SET fk_usuarioDocumento  = '$documento' WHERE UsuarioPermitido . id_usuarioPermitido = '$id';") or die (mysqli_error($db));
                header('location: pre_usuarioPermitido_superadmin.php?p=3');
            }
        }
	}
		$user=new UsuarioPermitido();
		$user->editarDocumento($_POST["documento"], $_POST["documentoAnterior"]);
?>