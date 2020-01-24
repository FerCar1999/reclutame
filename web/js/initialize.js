$(document).ready(function() {
    $('.select2').select2()
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
                var adonde = ruta.indexOf('private');
                if (adonde >= 0) {
                    var ruta2 = ruta.replace('private', 'public');
                    console.log(ruta2)
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