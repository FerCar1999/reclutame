$(document).ready(function() {
    mostrarLogin();
});

function mostrarLogin() {
    $('.login').show();
    $('.recordar').hide();
}

function mostrarRecuperar() {
    $('.login').hide();
    $('.recordar').show();
}

function login() {
    var correo = $("#corrUsua").val();
    var password = $("#passUsua").val();
    $.ajax({
        url: '../app/controllers/UsuarioController',
        method: 'POST',
        data: {
            accion: 'login',
            corrUsua: correo,
            contUsua: password
        },
        success: function(data) {
            if (JSON.parse(data) > 0) {
                switch (JSON.parse(data)) {
                    case '1':
                        var url = window.location.pathname;
                        //quitando el login de la url
                        var ruta = url.replace('login', 'index')
                        var ruta2 = ruta.replace('public', 'private')
                        console.log(ruta2)
                            //enviando al index de la pagina
                        window.location.replace(ruta2);
                        break;
                    case '2':
                        var url = window.location.pathname;
                        //quitando el login de la url
                        var ruta = url.replace('login', 'index')
                            //enviando al index de la pagina
                        window.location.replace(ruta);
                        break;
                    default:
                        break;
                }
            } else {
                //se obtiene el texto del json del servidor
                var message = JSON.parse(data);

                console.log(message)
            }
        }
    });
}