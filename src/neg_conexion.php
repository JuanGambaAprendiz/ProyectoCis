<?php 
	$db = new MySQLi('sql104.epizy.com', 'epiz_24239209', 'd0rV99NmMfA80V', 'epiz_24239209_db_ngr_inventario');
	$acentos = $db->query("SET NAMES 'utf8'");
	if($db->connect_error > 0){
		die('Error en la conexión [' .$db->connect_error. ']');
	}

 ?>