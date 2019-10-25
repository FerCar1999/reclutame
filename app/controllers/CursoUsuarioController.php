<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/CursoUsuario.php';
date_default_timezone_set("America/El_Salvador");
session_start();
try {
    //inicializando la clase de categoria
    $x = new CursoUsuario;
    //si el post es para una de las acciones del crud
    if (isset($_POST['accion'])) {
        //Validando los datos del formulario
        $_POST = $x->validateForm($_POST);
        //switch para verificar que accion es la que se va a realizar
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiUsua($_SESSION['codi_usua'])) {
                    if ($x->setCodiInsti($_POST['codiInsti'])) {
                        if ($x->setNombCurs($_POST['nombCurs'])) {
                            if ($x->setFechCurs($_POST['fechCurs'])) {
                                if (is_uploaded_file($_FILES['archCurs']['tmp_name'])) {
                                    if ($x->setArchCurs($_FILES['archCurs'])) {
                                        if ($x->crearCursoUsuario()) {
                                            throw new Exception('Exito');
                                        } else {
                                            if ($x->unsetArchCurs()) {
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
                        }
                    }
                }
                break;
            case 'modificar':
                if ($x->setCodiCursUsua($_POST['codiCursUsuaUpda'])) {
                    if ($x->setCodiInsti($_POST['codiInstiUpda'])) {
                        if ($x->setNombCurs($_POST['nombCursUpda'])) {
                            if ($x->setFechCurs($_POST['fechCursUpda'])) {
                                if ($x->modificarCursoUsuario()) {
                                    throw new Exception('Exito');
                                } else {
                                    throw new Exception('No se pudo modificar');
                                }
                            }
                        }
                    }
                }
                break;
            case 'modificarArchivo':
                if ($x->setCodiCursUsua($_POST['codiCursUsuaUpda'])) {
                    if (is_uploaded_file($_FILES['archCursUpda']['tmp_name'])) {
                        if ($x->setArchCurs($_FILES['archCursUpda'])) {
                            if ($x->modificarArchivoCursoUsuario()) {
                                throw new Exception('Exito');
                            } else {
                                if ($x->unsetArchCurs()) {
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
            case 'eliminar':
                if ($x->setCodiCursUsua($_POST['codiCursUsuaDele'])) {
                    if ($x->eliminarCursoUsuario()) {
                        throw new Exception('Exito');
                    }
                }
                break;
            case 'lista':
                $data = null;
                if ($x->setCodiUsua($_SESSION['codi_usua'])) {
                    $data = $x->obtenerCursoUsuario();
                }
                echo json_encode($data);
                break;
            case 'uno':
                $data = null;
                if ($x->setCodiCursUsua($_POST['codiCursUsua'])) {
                    $data = $x->obtenerCursoUsuario();
                }
                echo json_encode($data);
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
