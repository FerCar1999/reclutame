<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/Instituciones.php';
try {
    $x = new Instituciones;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'lista':
                $data = $x->obtenerListaInstitucion();
                echo json_encode($data);
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
