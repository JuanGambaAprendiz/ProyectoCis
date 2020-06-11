<?php 
	session_start();
	if($_SESSION["rol"]==0){
		header("location:neg_salir.php");
	}
 ?>