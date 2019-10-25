$(document).ready(function () {
    $('.carousel').carousel();
    setInterval(function () {
        $('.carousel').carousel('next');
    }, 4000);
    //Inicializando stepper
    $('.collapsible').collapsible();
    $('.dropdown-trigger').dropdown();
    //inicializando sidenav
    $('.sidenav').sidenav();
    //opcion de cierre de sidenav
    $('.sidenav-close').sidenav('close');
    //inicializando tooltip
    $('.tooltipped').tooltip();
    //inicializando floated button
    $('.fixed-action-btn').floatingActionButton();
    //inicializando modal
    $('.modal').modal();
    //inicializando tabs
    $('.tabs').tabs();
    //inicializando select 2
    $('select').formSelect();
});
function cerrarSesion() {
    $.ajax({
        method: "POST",
        url: "../app/controllers/UsuarioController.php",
        data: {
            accion: "logout"
        },
        success: function (response) {
            console.log(response);
            var url = window.location.pathname;
            var urlSplit = url.split("/");
            var ruta = url.replace(urlSplit.pop(), '');
            window.location.replace(ruta + 'login');
        },
        error: function (param) {
            console.log('Error al contactar al servidor');
        }
    });
}