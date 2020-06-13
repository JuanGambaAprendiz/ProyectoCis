<?php
    include("neg_conexion.php");
    $idp= $_POST['idp'];

    mysqli_query($db, "DELETE FROM Producto WHERE Producto.id_Producto = '$idp'") or die (mysqli_error($db));
    header("location:pre_productos.php?p=2");
?>