<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <input type="hidden" id="codiEmpl">
            <div class="row modalp">
                <div class="col-2 col-lg-2 col-xl-2">
                    <img id="imagenEmpresa" width="100%">
                </div>
                <div class="col-10 col-lg-10 col-xl-10">
                    <h4 id="oferta"></h4>
                    <a id="urlEmpresa">
                        <h6 id="empresa"></h6>
                    </a>
                    <p id="fechaPublicado"></p>
                </div>
            </div>
            <div class="row container">
                <div class="col-12 col-lg-8 col-xl-8">
                    <div class="row">
                        <div class="col-12">
                            <h5>Descripcion del puesto:</h5>
                            <p id="descripcionPuesto"></p>
                        </div>
                        <div class="col-12">
                            <h5>Rango de edad</h5>
                            <p id="rangoEdad"></p>
                        </div>
                        <div class="col-12">
                            <h5>Rango salarial</h5>
                            <p id="rangoSalario"></p>
                        </div>
                        <div class="col-12">
                            <h5>Contactos de la oferta</h5>
                            <p>Quieres saber mas sobre esta oferta? Contacta con ellos</p>
                            <div class="row">
                                <div class="col">
                                    <ul class="list-group" id="listaContacto">
                                    </ul>
                                </div>
                            </div>
                            <h6></h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-xl-4">
                    <div class="row">
                        <div class="col-12">
                            <h5>Aptitudes Necesarias</h5>
                        </div>
                        <div class="col-12">
                            <ul class="list-group" id="listaAptitudes">

                            </ul>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <h5>Idiomas</h5>
                        </div>
                        <div class="col-12">
                            <ul class="list-group" id="listaIdiomas">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="aplicarOferta();">Aplicar para Oferta</button>
            </div>
        </div>
    </div>
</div>