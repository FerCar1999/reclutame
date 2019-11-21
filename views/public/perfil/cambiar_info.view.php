<div class="modal fade bd-example-modal-lg" id="modificarPerfil" tabindex="-1" role="dialog" aria-labelledby="agregarCursoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCursoLabel">Modificar Informacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab-2" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-home" aria-selected="true">Informacion Personal</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-foto" role="tab" aria-controls="nav-profile" aria-selected="false">Cambiar Foto</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-pass" role="tab" aria-controls="nav-profile" aria-selected="false">Cambiar Contrasenia</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active container" id="nav-info" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                <div class="form-group col-12 col-lg-6 col-xl-6">
                                    <label for="nombUsua">Nombre:</label>
                                    <input type="text" class="form-control" id="nombUsua" placeholder="Ingresa tu nombre">
                                </div>
                                <div class="form-group col-12 col-lg-6 col-xl-6">
                                    <label for="apelUsua">Apellido:</label>
                                    <input type="text" class="form-control" id="apelUsua" placeholder="Ingresa tus apellidos">
                                </div>
                                <div class="form-group col-12 col-lg-6 col-xl-6">
                                    <label for="fechNaciUsua">Fecha de Nacimiento:</label>
                                    <input type="text" id="fechNaciUsua">
                                </div>
                                <div class="form-group col-12 col-lg-6 col-xl-6">
                                    <label for="codiEstaCiviUsua">Estado Civil:</label>
                                    <select name="codiEstaCiviUsua" id="codiEstaCiviUsua"  class="form-control"></select>
                                </div>
                                <div class="form-group col-12 col-lg-6 col-xl-6">
                                    <label for="duiUsua">DUI:</label>
                                    <input type="text" class="form-control" id="duiUsua" placeholder="Ingresa tu DUI">
                                </div>
                                <div class="form-group col-12 col-lg-6 col-xl-6">
                                    <label for="nitUsua">NIT:</label>
                                    <input type="text" class="form-control" id="nitUsua" placeholder="Ingresa tu NIT">
                                </div>
                                <div class="form-group col-12 col-lg-12 col-xl-12">
                                    <label for="direUsua">Direccion:</label>
                                    <textarea class="form-control" id="direUsua" rows="3"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-outline-success" onclick="modificarCurso();">Modificar</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade container" id="nav-foto" role="tabpanel" aria-labelledby="nav-profile-tab">
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