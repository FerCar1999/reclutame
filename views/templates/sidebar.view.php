<?php
//definiendo el maximo tiempo de una sesion (segundos*cantidad de minutos)
define('MAX_SESSION_TIME', 60 * 60);
//verificando la existencia de las variables de sesion importantes
if (isset($_SESSION['codi_usua']) && isset($_SESSION['codi_tipo_usua'])) {
    //verificando si existe la variable de sesion de ultima actividad y verificando si el tiempo actual menos el tiempo de la ultima actividad es mayor a la maxima cantidad de tiempo de una sesion
    if (isset($_SESSION['ULTIMA_ACTIVIDAD']) && (time() - $_SESSION['ULTIMA_ACTIVIDAD'] > MAX_SESSION_TIME)) {
        //destruyendo sesion
        session_destroy();
        //enviando al login
        header('location: ../public/index');
    } else {
        //ingresando tiempo actual a nuestra ultima actividad
        $_SESSION['ULTIMA_ACTIVIDAD'] = time();
        if ($_SESSION['codi_tipo_usua'] == 1) {
            print('
            <nav id="navbar-example2" class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="index">
        <img src="' . IMG_PATH . 'logo.png" height="40" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
        <ul class="nav ">
            <li class="nav-item">
                <a class="nav-link registro" href="empleo">Mis Ofertas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="cerrarSesion();">Cerrar Sesion</a>
            </li>
        </ul>
    </div>
    </nav>
            ');
        } else {
            if ($_SESSION['codi_tipo_usua'] == 2) {
                print('
                <nav id="navbar-example2" class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="index">
            <img src="' . IMG_PATH . 'logo.png" height="40" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
            <ul class="nav ">
                <li class="nav-item">
                    <a class="text-white" href="empleo">
                    <div class="row align-items-center bg-primary" style="border-radius:30px;height:50px;width:130px;margin-right: 20px;">
                        <div class="col-12">
                            Mis Ofertas
                        </div>
                    </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="text-white" href="perfil">
                    <div class="row align-items-center bg-primary" style="border-radius:30px;height:50px;width:130px;">
                        <div class="col-4" style="padding-right:0px; padding-left:0px;">
                            <img src="' . IMG_PATH . 'fotos/' . $_SESSION['foto_usua'] . '" alt="" class="rounded-circle img-fluid">
                        </div>
                        <div class="col-8"  style="padding-left:10px;padding-right:0px;">
                            Mi perfil
                        </div>
                    </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="text-white" onclick="cerrarSesion();">
                    <div class="row align-items-center bg-danger" style="border-radius:30px;height:50px;width:130px;margin-left: 20px;">
                        <div class="col-12">
                            Cerrar Sesion
                        </div>
                    </div>
                    </a>
                </li>
            </ul>
        </div>
        </nav>
                ');
            }
        }
    }
} else {
    print('
    <nav id="navbar-example2" class="navbar sticky-top navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="index">
            <img src="' . IMG_PATH . 'logo.png" height="40" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo01">
            <ul class="nav ">
                <li class="nav-item">
                    <a class="nav-link registro" href="registro">Registrate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login">Iniciar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>
                ');
}
