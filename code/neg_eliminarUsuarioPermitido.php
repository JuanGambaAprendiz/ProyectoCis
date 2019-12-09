<?php
    include("neg_conexion.php");
    $documento= $_POST['documento'];

    $sql ="SELECT * FROM UsuarioPermitido";
    if (!$result =$db->query($sql)){
        die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
    }
    while($row = $result->fetch_assoc()){
    }

    mysqli_query($db, "DELETE FROM UsuarioPermitido WHERE UsuarioPermitido.fk_usuarioDocumento = '$documento'") or die (mysqli_error($db));
    header("location:pre_usuariosPermitidos.php?p=2");
?>