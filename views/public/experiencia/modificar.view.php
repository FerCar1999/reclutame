<div class="modal fade bd-example-modal-lg" id="modificarExperiencia" tabindex="-1" role="dialog" aria-labelledby="agregarCursoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCursoLabel">Modificar Experiencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="codiExpeUsua" id="codiExpeUsua">
                <div class="container">
                    <div class="row">
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="nombCargUpda">Ingrese el cargo que realizo:</label>
                            <input type="text" class="form-control" id="nombCargUpda" placeholder="Ingrese el cargo que realizo">
                        </div>
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="codiEmprUpda">Seleccione la empresa:</label>
                            <select id="codiEmprUpda" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="desdExpeUsuaUpda">Ingrese la fecha de inicio:</label>
                            <input type="text" id="desdExpeUsuaUpda">
                        </div>
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="hastExpeUsuaUpda">Ingrese la fecha de finalizacion:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkUpda">
                                <label class="form-check-label" for="checkUpda">
                                    Actualidad
                                </label>
                            </div>
                            <input type="text" id="hastExpeUsuaUpda">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-success" onclick="modificarExperiencia();">Agregar</button>
            </div>
        </div>
    </div>
</div>