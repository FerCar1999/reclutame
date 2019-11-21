<?php
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/EmpleoUsuario.php';
date_default_timezone_set("America/El_Salvador");
session_start();
try {
    $x = new EmpleoUsuario;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiEmpl($_POST['codiEmpl'])) {
                    if (isset($_SESSION['codi_usua'])) {
                        if ($x->setCodiUsua($_SESSION['codi_usua'])) {
                            if ($x->crearEmpleoUsuario()) {
                                throw new Exception('Exito');
                            } else {
                                throw new Exception('No se pudo agregar el contacto del empleo');
                            }
                        }
                    } else {
                        throw new Exception('Debe iniciar sesion para poder aplicar a la oferta');
                    }
                } else {
                    throw new Exception('No se encontro el empleo');
                }
                break;
            case 'eliminar':
                if ($x->setCodiEmplUsua($_POST['codiEmplUsuaDele'])) {
                    if ($x->setMotiElim($_POST['motiElim'])) {
                        if ($x->eliminarEmpleoUsuario()) {
                            throw new Exception('Exito');
                        } else {
                            throw new Exception('No se pudo eliminar');
                        }
                    }
                }
                break;
            case 'lista':
                $data = null;
                if ($x->setCodiEmpl($_POST['codiEmpl'])) {
                    $data = $x->obtenerListaEmpleoUsuario();
                }
                echo json_encode($data);
                break;
            case 'uno':
                $data = null;
                if ($x->setCodiEmplUsua($_POST['codiEmplUsua'])) {
                    $data = $x->obtenerContactoEmpleo();
                }
                echo json_encode($data);
                break;
            case 'miLista':
                if ($x->setCodiUsua($_SESSION['codi_usua'])) {
                    $data = $x->obtenerMiListaEmpleos();
                    echo json_encode($data);
                }
                break;
            case 'agregarPrueba':
                if ($x->setCodiEmplUsua($_POST['codiEmplUsua'])) {
                    if (is_uploaded_file($_FILES['archPrue']['tmp_name'])) {
                        if ($x->setArchPrue($_FILES['archPrue'])) {
                            if ($x->modificarPrueba()) {
                                throw new Exception('Exito');
                            } else {
                                if ($x->unsetArchPrue()) {
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
                }else{
                    throw new Exception("Encontro empleo");
                }
                break;
            case 'agregarContrato':
                if ($x->setCodiEmplUsua($_POST['codiEmplUsua'])) {
                    if (is_uploaded_file($_FILES['archCont']['tmp_name'])) {
                        if ($x->setArchCont($_FILES['archCont'])) {
                            if ($x->modificarContrato()) {
                                throw new Exception('Exito');
                            } else {
                                if ($x->unsetArchCont()) {
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
                }
                break;
            case 'agregarReglamento':
                if ($x->setCodiEmplUsua($_POST['codiEmplUsua'])) {
                    if (is_uploaded_file($_FILES['archRegl']['tmp_name'])) {
                        if ($x->setArchRegl($_FILES['archRegl'])) {
                            if ($x->modificarReglamento()) {
                                throw new Exception('Exito');
                            } else {
                                if ($x->unsetArchPrue()) {
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
                }
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
