<?php
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/Asistencia.php';
date_default_timezone_set("America/El_Salvador");
try {
    $x = new Asistencia;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                $correlativo = $x->obtenerCodigoExperiencia($_POST['correlativo']);
                if ($x->setCodiExpe($correlativo['codi_expe_usua'])) {
                    $cant = $x->verificarEntradaSalida(date('Y-m-d'));
                    if ($cant['conteo'] < 2) {
                        if ($x->setFechAsis(date('Y-m-d H:i:s'))) {
                            if ($x->agregarAsistencia()) {
                                throw new Exception('Exito');
                            } else {
                                throw new Exception('No se pudo pasar asistencia, intentelo mas tarde');
                            }
                        }
                    } else {
                        throw new Exception('Al parecer ya fueron registradas una entrada y una salida, intentelo maniana');
                    }
                }
                break;
            case 'lista':
                $data = $x->obtenerListaAsistencia($_POST['correlativo'], date('Y-m-d'));
                echo json_encode($data);
            break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
