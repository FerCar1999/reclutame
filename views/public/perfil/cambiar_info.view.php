<div class="modal fade bd-example-modal-lg" id="modificarPerfil" tabindex="-1" role="dialog" aria-labelledby="agregarCursoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCursoLabel">Modificar Curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codiCursUsuaUpda">
                <div class="container">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Modificar Informacion</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Modificar Archivo</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active container" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="form-group col-12 col-lg-6 col-xl-6">
                                    <label for="nombCursUpda">Ingrese el nombre del curso:</label>
                                    <input type="text" class="form-control" id="nombCursUpda" placeholder="Ingrese el nombre del curso">
                                </div>
                                <div class="form-group col-12 col-lg-6 col-xl-6">
                                    <label for="codiInstCursUpda">Seleccione la institucion donde lo realizo:</label>
                                    <select id="codiInstCursUpda" class="form-control">
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-12 col-xl-12">
                                    <label for="fechCursUpda">Ingrese la fecha en que realizo el curso:</label>
                                    <input type="text" id="fechCursUpda">
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-outline-success" onclick="modificarCurso();">Modificar</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade container" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-12">
                                    <h6></h6>
                                    <button type="button" class="btn btn-outline-secondary">Ver Archivo</button>
                                </div>
                            </div>
                            <form id="curso" enctype="multiform/form-data">
                                <div class="row">
                                    <div class="form-group col-12 col-lg-12 col-xl-12">
                                        <label for="archCursUpda">Ingrese el certificado del curso:</label>
                                        <input type="file" class="form-control-file" id="archCursUpda">
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-outline-success" onclick="modificarCursoArchivo();">Modificar</button>
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