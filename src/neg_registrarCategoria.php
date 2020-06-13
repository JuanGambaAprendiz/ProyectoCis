<?php 
	session_start();
	class Categoria{
		function registrar($nombre, $descripcion){            
            $contador = 0;					

			include("neg_conexion.php");
			$sql = "SELECT * FROM Categoria WHERE categoria  = '$nombre'";
			if(!$result = $db->query($sql)){
				die('Error en consulta ['.$db->error. ']');
			}
			while($row = $result->fetch_assoc()){
				$contador += 1;
			}
			if($contador == 1){
				//error: proveedor ya registrado
				header('location:pre_registrarCategoria.php?e=1');
			}
			if($contador == 0){ 			
                mysqli_query($db, "INSERT INTO Categoria (id_Categoria, categoria, categoriaDescripcion)
                VALUES (NULL, '$nombre', '$descripcion')") or die(mysqli_error($db));
				header('location:pre_categorias.php?e=1');//Correcto: Categoria registrada.
			}	
		}
	}
	$categoria = new Categoria();
	$categoria -> registrar($_POST["nombre"], $_POST["descripcion"]);