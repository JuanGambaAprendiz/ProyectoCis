<?php
	$db = new MySQLi('localhost', 'root', '', 'db_ngr_inventario');
	$acentos = $db->query("SET NAMES 'utf8'");
	if($db->connect_error > 0){
		die('Error en la conexión [' .$db->connect_error. ']');
	}

 ?>
