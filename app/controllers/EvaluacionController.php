<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/Evaluacion.php';
date_default_timezone_set("America/El_Salvador");
session_start();
try {
    //inicializando la clase de categoria
    $x = new Evaluacion;
    //si el post es para una de las acciones del crud
    if (isset($_POST['accion'])) {
        //Validando los datos del formulario
        $_POST = $x->validateForm($_POST);
        //switch para verificar que accion es la que se va a realizar
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiExpe($_POST['codiExpe'])) {
                    if ($x->setFechEval($_POST['fechEval'])) {
                        if (is_uploaded_file($_FILES['docuEval']['tmp_name'])) {
                            if ($x->setDocuEval($_FILES['docuEval'])) {
                                if ($x->agregarEvaluacion()) {
                                    throw new Exception('Exito');
                                } else {
                                    if ($x->unsetDocuEval()) {
                                        throw new Exception(Database::getException());
                                    } else {
                                        throw new Exception("Elimine el archivo manualmente");
                                    }
                                }
                            } else {
                                throw new Exception($x->getFileError());
                            }
                        } else {
                            throw new Exception("Seleccione un archivo");
                        }
                    } else {
                        throw new Exception("Ingrese la fecha en la que se realizo la evaluacion");
                    }
                } else {
                    throw new Exception("No se encontro el usuario");
                }
                break;
            case 'lista':
                $data = null;
                if ($x->setCodiExpe($_POST['codiExpe'])) {
                    $data = $x->obtenerListaEvaluacion();
                }
                echo json_encode($data);
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
