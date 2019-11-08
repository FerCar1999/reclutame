<?php
//Llamando archivo app
require_once '../config/app.php';
//Llamando archivo de vista de categoria
require_once APP_PATH . '/views/cuenta/registro.view.php';
if (isset($_SESSION['codi_tipo_usua'])) {
    if ($_SESSION['codi_tipo_usua']==2) {
        header('Location: index');
    }else {
        header('Location: ../private/index');
    }
} else {
}
ob_end_flush();
