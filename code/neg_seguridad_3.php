<?php 
	session_start();
	if(($_SESSION["rol"]<=1)or($_SESSION["rol"]>=4)){
		header("location:neg_salir.php");
	}
 ?>