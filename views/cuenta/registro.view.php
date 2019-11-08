<?php include APP_PATH . '/views/templates/head.view.php' ?>
<?php include APP_PATH . '/views/templates/sidebar.view.php' ?>
<div class="row recordar persona">
    <div class="col-lg-2 col-xl-2"></div>
    <div class="col-12 col-lg-8 col-xl-8">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center">Registro</h4>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="nombUsua">Ingresa tu nombre:</label>
                            <input type="text" class="form-control" id="nombUsua" name="nombUsua" placeholder="Ingresar tu nombre">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label for="apelUsua">Ingresa tus apellidos:</label>
                            <input type="text" class="form-control" id="apelUsua" name="apelUsua" placeholder="Ingresar tus apellidos">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="corrUsua">Ingresa tu correo electronico:</label>
                            <input type="text" class="form-control" id="corrUsua" name="corrUsua" placeholder="Ingresar tu correo electronico">
                        </div>
                    </div>
                    <div class="col-12">
                        <a class="btn btn-primary text-white btn-md btn-block" onclick="registrarPersona();">Registrar</A>
                    </div>
                    <div class="col-6">
                        <br>
                        <a class="btn btn-outline-secondary btn-sm btn-block" href="login">Ya tienes una cuenta?</a>
                    </div>
                    <div class="col-6">
                        <br>
                        <button onclick="mostrarEmpresa();" type="button" class="btn btn-outline-primary btn-sm btn-block">Registrate como empresa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-xl-2"></div>
</div>
<div class="row recordar empresa">
    <div class="col-lg-2 col-xl-2"></div>
    <div class="col-12 col-lg-8 col-xl-8">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center">Registro como empresa</h4>
                        <p class="text-center">Con este registro usted podra agregar ofertas de empleo y llevar un control de reclutamiento, seleccion y contratacion mucho mas facil</p>
                    </div>
                </div>
                <form id="empresa" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="nombUsuaEmpr">Ingresa tus nombres:</label>
                                <input type="text" class="form-control" id="nombUsuaEmpr" name="nombUsuaEmpr" placeholder="Ingresar tu nombre">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="apelUsuaEmpr">Ingresa tus apellidos:</label>
                                <input type="text" class="form-control" id="apelbUsuaEmpr" name="apelUsuaEmpr" placeholder="Ingresar tus apellidos">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="nombEmpr">Ingresa el nombre de la empresa:</label>
                                <input type="text" class="form-control" id="nombEmpr" name="nombEmpr" placeholder="Ingresar el nombre de la empresa">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="codiSectEmpr">Seleccione el sector al que pertenece la empresa:</label>
                                <select id="codiSectEmpr" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="logoEmpr">Ingrese el logo de su empresa</label>
                                <input type="file" class="form-control-file" id="logoEmpr">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="corrUsuaEmpr">Ingresa tu correo electronico:</label>
                                <input type="text" class="form-control" id="corrUsuaEmpr" name="corrUsuaEmpr" placeholder="Ingresar tu correo electronico">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12">
                        <button type="button" onclick="registrarEmpresa();" class="btn btn-primary btn-md btn-block">Registrar</button>
                    </div>
                    <div class="col-6">
                        <br>
                        <a class="btn btn-outline-secondary btn-sm btn-block" href="login">Ya tienes una cuenta?</a>
                    </div>
                    <div class="col-6">
                        <br>
                        <button onclick="mostrarPersona();" type="button" class="btn btn-outline-primary btn-sm btn-block">Registrate como persona</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-xl-2"></div>
</div>
<script src="<?= WEB_PATH ?>js/AJAX/cuenta/registro.js"></script>
<?php include APP_PATH . '/views/templates/footer.view.php' ?>