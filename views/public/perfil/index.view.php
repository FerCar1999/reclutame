<?php include APP_PATH . '/views/templates/head.view.php' ?>
<?php include APP_PATH . '/views/templates/sidebar.view.php' ?>
<?php include APP_PATH . '/views/public/perfil/perfil.view.php' ?>
<?php include APP_PATH . '/views/public/perfil/cambiar_info.view.php' ?>
<?php include APP_PATH . '/views/public/perfil/cambiar_acerca_de.view.php' ?>
<!--MODALES PARA LOS CURSOS-->
<?php include APP_PATH . '/views/public/curso/agregar.view.php' ?>
<?php include APP_PATH . '/views/public/curso/modificar.view.php' ?>
<!--MODALES PARA LOS EXPERIENCIAS LABORALES-->
<?php include APP_PATH . '/views/public/experiencia/agregar.view.php' ?>
<?php include APP_PATH . '/views/public/experiencia/modificar.view.php' ?>
<!--MODALES PARA LOS APTITUDES-->
<?php include APP_PATH . '/views/public/aptitudes/agregar.view.php' ?>
<?php include APP_PATH . '/views/public/aptitudes/modificar.view.php' ?>
<!--MODALES PARA LOS IDIOMAS-->
<?php include APP_PATH . '/views/public/idioma/agregar.view.php' ?>
<?php include APP_PATH . '/views/public/idioma/modificar.view.php' ?>

<script src="<?= WEB_PATH ?>js/AJAX/public/perfil.js"></script>
<?php include APP_PATH . '/views/templates/footer.view.php' ?>