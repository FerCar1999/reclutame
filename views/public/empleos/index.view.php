<?php include APP_PATH . '/views/templates/head.view.php' ?>
<?php include APP_PATH . '/views/templates/sidebar.view.php' ?>
<div>
    <div class="row">
        <div class="col s12 m6 l4 xl4 black-text">
            <div class="row">
                <div class="col s12">
                    <div class="input-field col s12">
                        <input id="nombFindEmpl" name="nombFindEmpl" type="text">
                        <label for="nombFindEmpl">Buscar cargo, habilidad o empresa:</label>
                    </div>
                </div>
                <div class="col s12 center-align">
                    <a class="waves-effect waves-light btn blue-grey white-text" onclick="buscarOfertas();">Buscar ofertas</a>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l8 xl8 black-text">
            <div class="row">
                <div class="col s12">
                    <ul id="lista" class="collection">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APP_PATH . '/views/public/empleos/ver.view.php' ?>
<script src="<?= WEB_PATH ?>js/AJAX/public/empleo.js"></script>
<?php include APP_PATH . '/views/templates/footer.view.php' ?>