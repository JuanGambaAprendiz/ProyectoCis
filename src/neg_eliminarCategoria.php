<?php
    include("neg_conexion.php");
    $idc= $_POST['idc'];
    $contador = 0;

    $sql = "SELECT * FROM Producto WHERE fk_id_Categoria = '$idc'";
    if(!$result = $db->query($sql)){
        die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
    }
    while($row = $result->fetch_assoc()){
        $contador ++;
    }
    if($contador > 0)
        header("location:pre_categorias.php?p=2&c=$contador");
    if($contador == 0){
        mysqli_query($db, "DELETE FROM Categoria WHERE Categoria.id_Categoria = '$idc'") or die (mysqli_error($db));
        header("location:pre_categorias.php?p=1");
    }        
?>