<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/ExperienciaUsuario.php';
session_start();
try {
    $x = new ExperienciaUsuario;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiEmpr($_POST['codiEmpr'])) {
                    if ($x->setCodiUsua($_SESSION['codi_usua'])) {
                        if ($x->setNombCarg($_POST['nombCarg'])) {
                            if ($x->setDesdExpeUsua($_POST['desdExpeUsua'])) {
                                if ($x->setHastExpeUsua($_POST['hastExpeUsua'])) {
                                    if ($x->crearExperienciaUsuario()) {
                                        throw new Exception('Exito');
                                    } else {
                                        throw new Exception('No se pudo agregar el contacto del empleo');
                                    }
                                }
                            }
                        }
                    }
                }
                break;
            case 'modificar':
                if ($x->setCodiEmpr($_POST['codiEmpr'])) {
                    if ($x->setCodiExpeUsua($_POST['codiExpeUsua'])) {
                        if ($x->setNombCarg($_POST['nombCarg'])) {
                            if ($x->setDesdExpeUsua($_POST['desdExpeUsua'])) {
                                if ($x->setHastExpeUsua($_POST['hastExpeUsua'])) {
                                    if ($x->modificarExperienciaUsuario()) {
                                        throw new Exception('Exito');
                                    }
                                }
                            }
                        }
                    }
                }
                break;
            case 'eliminar':
                if ($x->setCodiExpeUsua($_POST['codiExpeUsuaDele'])) {
                    if ($x->eliminarExperienciaUsuario()) {
                        throw new Exception('Exito');
                    } else {
                        throw new Exception('No se pudo eliminar el contacto');
                    }
                }

                break;
            case 'lista':
                $data = null;
                if($x->setCodiUsua($_SESSION['codi_usua'])){
                $data = $x->obtenerListaExperienciaUsuario();
                echo json_encode($data);
                }
                break;
            case 'uno':
                $data = null;
                if ($x->setCodiExpeUsua($_POST['codiExpeUsua'])) {
                    $data = $x->obtenerExperienciaUsuario();
                }
                echo json_encode($data);
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
