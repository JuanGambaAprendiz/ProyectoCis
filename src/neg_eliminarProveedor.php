<?php
    include("neg_conexion.php");
    $idp= $_POST['idp'];

    $sql = "SELECT * FROM Producto WHERE fk_id_ProveedorMaterial = '$idp'";
    if(!$result = $db->query($sql)){
        die('Ha ocurrido un error realizando la consulta ['. $db->error . ']');
    }
    while($row = $result->fetch_assoc()){
        $contador ++;
    }
    if($contador > 0)
        header("location:pre_proveedores.php?p=3&c=$contador");
    if($contador == 0){
        mysqli_query($db, "DELETE FROM ProveedorMaterial WHERE ProveedorMaterial.id_ProveedorMaterial = '$idp'") or die (mysqli_error($db));
        header("location:pre_proveedores.php?p=2");
    }        

    
?>