<?php
	include("din_scriptsBootstrap.php");
?>
<script>
	$.material.init();
</script>
<script>
	$(document).ready(function(){
		$(".dropdown-toggle").dropdown();
	});	
</script>
<script>
	$(document).ready(function() {
		$('#example').DataTable({
			"language": {
				"infoEmpty": "No hay registros para mostrar",
				"info": "Mostrando del _START_ al _END_ para _TOTAL_ registros",
				"emptyTable": "No hay registros en la tabla",
				"zeroRecords": "No se han encontrado resultados",
				"search": "Buscar:",
				"Processing": "Procesando...",
				"LoadingRecords": "Cargando...",
				"infoFiltered": "(De _MAX_ registros se encontraron _TOTAL_ dato/s coincidentes)",
				"infoEmpty": "No hay registros para mostrar",
				"emptyTable": "No hay registros en la tabla",
				"lengthMenu": 'Mostrar <select>'+
					'<option value="5">5</option>'+
					'<option value="10">10</option>'+
					'<option value="20">20</option>'+
					'<option value="30">30</option>'+
					'<option value="40">40</option>'+
					'<option value="50">50</option>'+
					'<option value="-1">total de</option>'+
					'</select> filas',
				"paginate": {
					"previous": "Anterior",
					"next": "Siguiente",
					"last": "última",
					"first":  "Primera"
				}
			}
		});
	} );
	function comprobarPassword(){
		var password = document.getElementById("UserPass").value;
		var password1 = document.getElementById("UserPass1").value;
		var comp = true;
		var espacios = false;
		var cont = 0;
		
		while (!espacios && (cont < password.length)) {
		if (password.charAt(cont) == " ")
			espacios = false;
		cont++;
		}
		
		if (espacios) {
		alert ("La contraseña no puede contener espacios en blanco");
		comp = false;
		}
		if (password != password1) {

			alert("Las contraseñas deben de coincidir");
			return false;
			} else {
			return true; 
		}

	}
	function ConfirmDelete(){
		var respuesta = confirm("Estas seguro que deseas eliminar este registro");
		if(respuesta == true){
			return true;
		}else{
			return false;
		}
	}
</script>