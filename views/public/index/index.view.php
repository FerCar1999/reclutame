<?php include APP_PATH . '/views/templates/head.view.php' ?>
<?php include APP_PATH . '/views/templates/sidebar.view.php' ?>
<div>
    <div class="row">
        <div class="col l1 xl1"></div>
        <div class="col s12 m12 l6 xl6 black-text">
            <div class="row">
                <div class="col s12 center-align">
                    <h5>Buscar ofertas de empleo</h5>
                </div>
                <div class="col s12">
                    <div class="input-field col s12">
                        <input id="nombFindEmpl" name="nombFindEmpl" type="text">
                        <label for="nombFindEmpl">Buscar cargo, habilidad o empresa:</label>
                    </div>
                </div>
                <div class="col s12 center-align">
                    <a href="empleos" class="waves-effect waves-light btn blue-grey white-text">Buscar ofertas</a>
                </div>
            </div>
        </div>
        <div class="col l4 xl4">
            <img width="100%" class="circle vector" src="<?= IMG_PATH ?>vectores/buscar.png" alt="buscar">
        </div>
        <div class="col l1 xl1"></div>
    </div>
    <div class="row blue darken-2">
        <br>
        <div class="col m1 l1 xl1"></div>
        <div class="col s12 m10 l10 xl10">
            <div class="row white">
                <div class="col s12 center-align">
                    <h5>Empresas que tienen nuestra confianza</h5>
                </div>
                <div class="col s12">
                    <div class="row">
                        <div class="carousel">
                            <a class="carousel-item" href="empresa?url=cisco"><img src="../web/img/logos/cisco.png"></a>
                            <a class="carousel-item" href="#two!"><img src="../web/img/logos/cisco.png"></a>
                            <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/250/250/nature/3"></a>
                            <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/250/250/nature/4"></a>
                            <a class="carousel-item" href="#five!"><img src="https://lorempixel.com/250/250/nature/5"></a>
                        </div>
                    </div>
                </div>
                <div class="col s12 center-align">
                    <a href="empresas">Ver todas las empresas -></a>
                </div>
            </div>
        </div>
        <div class="col m1 l1 xl1"></div>
    </div>
</div>
<script src="<?= WEB_PATH ?>js/AJAX/public/index.js"></script>
<?php include APP_PATH . '/views/templates/footer.view.php' ?>