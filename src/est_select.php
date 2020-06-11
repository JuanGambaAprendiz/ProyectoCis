<?php
    if($_SESSION['rol'] > 1){
        include('neg_conexion.php');
        $documento=$_SESSION["documento"];
        $sql="SELECT * FROM permiso WHERE fk_usuarioDocumento='$documento'";
        if (!$result=$db->query($sql)){
            die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
        }
        while ($row=$result->fetch_assoc()){
            $iid_Rol = $row['fk_id_Rol'];
            
        $sql2="SELECT * FROM rol WHERE id_Rol='$iid_Rol'";
        if (!$result2=$db->query($sql2)){
            die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
        }
        while ($row2=$result2->fetch_assoc()){
            $rrol = $row2['rolNombre'];
        }
        
    ?>
    <?php 
        if (($iid_Rol == 1)and($_SESSION['capa'] != 1)){
    ?>
    <option value="s_indexl.php"><?php echo $rrol;?></option>
    <?php 
        }
    ?>
    <?php 
        if (($iid_Rol == 2)and($_SESSION['capa'] != 2)){
    ?>
    <option value="s_indexl_superAdmin.php"><?php echo $rrol;?></option>
    <?php 
        }
    ?>
    <?php 
        if (($iid_Rol  == 3)and($_SESSION['capa'] != 3)){
    ?>
    <option value="s_indexl_admin.php"><?php echo $rrol;?></option>
    <?php 
        }
        }
    }
?>