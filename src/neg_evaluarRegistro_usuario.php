<?php
    class UsuarioPermitido{
        function verificarRegistro($documento){
            session_start();
            include("neg_conexion.php");
            $cont = 0;
            $_SESSION['permitido'] = 0;
            
            $sql="SELECT * FROM UsuarioPermitido WHERE fk_usuarioDocumento='$documento'";
            if (!$result=$db->query($sql)){
                die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
            }
            while ($row=$result->fetch_assoc()){
                $id = $row['id_usuarioPermitido'];
                $ddocumento=$row['fk_usuarioDocumento'];
                $cont=$cont+1;
            }
        
            $sql2="SELECT * FROM Usuario WHERE usuarioDocumento='$documento'";
            if (!$result2=$db->query($sql2)){
                die('Hay un error corriendo en la consulta o datos no encontrados!!! ['.$db->error.']');
            }
            while ($row2=$result2->fetch_assoc()){
                $ddocumento=$row2['usuarioDocumento'];
                $cont=$cont+1;
            }
            
            if ($cont == 1){
                $_SESSION['permitido'] = 1;
                $_SESSION['documentopermitido'] = $ddocumento;
                $_SESSION['idpermitido'] = $id;
                header('location: pre_registrarse_usuario.php');
            }
            if ($cont == 2){
                $_SESSION['permitido'] = 1;
                header('location: pre_usuarioPermitido_usuario.php?e=1');
            }
            if ($cont == 0){
                header('location: pre_usuarioPermitido_usuario.php?e=2');
            }
        }
    }
    $user = new UsuarioPermitido();
    $user -> verificarRegistro($_POST["documento"]);
?>