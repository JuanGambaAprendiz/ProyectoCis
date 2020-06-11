<?php 
	session_start();
	if($_SESSION["rol"]!=2){
		header("location:neg_salir.php");
	}
 ?>