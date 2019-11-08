<div class="modal fade bd-example-modal-lg" id="modificarIdioma" tabindex="-1" role="dialog" aria-labelledby="agregarCursoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCursoLabel">Modificar Idioma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="codiIdioUsua" id="codiIdioUsua">
                <div class="container">
                    <div class="row">
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="codiIdioUpda">Seleccione el idioma:</label>
                            <select id="codiIdioUpda" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="codiNiveIdioUpda">Seleccione el nivel:</label>
                            <select id="codiNiveIdioUpda" class="form-control">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-success" onclick="modificarIdioma();">Agregar</button>
            </div>
        </div>
    </div>
</div>