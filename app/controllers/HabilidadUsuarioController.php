<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/HabilidadUsuario.php';
session_start();
try {
    $x = new HabilidadUsuario;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiUsua($_SESSION['codi_usua'])) {
                    if ($x->setCodiHabi($_POST['codiHabi'])) {
                        if ($x->setCodiNive($_POST['codiNive'])) {
                            if ($x->crearHabilidadUsuario()) {
                                throw new Exception('Exito');
                            }
                        }
                    }
                }
                break;
            case 'modificar':
                if ($x->setCodiHabiUsua($_POST['codiHabiUsua'])) {
                    if ($x->setCodiHabi($_POST['codiHabi'])) {
                        if ($x->setCodiNive($_POST['codiNive'])) {
                            if ($x->modificarHabilidadUsuario()) {
                                throw new Exception('Exito');
                            }
                        }
                    }
                }
                break;
            case 'eliminar':
                if ($x->setCodiHabiUsua($_POST['codiHabiUsuaDele'])) {
                    if ($x->eliminarHabilidadUsuario()) {
                        throw new Exception('Exito');
                    }
                }

                break;
            case 'lista':
                if ($x->setCodiUsua($_POST['codiUsua'])) {
                    $data = $x->obtenerListaHabilidadUsuario();
                    echo json_encode($data);
                }
                break;
            case 'uno':
                if ($x->setCodiHabiUsua($_POST['codiHabiUsua'])) {
                    $data = $x->obtenerListaHabilidadUsuarioEspecifica();
                    echo json_encode($data);
                }
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
