<?php
    class Rol{
        public function editarNombre($rolNombre, $anterior){
            $id = 0;
            include("neg_conexion.php");
            $sql = "SELECT * FROM rol WHERE rolNombre = '$anterior'";
            if(!$result = $db->query($sql)){
                die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
            }
            while($row = $result->fetch_assoc()){
                $id = $row['id_Rol'];  
            }
            if($rolNombre == $anterior){
                header('location: pre_editarRol.php?p=1');
            }
            if($rolNombre != $anterior){
                mysqli_query($db, "UPDATE rol SET rolNombre  = '$rolNombre' WHERE rol . id_Rol = '$id';") or die (mysqli_error($db));
                header('location: pre_roles.php?p=3');
            }
        }
	}
		$rol=new Rol();
		$rol->editarNombre($_POST["rolNombre"], $_POST["rolNombreAnterior"]);
?>