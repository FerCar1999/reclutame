<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/IdiomaUsuario.php';
session_start();
try {
    $x = new IdiomaUsuario;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiUsua($_SESSION['codi_usua'])) {
                    if ($x->setCodiIdio($_POST['codiIdio'])) {
                        if ($x->setCodiNive($_POST['codiNive'])) {
                            if ($x->crearIdiomaUsuario()) {
                                throw new Exception('Exito');
                            }
                        }
                    }
                }
                break;
            case 'modificar':
                if ($x->setCodiIdioUsua($_POST['codiIdioUsua'])) {
                    if ($x->setCodiIdio($_POST['codiIdio'])) {
                        if ($x->setCodiNive($_POST['codiNive'])) {
                            if ($x->modificarIdiomaUsuario()) {
                                throw new Exception('Exito');
                            }else{
                                throw new Exception('No se pudo modificar el registro');
                            }
                        }else{
                            throw new Exception('Debe seleccionar el nivel');
                        }
                    }else{
                        throw new Exception('Debe seleccionar el idioma');
                    }
                }else{
                    throw new Exception('No se encontro el registro');
                }
                break;
            case 'eliminar':
                if ($x->setCodiIdioUsua($_POST['codiIdioUsuaDele'])) {
                    if ($x->eliminarIdiomaUsuario()) {
                        throw new Exception('Exito');
                    }
                }
                break;
            case 'lista':
                if ($x->setCodiUsua($_POST['codiUsua'])) {
                    $data = $x->obtenerListaIdiomaUsuario();
                    echo json_encode($data);
                }
                break;
                case 'uno':
                if ($x->setCodiIdioUsua($_POST['codiIdioUsua'])) {
                    $data = $x->obtenerIdiomaUsuario();
                    echo json_encode($data);
                }
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
