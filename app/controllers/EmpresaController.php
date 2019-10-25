<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/EmpresaController.php';
date_default_timezone_set("America/El_Salvador");
session_start();
try {
    //inicializando la clase de categoria
    $x = new Empresa;
    //si el post es para una de las acciones del crud
    if (isset($_POST['accion'])) {
        //Validando los datos del formulario
        $_POST = $x->validateForm($_POST);
        //switch para verificar que accion es la que se va a realizar
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setNombEmpr($_POST['nombEmpr'])) {
                    if ($x->setDescEmpr($_POST['descEmpr'])) {
                        if ($x->setDireEmpr($_POST['direEmpr'])) {
                            if ($x->setFechFundEmpr($_POST['fechFundEmpr'])) {
                                if ($x->setVisiEmpr($_POST['visiEmpr'])) {
                                    if ($x->setMisiEmpr($_POST['misiEmpr'])) {
                                        if ($x->setCodiEspe($_POST['codiEspe'])) {
                                            if (is_uploaded_file($_FILES['logoEmpr']['tmp_name'])) {
                                                if ($x->setImagen($_FILES['logoEmpr'])) {
                                                    if ($x->crearEmpresa()) {
                                                        throw new Exception('Exito');
                                                    } else {
                                                        if ($x->unsetImagen()) {
                                                            throw new Exception(Database::getException());
                                                        } else {
                                                            throw new Exception("Elimine el imagen manualmente");
                                                        }
                                                    }
                                                } else {
                                                    throw new Exception($x->getImageError()());
                                                }
                                            } else {
                                                throw new Exception("Seleccione un archivo");
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                break;
            case 'modificar':
                if ($x->setNombEmpr($_POST['nombEmprUpda'])) {
                    if ($x->setDescEmpr($_POST['descEmprUpda'])) {
                        if ($x->setDireEmpr($_POST['direEmprUpda'])) {
                            if ($x->setFechFundEmpr($_POST['fechFundEmprUpda'])) {
                                if ($x->setVisiEmpr($_POST['visiEmprUpda'])) {
                                    if ($x->setMisiEmpr($_POST['misiEmprUpda'])) {
                                        if ($x->setCodiEspe($_POST['codiEspeUpda'])) {
                                            if ($x->setCodiEmpr($_SESSION['codi_empr'])) {
                                                if ($x->modificarEmpresa()) {
                                                    throw new Exception('Exito');
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                break;
            case 'modificarArchivo':
                if ($x->setCodiEmpr($_POST['codiCursUsuaUpda'])) {
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
            case 'lista':
                    $data = $x->obtenerEmpresas()();
                echo json_encode($data);
                break;
            case 'uno':
                $data = null;
                if ($x->setCodiEmpr($_POST['codiEmpr'])) {
                    $data = $x->obtenerEmpresa();
                }
                echo json_encode($data);
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
