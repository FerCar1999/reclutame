$(document).ready(function() {
    $('.collapse').collapse('hide');
    $('.dropdown-toggle').dropdown();
    $('.carousel').carousel();
    $('body').scrollspy({ target: '#navbar-example2' });
});

function cerrarSesion() {
    $.ajax({
        type: 'POST',
        url: '../app/controllers/UsuarioController',
        data: {
            accion: 'logout'
        },
        success: function(data) {
            if (JSON.parse(data) == "Exito") {
                var url = window.location.pathname;
                var urlSplit = url.split("/");
                var ruta = url.replace(urlSplit[urlSplit.length - 1], 'login');
                console.log(ruta)
                if (ruta.indexOf('private')) {
                    var ruta2 = url.replace('private', 'public');
                    window.location.replace(ruta2);
                } else {
                    window.location.replace(ruta);
                }
            } else {
                console.log('Error')
            }
        },
        error: function(data) {}
    });
}