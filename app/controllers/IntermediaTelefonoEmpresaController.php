<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/IntermediaTelefonoEmpresa.php';
try {
    $x = new IntermediaTelefonoEmpresa;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiTele($_POST['codiTele'])) {
                    if ($x->setCodiEmpr($_SESSION['codi_empr'])) {
                        if ($x->setNumeTele($_POST['numeTele'])) {
                            if ($x->crearTelefonoEmpresa()) {
                                throw new Exception('Exito');
                            }
                        }
                    }
                }
                break;
                case 'modificar':
                if ($x->setCodiTele($_POST['codiTeleUpda'])) {
                    if ($x->setCodiInteTeleEmpr($_POST['codiInteTeleEmprUpda'])) {
                        if ($x->setNumeTele($_POST['numeTeleUpda'])) {
                            if ($x->modificarTelefonoEmpresa()) {
                                throw new Exception('Exito');
                            }
                        }
                    }
                }
                break;
            case 'eliminar':
                if ($x->setCodiInteTeleEmpr($_POST['codiInteTeleEmprDele'])) {
                    if ($x->eliminarTelefonoEmpresa()) {
                        throw new Exception('Exito');
                    }
                }
                break;
                case 'lista':
                $data = null;
                if ($x->setCodiEmpr($_SESSION['codi_empr'])) {
                    $data = $x->obtenerListaTelefonoEmpresa();
                }
                echo json_encode($data);
                break;
            case 'uno':
                $data = null;
                if ($x->setCodiInteTeleEmpr($_POST['codiInteTeleEmpr'])) {
                    $data = $x->obtenerTelefonoEmpresa();
                }
                echo json_encode($data);
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
