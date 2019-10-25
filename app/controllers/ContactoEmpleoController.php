<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/ContactoEmpleo.php';
try {
    $x = new ContactoEmpleo;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
        case 'crear':
            if ($x->setCodiEmpl($_POST['codiEmpl'])) {
                if ($x->setNombContEmpl($_POST['nombContEmpl'])) {
                    if ($x->setApelContEmpl($_POST['apelContEmpl'])) {
                        if ($x->setCorrContEmpl($_POST['corrContEmpl'])) {
                            if ($x->crearContactoEmpleo()) {
                                throw new Exception('Exito');
                            } else {
                                throw new Exception('No se pudo agregar el contacto del empleo');
                            }
                        }
                    }
                }
            }
            break;
        case 'modificar':
            if ($x->setCodiContEmpl($_POST['codiContEmplUpda'])) {
                if ($x->setNombContEmpl($_POST['nombContEmplUpda'])) {
                    if ($x->setApelContEmpl($_POST['apelContEmplUpda'])) {
                        if ($x->setCorrContEmpl($_POST['corrContEmplUpda'])) {
                            if ($x->modificarContactoEmpleo()) {
                                throw new Exception('Exito');
                            } else {
                                throw new Exception('No se pudo modificar el contacto del empleo');
                            }
                        }
                    }
                }
            }
            break;
        case 'eliminar':
            if ($x->setCodiContEmpl($_POST['codiContEmplDele'])) {
                if ($x->eliminarContactoEmpleo()) {
                    throw new Exception('Exito');
                } else {
                    throw new Exception('No se pudo eliminar el contacto');
                }
            }

            break;
        case 'lista':
            $data = null;
            if ($x->setCodiEmpl($_POST['codiEmpl'])) {
                $data = $x->obtenerListaContactoEmpleo();
            }
            echo json_encode($data);
            break;
        case 'uno':
            $data = null;
            if ($x->setCodiContEmpl($_POST['codiContEmpl'])) {
                $data = $x->obtenerContactoEmpleo();
            }
            echo json_encode($data);
            break;
    }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
