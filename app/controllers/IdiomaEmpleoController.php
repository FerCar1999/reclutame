<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/IdiomaEmpleo.php';
try {
    $x = new IdiomaEmpleo;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiEmpl($_POST['codiEmpl'])) {
                    if ($x->setCodiIdio($_POST['codiIdio'])) {
                        if ($x->setCodiNive($_POST['codiNive'])) {
                            if ($x->crearIdiomaEmpleo()) {
                                throw new Exception('Exito');
                            }
                        }
                    }
                }
                break;
            case 'eliminar':
                if ($x->setCodiIdioEmpl($_POST['codiIdioEmplDele'])) {
                    if ($x->eliminarIdiomaEmpleo()) {
                        throw new Exception('Exito');
                    }
                }
                break;
            case 'lista':
                if ($x->setCodiEmpl($_POST['codiEmpl'])) {
                    $data = $x->obtenerListaIdiomaEmpleo();
                    echo json_encode($data);
                }
                break;
            case 'verificarIdiomas':
                if (isset($_SESSION['codi_usua'])) {
                    $data = $x->verificarIdiomaUsuario($_SESSION['codi_usua'], $_POST['codiIdio']);
                    if ($data['codi_idio'] > 0) {
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
