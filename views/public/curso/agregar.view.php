<div class="modal fade bd-example-modal-lg" id="agregarCurso" tabindex="-1" role="dialog" aria-labelledby="agregarCursoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCursoLabel">Agregar Curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="curso" enctype="multiform/form-data">
                        <div class="row">
                            <div class="form-group col-12 col-lg-6 col-xl-6">
                                <label for="nombCurs">Ingrese el nombre del curso:</label>
                                <input type="text" class="form-control" id="nombCurs" placeholder="Ingrese el nombre del curso">
                            </div>
                            <div class="form-group col-12 col-lg-6 col-xl-6">
                                <label for="codiInstCurs">Seleccione la institucion donde lo realizo:</label>
                                <select id="codiInstCurs" class="form-control">
                                </select>
                            </div>
                            <div class="form-group col-12 col-lg-6 col-xl-6">
                                <label for="fechCurs">Ingrese la fecha en que realizo el curso:</label>
                                <input class="datepicker" id="fechCurs">
                            </div>
                            <div class="form-group col-12 col-lg-6 col-xl-6">
                                <label for="archCurs">Ingrese el certificado del curso:</label>
                                <input type="file" class="form-control-file" id="archCurs">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-success" onclick="agregarCurso();">Agregar</button>
            </div>
        </div>
    </div>
</div>