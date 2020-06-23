<?php
    include("neg_conexion.php");
    $rolNombre= $_POST['rolNombre'];

    mysqli_query($db, "DELETE FROM rol WHERE rol.rolNombre = '$rolNombre'") or die (mysqli_error($db));
    header("location:pre_roles.php?p=2");
?>