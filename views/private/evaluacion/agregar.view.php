<div class="modal fade bd-example-modal-lg agregarEvaluacion" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCursoLabel">Agregar Evaluacion de Desempenio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <form id="evaluacion" enctype="multiform/form-data">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xl-12">
                                <label for="fechEval">Ingrese la fecha en la que se realizo la evaluacion:</label>
                                <input class="datepicker" id="fechEval">
                            </div>
                            <div class="col-12 col-lg-12 col-xl-12">
                                <label for="docuEval">Ingrese el archivo de evaluacion:</label>
                                <input type="file" class="form-control-file" id="docuEval">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-success" onclick="agregarEvaluacion();">Agregar</button>
            </div>
        </div>
    </div>
</div>