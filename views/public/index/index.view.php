<?php include APP_PATH . '/views/templates/head.view.php' ?>
<?php include APP_PATH . '/views/templates/sidebar.view.php' ?>
<div class="container">
    <div class="row">
        <div class="col">
            <br>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label for="nombFindEmpl">Busca un empleo:</label>
                                        <input type="text" class="form-control" id="nombFindEmpl" name="nombFindEmpl" placeholder="Programador, contador, abogado...">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label for="ubicFindEmpl">A dónde lo buscas?</label>
                                        <input type="text" class="form-control" id="ubicFindEmpl" name="ubicFindEmpl" placeholder="San Salvador, La Libertad...">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Mas filtros
                                    </a>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Por rango salarial ($)</label>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input type="text" class="form-control" id="salaMiniFindEmpl" name="salaMiniFindEmpl" placeholder="Salario Min..">
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="text" class="form-control" id="salaMaxiFindEmpl" name="salaMaxiFindEmpl" placeholder="Salario Max..">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="idioFindEmpl">Por Idioma</label>
                                                        <select multiple name="idioFindEmpl" id="idioFindEmpl" class="select2-multiple" style="width: 100%;"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <br>
                                    <a class="btn btn-outline-primary btn-lg btn-block" onclick="buscadorEmpleos();">Buscar Empleos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div id="lista">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="empresas">
                <br>
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <h4>Empresas que trabajan con nosotros</h4>
                            </div>
                        </div>
                        <h6></h6>
                        <div class="row text-center" id="listadoEmpresas">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<?php include APP_PATH . '/views/public/empleo/ver.view.php' ?>
<script src="<?= WEB_PATH ?>js/AJAX/public/index.js"></script>
<?php include APP_PATH . '/views/templates/footer.view.php' ?>