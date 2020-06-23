<head>
    <link rel="stylesheet" href="./css/carga.css">
</head>
<body id="pantalla_carga">
    <div id="contenedor_carga">
        <div class="carga"></div>
        <div class="carga2"></div>
    </div>
    <script>
    window.onload = function(){
        var myVar = setInterval(myTimer, 500);

        function myTimer() {
            document.getElementById("contenedor_carga").style.visibility = 'hidden';
            document.getElementById("contenedor_carga").style.opacity = '0'; 
        }
    }
    </script>
</body>