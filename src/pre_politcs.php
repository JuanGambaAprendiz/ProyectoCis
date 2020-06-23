<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/estilos.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <title>MUEBLES NGR</title>
</head>
<body>
<!--Banner-->
    <section>
        <nav class="navbar navbar-expand-md navbar-dark px-5 py-2 fixed-top cafe-oscuro">
            <a class="navbar-brand" href=""><h3>Muebles NGR</h3></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="menu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="btn btn-coffee" href="#nosotros"><h5>Nosotros</h5></a></li>
                    <li class="nav-item"><a class="btn btn-coffee" href="#contacto"><h5>Contáctanos</h5></a></li>
                </ul>
            </div>
        </nav>
    </section>
<!--End Banner-->
<!--Section Presentation-->
    <!--Presentation-->
    <section class="">
      <div class="presentation">
        <div  class="container mt-5">
          <div class="row">
            <div class="col"></div>
            <div style="margin-top: 195px;" class="col-xs-4 col-md-8 ">
              <h1 class="text-center mt-5 display-1">Muebles NGR</h1>
              <br>
              <center><button style="border: solid 1px white;" class="btn btn-lg btn-coffee py-3" href="#">Nuestro Sitio</button></center>
            </div>
            <div class="col"></div>
          </div>
        </div>
      </div>
    </section>
    <!--End Presentation-->
    <br id="nosotros">
    <!--About us-->
    <section>
      <div class="container mt-5">
        <br><br><br>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="header-content-left">
              <br>
              <h1 class="display-4">Términos y condiciones</h1>
              <p class="mt-5">
              Según la ley 1581 de 2012
              </p>
              <p>
              Los ciudadanos tienen derecho a conocer, actualizar y rectificar toda la información que se almacene o se recopile en las bases de datos 
              administradas por la empresa muebles NGR. Conocida como el Régimen General de Protección de datos Personales o habeas data.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="header-content-right">
              <p>
                <br>
                •	En este documento usted como usuario da el derecho a la empresa muebles NGR, 
                a el tratamiento de información personal y a mostrarla de forma cuantitativa.
                <br>
                •	Política de tratamiento de información personal se basará en la ley 1266 de 2008 “Son públicos, 
                entre otros” y no se dará paso al dato sensible o de alguna connotación, Además toda información que haya sido tratada del usuario u/o ciudadano no sé pondrá a disposición de este.
                <br>
                <br>
                Se debe de tener en cuenta que la entidad podrá verificar la información dada.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
<!--End Section Presentation-->
<!--Section Find us-->
<!--End Section Find Us-->
<!--Footer Section-->
<section>
  <footer class="page-footer font-small cafe-oscuro py-4">
    <div class="container-fluid text-center text-xs-center">
      <div class="col-md-12 mt-md-0 mt-3">

            <p class="text-white">&copy; 2019 Inventarios Muebles
              <a class="btn-link-access" href='pre_iniciarSesion2.php'>NGR</a>.
              <br>Todos los derechos reservados.Diseñado por:
              Brayan Rojas, Juan Gamba & Luis Hernandez.</p>
          </div>

      </div>
    </div>
  </footer>
</section>
<!--End Footer Section-->
  <script>
    $(function () {

    function initMap() {

        var location = new google.maps.LatLng(50.0875726, 14.4189987);

        var mapCanvas = document.getElementById('map');
        var mapOptions = {
            center: location,
            zoom: 16,
            panControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);

    }

    google.maps.event.addDomListener(window, 'load', initMap);
    });
  </script>
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="./js/jquery-3.3.1.js"></script>
  <script src="./js/sweetalert2.min.js"></script>
  <script src="./js/bootstrap.js"></script>
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
</body>
</html>
