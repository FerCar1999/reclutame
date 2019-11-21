<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCursoLabel">Agregar Ausencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Fechas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Horas</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="form-group col-12 col-lg-12 col-xl-12">
                                    <label for="codiTipoAuse">Seleccione el tipo de ausencia:</label>
                                    <select id="codiTipoAuse" class="form-control">
                                        <option value="1">Prevista</option>
                                        <option value="2">Inprevista</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-12 col-xl-12">
                                    <label for="tipoAuse">Remunerada</label>
                                    <select id="tipoAuse" class="form-control">
                                        <option value="1" selected>Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-6 col-xl-6">
                                    <label for="fechInicAuse">Ingrese la fecha de inicio de ausencia:</label>
                                    <input class="datepicker" id="fechInicAuse">
                                </div>
                                <div class="form-group col-12 col-lg-6 col-xl-6">
                                    <label for="fechFinaAuse">Ingrese la fecha de finalizacion de ausencia:</label>
                                    <input class="datepicker" id="fechFinaAuse">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-outline-success" onclick="agregarAusenciaFecha();">Agregar</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                                <div class="form-group col-12 col-lg-12 col-xl-12">
                                    <label for="codiTipoAuse">Seleccione el tipo de ausencia:</label>
                                    <select id="codiTipoAuse" class="form-control">
                                        <option value="1">Prevista</option>
                                        <option value="2">Inprevista</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-12 col-xl-12">
                                    <label for="remuAuse">Remunerada</label>
                                    <select id="remuAuse" class="form-control">
                                        <option value="1" selected>Si</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-6 col-xl-6">
                                    <label for="horaInicAuse">Ingrese la hora de inicio de ausencia:</label>
                                    <input class="datepicker" id="horaInicAuse">
                                </div>
                                <div class="form-group col-12 col-lg-6 col-xl-6">
                                    <label for="horaFinaAuse">Ingrese la hora de finalizacion de ausencia:</label>
                                    <input class="datepicker" id="horaFinaAuse">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-outline-success" onclick="agregarAusenciaHora();">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>