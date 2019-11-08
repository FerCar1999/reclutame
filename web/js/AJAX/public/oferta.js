$(document).ready(function() {
    obtenerMisOfertas()
});

function obtenerMisOfertas() {
    $.ajax({
        type: "POST",
        url: "../app/controllers/EmpleoUsuarioController",
        data: {
            accion: 'miLista'
        },
        dataType: "JSON",
        success: function(data) {
            $('#listaEmpleo').empty();
            for (let e = 0; e < data.length; e++) {
                $('#listaEmpleo').append('<a onclick="obtenerInformacionEmpleo(' + data[e].codi_empl + ');">' +
                    '<li class="list-group-item">' + data[e].nomb_empl + '</li>' +
                    '</a>');
            }
        }
    });
}

function obtenerInformacionEmpleo(codigo) {
    $.ajax({
        type: "POST",
        url: "../app/controllers/EmpleoController",
        data: {
            accion: 'uno',
            codiEmpl: codigo
        },
        dataType: "JSON",
        success: function(data) {
            $('#imagen').empty();
            $('#imagen').append('<img src="../web/img/logos/' + data.logo_empr + '" id="imagenEmpleo" class="img-fluid">');
            $('#titulo').text(data.nomb_empl);
            $('#desc').text(data.desc_empl)
        }
    });
}