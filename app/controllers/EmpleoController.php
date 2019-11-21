<?php
//llamando el archivo app
require_once '../../config/app.php';
//llamando el archivo modelo de la tabla categoria
require_once APP_PATH . '/app/models/Empleo.php';
date_default_timezone_set("America/El_Salvador");
try {
    $x = new Empleo;
    if (isset($_POST['accion'])) {
        $_POST = $x->validateForm($_POST);
        switch ($_POST['accion']) {
            case 'crear':
                if ($x->setCodiEmpr($_POST['codiEmpr'])) {
                    if ($x->setCodiExpe($_POST['codiExpr'])) {
                        if ($x->setCodiTipoEmpl($_POST['codiTipoEmpl'])) {
                            if ($x->setNombEmpl($_POST['nombEmpl'])) {
                                if ($x->setUbicEmpl($_POST['ubicEmpl'])) {
                                    if ($x->setPublInicEmpl(date('Y-m-d'))) {
                                        if ($x->setPublFinaEmpl($_POST['publFinaEmpl'])) {
                                            if ($x->setCantSoliEmpl($_POST['cantSoliEmpl'])) {
                                                if ($x->setDescEmpl($_POST['descEmpl'])) {
                                                    if ($x->setSuelEmplInfe($_POST['suelEmplInfe'])) {
                                                        if ($x->setSuelEmplSupe($_POST['suelEmplSupe'])) {
                                                            if ($x->setEdadMaxi($_POST['edadMaxi'])) {
                                                                if ($x->setGeneEmpl($_POST['geneEmpl'])) {
                                                                    if ($x->setEdadMini($_POST['edadMini'])) {
                                                                        if ($x->crearEmpleo()) {
                                                                            throw new Exception('Exito');
                                                                        } else {
                                                                            throw new Exception('No se pudo agregar empleo');
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
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
            case 'modificar':
                if ($x->setCodiEmpl($_POST['codiEmplUpda'])) {
                    if ($x->setCodiExpe($_POST['codiExprUpda'])) {
                        if ($x->setCodiTipoEmpl($_POST['codiTipoEmplUpda'])) {
                            if ($x->setNombEmpl($_POST['nombEmplUpda'])) {
                                if ($x->setUbicEmpl($_POST['ubicEmplUpda'])) {
                                    if ($x->setPublFinaEmpl($_POST['publFinaEmplUpda'])) {
                                        if ($x->setCantSoliEmpl($_POST['cantSoliEmplUpda'])) {
                                            if ($x->setDescEmpl($_POST['descEmplUpda'])) {
                                                if ($x->setSuelEmplInfe($_POST['suelEmplInfeUpda'])) {
                                                    if ($x->setSuelEmplSupe($_POST['suelEmplSupeUpda'])) {
                                                        if ($x->setEdadMaxi($_POST['edadMaxiUpda'])) {
                                                            if ($x->setGeneEmpl($_POST['geneEmplUpda'])) {
                                                                if ($x->setEdadMini($_POST['edadMiniUpda'])) {
                                                                    if ($x->modificarEmpleo()) {
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
                                }
                            }
                        }
                    }
                }
                break;
            case 'eliminar':
                if ($x->setCodiEmpl($_POST['codiEmplDele'])) {
                    if ($x->eliminarEmpleo()) {
                        //agregar apartado para notificar que se acabo la oferta
                        throw new Exception('Exito');
                    }
                }
                break;
            case 'lista':
                $data = $x->obtenerEmpleos(date('Y-m-d'));
                echo json_encode($data);
                break;
            case 'listaM':
                $data = $x->obtenerEmpleosM(date('Y-m-d'), 2);
                echo json_encode($data);
                break;
            case 'buscar':
                $data = $x->obtenerEmpleosBusqueda(date('Y-m-d'),$_POST['nombEmpl'],$_POST['ubicEmpl']);
                echo json_encode($data);
                break;
            case 'uno':
                $data = null;
                if ($x->setCodiEmpl($_POST['codiEmpl'])) {
                    $data = $x->obtenerEmpleo();
                }
                echo json_encode($data);
                break;
        }
    }
} catch (Exception $error) {
    //enviando el mensaje ya sea de exito o de error en json
    echo json_encode($error->getMessage());
}
