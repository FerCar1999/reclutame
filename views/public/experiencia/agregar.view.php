<div class="modal fade bd-example-modal-lg" id="agregarExperiencia" tabindex="-1" role="dialog" aria-labelledby="agregarCursoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCursoLabel">Agregar Experiencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="nombCarg">Ingrese el cargo que realizo:</label>
                            <input type="text" class="form-control" id="nombCarg" placeholder="Ingrese el cargo que realizo">
                        </div>
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="codiEmpr">Seleccione la empresa:</label>
                            <select id="codiEmpr" class="form-control">
                            </select>
                        </div>
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="desdExpeUsua">Ingrese la fecha de inicio:</label>
                            <input type="text" id="desdExpeUsua">
                        </div>
                        <div class="form-group col-12 col-lg-12 col-xl-12">
                            <label for="hastExpeUsua">Ingrese la fecha de finalizacion:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check">
                                <label class="form-check-label" for="check">
                                    Actualidad
                                </label>
                            </div>
                            <input type="text" id="hastExpeUsua">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-success" onclick="agregarExperiencia();">Agregar</button>
            </div>
        </div>
    </div>
</div>