<?php 
	session_start();
	if($_SESSION['permitido'] < 1){
		header("location:pre_usuarioPermitido_usuario.php");
	}
 ?>