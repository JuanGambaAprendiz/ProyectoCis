<?php
    class TipoDocumento{
        public function editarNombre($rolNombre, $anterior){
            $id = 0;
            include("neg_conexion.php");
            $sql = "SELECT * FROM TipoDocumento WHERE tipoDocumento = '$anterior'";
            if(!$result = $db->query($sql)){
                die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
            }
            while($row = $result->fetch_assoc()){
                $id = $row['id_TipoDocumento'];  
            }
            if($rolNombre == $anterior){
                header('location: pre_editarTipoDocumento.php?p=1');
            }
            if($rolNombre != $anterior){
                mysqli_query($db, "UPDATE TipoDocumento SET tipoDocumento  = '$rolNombre' WHERE TipoDocumento . id_TipoDocumento = '$id';") or die (mysqli_error($db));
                header('location: pre_tiposDocumento.php?p=3');
            }
        }
	}
		$listaTiposDocumento=new TipoDocumento();
		$listaTiposDocumento->editarNombre($_POST["rolNombre"], $_POST["rolNombreAnterior"]);
?>