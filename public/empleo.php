<?php
//Llamando archivo app
require_once '../config/app.php';
//Llamando archivo de vista de categoria
require_once APP_PATH . '/views/public/empleo/index.view.php';
if (isset($_SESSION['codi_tipo_usua'])) {
    
} else {
	header('Location: index');
}
ob_end_flush();