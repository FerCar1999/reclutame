<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/IntermediaRedEmpresa.php';
try {
    $x = new IntermediaRedEmpresa;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiRede($_POST['codiRede'])) {
                    if ($x->setCodiEmpr($_SESSION['codi_empr'])) {
                        if ($x->setLinkRede($_POST['linkRede'])) {
                            if ($x->crearRedEmpresa()) {
                                throw new Exception('Exito');
                            }
                        }
                    }
                }
                break;
                case 'modificar':
                if ($x->setCodiRede($_POST['codiRedeUpda'])) {
                    if ($x->setCodiInteRedeEmpr($_POST['codiInteRedeEmprUpda'])) {
                        if ($x->setLinkRede($_POST['linkRedeUpda'])) {
                            if ($x->modificarRedEmpresa()) {
                                throw new Exception('Exito');
                            }
                        }
                    }
                }
                break;
            case 'eliminar':
                if ($x->setCodiInteRedeEmpr($_POST['codiInteRedeEmprDele'])) {
                    if ($x->eliminarRedEmpresa()) {
                        throw new Exception('Exito');
                    }
                }
                break;
                case 'lista':
                $data = null;
                if ($x->setCodiEmpr($_SESSION['codi_empr'])) {
                    $data = $x->obtenerListaRedEmpresa();
                }
                echo json_encode($data);
                break;
            case 'uno':
                $data = null;
                if ($x->setCodiInteRedeEmpr($_POST['codiInteRedeEmpr'])) {
                    $data = $x->obtenerRedEmpresa();
                }
                echo json_encode($data);
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
