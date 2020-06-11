<?php
    include("neg_conexion.php");
    $id_permiso = $_POST['id_permiso'];

    $sql ="SELECT * FROM permiso";
    if (!$result =$db->query($sql)){
        die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
    }
    while($row = $result->fetch_assoc()){
    }

    mysqli_query($db, "DELETE FROM permiso WHERE permiso.id_Permiso = '$id_permiso'") or die (mysqli_error($db));
    header("location:pre_permisos.php?p=2");
?>