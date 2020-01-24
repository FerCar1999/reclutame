<?php include APP_PATH . '/views/templates/head.view.php' ?>
<?php include APP_PATH . '/views/templates/sidebar.view.php' ?>
<div class="container-fluid">
    <h4></h4>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4>Recurso Humano</h4>
                    <div class="formulario">
                        <div class="row">
                            <div class="form-group col-12 col-lg-12 col-xl-12">
                                <label for="corrExpe">Ingrese el correlativo del empleado:</label>
                                <input type="text" class="form-control" id="corrExpe" placeholder="Ejemplo RR201901...">
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-primary btn-block">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <h1></h1>
                    <ul class="list-group" id="listaRecurso">
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h5>Informacion de la persona</h5>
                    <p>Haz click en un elemento de la lista para mostrar su informacion</p>
                    <h4></h4>
                    <div class="informacion">
                        <div class="row">
                            <div class="col-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Asistencias</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Ausencias</a>
                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Capacitaciones</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Evaluaciones</a>
                                </div>
                            </div>
                            <div class="col-9">
                            <input type="hidden" id="idUsuario">
                            <input type="hidden" id="idUsuarioR">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <h5></h5>
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Asistencia de Hoy</h5>
                                            </div>
                                            <div class="col-12">
                                                <ul class="list-group" id="listaAsistencia">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        <h5></h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <h5>Ausencias de la Persona</h5>
                                            </div>
                                            <div class="col-6">
                                                <a class="btn btn-primary btn-sm btn-block text-white" role="button" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar Ausencia</a>
                                            </div>
                                            <div class="col-12">
                                            <br>
                                                <ul class="list-group" id="listaAusencia">
                                                </ul>
                                            </div>
                                            
                                            <div class="col-12">
                                            <br>
                                                <a class="btn btn-primary btn-sm  text-white" role="button" onclick="iat();">IAT</a>
                                                <a class="btn btn-primary btn-sm  text-white" role="button" onclick="iatr();">IATR</a>
                                                <a class="btn btn-primary btn-sm text-white" role="button" onclick="iatnr();">IATNR</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <h5></h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <h5>Capacitaciones de la Persona</h5>
                                            </div>
                                            <div class="col-6">
                                                <a class="btn btn-primary btn-sm btn-block text-white" role="button" data-toggle="modal" data-target=".agregarCapacitacion">Agregar Capacitacion</a>
                                            </div>
                                            <div class="col-12">
                                                <ul class="list-group" id="listaCapacitacion">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                        <h5></h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <h5>Evaluaciones de la Persona</h5>
                                            </div>
                                            <div class="col-6">
                                                <a class="btn btn-primary btn-sm btn-block text-white" role="button" data-toggle="modal" data-target=".agregarEvaluacion">Agregar Evaluacion</a>
                                            </div>
                                            <div class="col-12">
                                                <h6></h6>
                                                <ul class="list-group" id="listaEvaluacion">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APP_PATH . '/views/private/ausencia/agregar.view.php' ?>
<?php include APP_PATH . '/views/private/evaluacion/agregar.view.php' ?>
<?php include APP_PATH . '/views/private/capacitacion/agregar.view.php' ?>
<script src="<?= WEB_PATH ?>js/AJAX/private/recurso.js"></script>
<?php include APP_PATH . '/views/templates/footer.view.php' ?>