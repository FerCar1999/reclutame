<?php include APP_PATH . '/views/templates/head.view.php' ?>
<?php include APP_PATH . '/views/templates/sidebar.view.php' ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1></h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Ingrese su codigo de empleado</h5>
                    <div class="form-group">
                        <input type="text" class="form-control" id="corrExpe">
                    </div>
                    <a class="btn btn-primary btn-block text-white" onclick="tomarAsistencia();">Tomar Asistencia</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= WEB_PATH ?>js/AJAX/private/asistencia.js"></script>
<?php include APP_PATH . '/views/templates/footer.view.php' ?>