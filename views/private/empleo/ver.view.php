<div class="modal fade bd-example-modal-lg" id="infoCandidato" tabindex="-1" role="dialog" aria-labelledby="agregarCursoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCursoLabel">Informacion de Candidato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codiEmplUsuaAct">
                <div class="container">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Informacion</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-pruebas" role="tab" aria-controls="nav-profile" aria-selected="false">Pruebas</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-contrato" role="tab" aria-controls="nav-profile" aria-selected="false">Contrato</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-reglamento" role="tab" aria-controls="nav-profile" aria-selected="false">Reglamento</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active container" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="col-12">
                                    <label for="motivoElim">Ingrese el motivo por el cual elimina del proceso al candidato</label>
                                    <textarea class="form-control" id="motivoElim" placeholder="Agregue el motivo"></textarea>
                                    <button type="button" class="btn btn-outline-success" onclick="eliminarProceso();">Dar de baja</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade container" id="nav-pruebas" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-12">
                                    <h6></h6>
                                    <a id="pruebaArchivo" class="btn btn-outline-secondary" target="_blank">Ver Archivo</a>
                                </div>
                            </div>
                            <form id="prueba" enctype="multiform/form-data">
                                <div class="row">
                                    <div class="form-group col-12 col-lg-12 col-xl-12">
                                        <label for="pruebArchUsua">Ingrese la prueba que se le realizo a la persona:</label>
                                        <input type="file" class="form-control-file" id="pruebArchUsua">
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-outline-success" onclick="agregarPrueba();">Agregar Prueba</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade container" id="nav-contrato" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-12">
                                    <h6></h6>
                                    <a id="contratoArchivo" class="btn btn-outline-secondary" target="_blank">Ver Archivo</a>
                                </div>
                            </div>
                            <form id="contrato" enctype="multiform/form-data">
                                <div class="row">
                                    <div class="form-group col-12 col-lg-12 col-xl-12">
                                        <label for="contratoArchUsua">Ingrese el contrato de la persona:</label>
                                        <input type="file" class="form-control-file" id="contratoArchUsua">
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-outline-success" onclick="agregarContrato();">Agregar Contrato</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade container" id="nav-reglamento" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-12">
                                    <h6></h6>
                                    <a id="reglamentoArchivo" class="btn btn-outline-secondary" target="_blank">Ver Archivo</a>
                                </div>
                            </div>
                            <form id="reglamento" enctype="multiform/form-data">
                                <div class="row">
                                    <div class="form-group col-12 col-lg-12 col-xl-12">
                                        <label for="reglamentoArchUsua">Ingrese el reglamento:</label>
                                        <input type="file" class="form-control-file" id="reglamentoArchUsua">
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-outline-success" onclick="agregarReglamentp();">Agregar Reglamento</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>