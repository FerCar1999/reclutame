<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/ExperienciaUsuario.php';
try {
    $x = new ExperienciaUsuario;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiEmpr($_POST['codiEmpr'])) {
                    if ($x->setCodiUsua($_POST['codiUsua'])) {
                        if ($x->setCodiCarg($_POST['codiCarg'])) {
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
                if ($x->setCodiEmpr($_POST['codiEmprUpda'])) {
                    if ($x->setCodiExpeUsua($_POST['codiExpeUsuaUpda'])) {
                        if ($x->setCodiCarg($_POST['codiCargUpda'])) {
                            if ($x->setDesdExpeUsua($_POST['desdExpeUsuaUpda'])) {
                                if ($x->setHastExpeUsua($_POST['hastExpeUsuaUpda'])) {
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
                $data = $x->obtenerListaExperienciaUsuario()();
                echo json_encode($data);
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
