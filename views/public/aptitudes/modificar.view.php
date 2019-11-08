<div class="modal fade bd-example-modal-lg" id="modificarAptitud" tabindex="-1" role="dialog" aria-labelledby="agregarCursoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCursoLabel">Modificar Aptitud</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="codiHabiUsua" id="codiHabiUsua">
                <div class="container">
                    <div class="row">
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="codiHabiUpda">Seleccione la habilidad:</label>
                            <select id="codiHabiUpda" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="codiNiveUpda">Seleccione el nivel:</label>
                            <select id="codiNiveUpda" class="form-control">
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
                <button type="button" class="btn btn-outline-success" onclick="modificarAptitud();">Agregar</button>
            </div>
        </div>
    </div>
</div>