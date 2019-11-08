<div class="modal fade bd-example-modal-lg" id="agregarAptitud" tabindex="-1" role="dialog" aria-labelledby="agregarCursoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCursoLabel">Agregar Aptitud</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="codiHabi">Seleccione la habilidad:</label>
                            <select id="codiHabi" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="codiNive">Seleccione el nivel:</label>
                            <select id="codiNive" class="form-control">
                                <option value="1">Basico</option>
                                <option value="2">Intermedio</option>
                                <option value="3">Avanzado</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-success" onclick="agregarAptitud();">Agregar</button>
            </div>
        </div>
    </div>
</div>