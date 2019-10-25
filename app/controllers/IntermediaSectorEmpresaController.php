<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/IntermediaSectorEmpresa.php';
try {
    $x = new IntermediaSectorEmpresa;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiSect($_POST['codiSect'])) {
                    if ($x->codiEmpr($_POST['codiEmpr'])) {
                        if ($x->crearSectorEmpresa()) {
                            throw new Exception('Exito');
                        }
                    }
                }
                break;
            case 'modificar':
                if ($x->setCodiSect($_POST['codiSectUpda'])) {
                    if ($x->codiEmpr($_SESSION['codi_empr'])) {
                        if ($x->modificarSectorEmpresa()) {
                            throw new Exception('Exito');
                        }
                    }
                }
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
