<?php 
    include("est_cargando.php");
?>
<!-- NavBar (Banner) -->
<nav class="full-box dashboard-Navbar fijar" style="">

    <!-- Despliegue del sideBar -->
    <ul class="full-box list-unstyled text-right">
        <li class="pull-left">
            <a href="#!" class="btn-menu-dashboard" title="Menú"><i class="zmdi zmdi-menu"></i></a>
        </li>
        <li class="pull-left">
            <a href="s_indexl.php" title="Ir a página de Inicio"><img src="./img/logo/LogoMueblesNGR1.jpg" alt="Muebles NGR" width="100" height="30"></a>
        </li>
    </ul>
    <!-- Icono de la cuenta de usuario -->
    <div class="correr fijar" style="margin-right: 10px;">
        <a title="Manual de Usuario" href="./pdf/Manual de Usuario.pdf" target="_blank" class="circulo btn btn-info text-center"><b>?</b></a>
    </div>
    <div class="dropdown correr fijar" style="margin-right: 50px;">
        <button title="Cuenta de Usuario" type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="zmdi zmdi-account"></i>
        </button>
        
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left fijar" style="min-width: 230px; background-color: #FFF;">
            <center style="margin-bottom: 12px;">
                <div class="dorpdown-item">
                    <a href="s_indexl.php"><img src="img/perfil/account.png" style="border-radius: 100px;width: 150px;height: 150px; border: black 2px solid; margin-top: 15px; margin-bottom: 5px;"></a>
                </div>
                <p>
                    <?php
                        echo $_SESSION["usuarioNombre"];
                    ?>
                </p>
                <h6 class="dropdown-header">
                    <?php
                        echo $_SESSION["rolNombre"];
                    ?>
                </h6>
                <hr>
                <!-- restricción sólo superadmin -->
                <?php 
                    if($_SESSION['rol']==2){
                ?>
                <div class="dorpdown-item">
                    <a href="s_indexl_superAdmin.php" title="Usuarios" class="btn btn-info">
                        <i class="zmdi zmdi-accounts"></i>
                    </a>
                    <?php 
                        }
                    ?>
                    <a href="pre_datosUsuario.php" title="Información Personal" class="btn btn-success">
                        <i class="zmdi zmdi-account-o"></i>
                    </a>
                    <a href="#!" title="Salir del sistema" class="btn btn-danger btn-exit-system">
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </div>
            </center>
        </div>
    </div>
</nav>