<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/EmpleoUsuario.php';
date_default_timezone_set("America/El_Salvador");
try {
    $x = new EmpleoUsuario;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiEmpl($_POST['codiEmpl'])) {
                    if ($x->setCodiUsua($_POST['codiUsua'])) {
                        if ($x->crearEmpleoUsuario()) {
                            throw new Exception('Exito');
                        } else {
                            throw new Exception('No se pudo agregar el contacto del empleo');
                        }
                    }
                }
                break;
            case 'eliminar':
                if ($x->setCodiEmplUsua($_POST['codiEmplUsuaDele'])) {
                    if ($x->eliminarEmpleoUsuario()) {
                        throw new Exception('Exito');
                    } else {
                        throw new Exception('No se pudo eliminar');
                    }
                }

                break;
            case 'lista':
                $data = null;
                if ($x->setCodiEmpl($_POST['codiEmpl'])) {
                    $data = $x->obtenerListaEmpleoUsuario();
                }
                echo json_encode($data);
                break;
            case 'uno':
                $data = null;
                if ($x->setCodiEmplUsua($_POST['codiEmplUsua'])) {
                    $data = $x->obtenerContactoEmpleo();
                }
                echo json_encode($data);
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
