<?php 
	session_start();
	$_SESSION["rol"]=0;
	unset($_SESSION["rol"]);
	session_destroy();
	header("location:pre_iniciarSesion.php");
 ?>