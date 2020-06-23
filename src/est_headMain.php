<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
</head>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jquery-3.3.1.js"></script>
<script src="./js/sweetalert2.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/material.min.js"></script>
<script src="./js/ripples.min.js"></script>
<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="./js/main.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/dataTables.bootstrap.js"></script>
<script src="./js/jquery.dataTables.js"></script>
<script src="./js/dataTables.responsive.js"></script>
<script src="./js/dataTables.select.js"></script>
<script src="./js/select.bootstrap.js"></script>
<script src="./js/buttons.bootstrap.js"></script>
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
</script>
<script>
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
</script>
<script>
    function ConfirmDelete(){
        var respuesta = confirm("Estas seguro que deseas eliminar este registro");
    if(respuesta == true){
        return true;

    }
        else{
            return false;
        }
    }
</script>