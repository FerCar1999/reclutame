<?php include APP_PATH . '/views/templates/head.view.php' ?>
<?php include APP_PATH . '/views/templates/sidebar.view.php' ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-4 col-xl-4">
            <h6></h6>
            <div class="card">
                <div class="card-body">
                    <h4>Mis Ofertas</h4>
                    <p>Listado de ofertas</p>
                    <h6></h6>
                    <ul class="list-group" id="listaEmpleo">

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8 col-xl-8">
            <h6></h6>
            <div class="card">
                <div class="card-body">
                    <div id="principal">
                        <div class="row">
                            <div class="col-12">
                                <h4 id="titulo">Candidatos</h4>
                                <h5></h5>
                                <p id="desc">Has click en una de las ofertas para ver la lista de candidatos</p>
                            </div>
                        </div>
                        <h6></h6>
                        <ul class="list-group" id="listaCandidatos">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include APP_PATH . '/views/private/empleo/ver.view.php' ?>
<script src="<?= WEB_PATH ?>js/AJAX/private/empleo.js"></script>
<?php include APP_PATH . '/views/templates/footer.view.php' ?>