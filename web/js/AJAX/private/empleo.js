$(document).ready(function () {
    obtenerEmpleos();
});

function obtenerEmpleos() {
    $.ajax({
        type: "POST",
        url: "../app/controllers/EmpleoController",
        data: {
            accion: 'listaM'
        },
        dataType: "JSON",
        success: function (data) {
            $('#lista').empty()
            for (let e = 0; e < data.length; e++) {
                $('#lista').append('<li class="collection-item avatar">'+
                '<img src="../web/img/logos/'+data[e].logo_empr+'" alt="ImagenEmpresa" class="circle">'+
                '<span class="title">'+data[e].nomb_empl+'</span>'+
                '<p>Empleo: '+data[e].nomb_empr+'<br>'+
                data[e].desc_empl+
                '</p>'+
                '<a href="#verInformacionEmpleo" class="secondary-content modal-trigger" onclick="obtenerDetalleEmpleo('+data[e].codi_empl+');">Ver mas</a>'+
                '</li>');
            }
        }
    });
}
function obtenerDetalleEmpleo(codi) {
    $.ajax({
        type: "POST",
        url: "../app/controllers/EmpleoUsuarioController",
        data: {
            accion: 'lista',
            codiEmpl: codi
        },
        dataType: "JSON",
        success: function (data) {
            $('#lista2').empty()
            for (let e = 0; e < data.length; e++) {
                $('#lista2').append('<li class="collection-item avatar">'+
                '<img src="../web/img/fotos/'+data[e].foto_usua+'" alt="ImagenUsua" class="circle">'+
                '<span class="title">'+data[e].nomb_usua+' '+ data[e].apel_usua+'</span>'+
                '<a href="#verInformacionEmpleo" class="secondary-content modal-trigger" onclick="obtenerDetalleEmpleo('+data[e].codi_empl+');">Ver mas</a>'+
                '</li>');
            }
        }
    });
}