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
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="header-content-left">
              <br>
              <h1 class="display-4">Sobre Nosotros</h1>
              <p class="mt-5">
                Somos una empresa con varios años de experiencia en la fabricación,
                comercialización de muebles para el hogar.Ofrecemos una gran variedad
                en Salas, Comedores, Alcobas, muebles modulares y accesorios.
              </p>
              <p>
                Estamos en innovación permanente para brindar a nuestros clientes lo mejor en
                cuanto a diseño,calidad,garantia y precios bajos.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="header-content-right">
              <p>
                <span><b>MISION</b></span><br>
                Somos una Empresa constituida legalmente. Con varios años de experiencia.dedicada a contribuir
                con el bienestar de nuestros clientes ofreciendo  los mejores muebles con
                una amplia variedad de diseños y con características de alta calidad.
                <br><span><b>VISION</b></span><br>
                Lograr consolidarnos como una destacada,reconocida e importante empresa.
                <br><span><b>VALORES</b></span><br>
                Respeto, compromiso entusiasmo, justicia, creatividad, honestidad, profesionalismo,
                compañerismo y cooperación.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
<!--End Section Presentation-->
<!--Section Find us-->
    <section id="">
      <div class="container">
        <div class="row mt-5">
          <div class="col-md-6">
            <div class="">
              <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Cra.+102+%2319-43,+Bogotá" style="border:0" allowfullscreen="" width="600" height="450" frameborder="0"></iframe>
              </div>
            </div>
          </div>
          <div class="col-md-6 mt-5">
            <div class="info-right">
              <h2>Encuentra Muebles NGR</h2>
              <p>
                  <i class="zmdi zmdi-pin"></i>
                  Carrera 102 19 43 , Fontibón
                  Bogotá, Distrito Capital de Bogotá
                  Colombia
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="info-two">
      <div class="container">
        <div class="row my-5">
          <div class="col-md-6">
            <h2>Lorem repellat qui.</h2>
            <p>Amet neque nulla enim ex adipisci. Dolorum maxime at mollitia eius explicabo maxime eaque hic eveniet corporis est officia corporis laudantium sed odit officia, voluptates iure in doloremque. Atque quo.</p>
          </div>
          <div class="col-md-6">
            <h2>Dolor harum debitis!</h2>
            <p>Ipsum neque ratione illo fuga numquam accusamus. Ipsam dolore non reprehenderit sed voluptatibus. Aut fugit repudiandae consectetur in obcaecati doloremque praesentium ratione. Laboriosam sapiente corrupti laboriosam aut velit quidem itaque.</p>
          </div>
        </div>
      </div>
    </section>
<!--End Section Find Us-->
<!--Footer Section-->
<section>
  <footer class="page-footer font-small cafe-oscuro py-4">
    <div class="container-fluid text-center text-xs-center">
      <div class="col-md-12 mt-md-0 mt-3">

            <p class="text-white">&copy; 2019 Inventarios Muebles
              <a id='textl' href='pre_iniciarSesion.php'>NGR</a>.
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
