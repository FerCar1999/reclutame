<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/HabilidadEmpleo.php';
session_start();
try {
    $x = new HabilidadEmpleo;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiEmpl($_POST['codiEmpl'])) {
                    if ($x->setCodiHabi($_POST['codiHabi'])) {
                        if ($x->crearHabilidadEmpleo()) {
                            throw new Exception('Exito');
                        }
                    }
                }
                break;
            case 'eliminar':
                if ($x->setCodiHabiEmpl($_POST['codiHabiEmplDele'])) {
                    if ($x->eliminarHabilidadEmpleo()) {
                        throw new Exception('Exito');
                    }
                }

                break;
            case 'lista':
                if ($x->setCodiEmpl($_POST['codiEmpl'])) {
                    $data = $x->obtenerListaHabilidadEmpleo();
                    echo json_encode($data);
                }
                break;

            case 'verificarAptitudes':
                if (isset($_SESSION['codi_usua'])) {
                    $data = $x->verificarAptitudUsuario($_SESSION['codi_usua'], $_POST['codiHabi']);
                    if ($data['codi_habi'] > 0) {
                        echo json_encode('Si');
                    } else {
                        echo json_encode('No');
                    }
                } else {
                    echo json_encode('Si');
                }

                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
