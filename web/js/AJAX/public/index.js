$(document).ready(function() {
    obtenerEmpresas();
});

function obtenerEmpresas() {
    $.ajax({
        type: "POST",
        url: "../app/controllers/EmpleoController",
        data: {
            accion: 'lista'
        },
        dataType: "JSON",
        success: function(data) {
            $('#lista').empty();
            for (let e = 0; e < data.length; e++) {
                $('#lista').append(
                    '<a data-toggle="modal" data-target=".bd-example-modal-xl" onclick="obtenerInformacionEmpleo(' + data[e].codi_empl + ');">' +
                    '<div class="card">' +
                    '<div class="card-body">' +
                    '<div class="row">' +
                    '<div class="col-2">' +
                    '<img src="../web/img/logos/' + data[e].logo_empr + '" alt="imagenEmp" class="img-fluid imagenOferta">' +
                    '</div>' +
                    '<div class="col-10">' +
                    '<div class="row">' +
                    '<div class="col-12">' +
                    '<h5 class="font-weight-bold titulo">' + data[e].nomb_empl + '</h5>' +
                    '</div>' +
                    '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
                    '<p>' + data[e].nomb_empr + '</p>' +
                    '</div>' +
                    '<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">' +
                    '<p class="font-weight-light">' + data[e].ubic_empl + '</p>' +
                    '</div>' +
                    '<div class="col-12">' +
                    '<p class="text-truncate">' + data[e].desc_empl + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
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
            $('#codiEmpl').val(data.codi_empl);
            $('#imagenEmpresa').prop('src', '../web/img/logos/' + data.logo_empr);
            $('#oferta').text(data.nomb_empl);
            $('#urlEmpresa').prop('href', 'empresa?url=adsonoasndas');
            $('#empresa').text(data.nomb_empr);
            $('#fechaPublicado').text('Publicado el: ' + data.publ_inic_empl);
            $('#descripcionPuesto').text(data.desc_empl)
            $('#rangoEdad').text(data.edad_mini + ' años - ' + data.edad_maxi + ' años')
            $('#rangoSalario').text('$' + data.suel_empl_infe + ' - $' + data.suel_empl_supe)
            obtenerContactosEmpleo(data.codi_empl);
            obtenerAptitudesEmpleo(data.codi_empl);
            obtenerIdiomasEmpleo(data.codi_empl);
        }
    });
}

function obtenerContactosEmpleo(codi) {
    $.ajax({
        type: "POST",
        url: "../app/controllers/ContactoEmpleoController",
        data: {
            accion: 'lista',
            codiEmpl: codi
        },
        dataType: "JSON",
        success: function(data) {
            $('#listaContacto').empty();
            if (data.length > 0) {
                for (let e = 0; e < data.length; e++) {
                    $('#listaContacto').append(
                        '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                        '<div class="row">' +
                        '<div class="col-12">' +
                        data[e].nomb_cont_empl + ' ' + data[e].apel_cont_empl +
                        '</div>' +
                        '<div class="col-12">' +
                        'Correo:' + data[e].corr_cont_empl +
                        '</div>' +
                        '</div>' +
                        '</li>');
                }
            } else {
                $('#listaContacto').append(
                    '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                    '<div class="row">' +
                    '<div class="col-12"> No se encontraron contactos para saber mas de la empresa' +
                    '</div>' +
                    '</div>' +
                    '</li>');
            }
        }
    });
}

function obtenerAptitudesEmpleo(codigo) {
    $.ajax({
        type: "POST",
        url: "../app/controllers/HabilidadEmpleoController",
        data: {
            accion: 'lista',
            codiEmpl: codigo
        },
        dataType: "JSON",
        success: function(data) {
            $('#listaAptitudes').empty();
            for (var e = 0; e < data.length; e++) {
                $('#listaAptitudes').append(
                    ' <li id="aptitud' + data[e].codi_habi + '" class="list-group-item d-flex justify-content-between align-items-center" > ' +
                    data[e].nomb_habi +
                    '</li>');
                verificarEstadoAptitud(data[e].codi_habi);
            }
        }
    });
}

function verificarEstadoAptitud(codi) {
    $.ajax({
        type: "POST",
        url: "../app/controllers/HabilidadEmpleoController",
        data: {
            accion: 'verificarAptitudes',
            codiHabi: codi
        },
        dataType: "JSON",
        success: function(x) {
            console.log(x)
            if (x == 'Si') {
                $('#aptitud' + codi).append('<span class="badge badge-success badge-pill">o</span>');
            } else {
                $('#aptitud' + codi).append('<span class="badge badge-danger badge-pill">o</span>');
            }

        }
    });
}

function obtenerIdiomasEmpleo(codigo) {
    $.ajax({
        type: "POST",
        url: "../app/controllers/IdiomaEmpleoController",
        data: {
            accion: 'lista',
            codiEmpl: codigo
        },
        dataType: "JSON",
        success: function(data) {
            $('#listaIdiomas').empty();
            for (var e = 0; e < data.length; e++) {
                $('#listaIdiomas').append(
                    ' <li id="idioma' + data[e].codi_idio + '" class="list-group-item d-flex justify-content-between align-items-center" > ' +
                    data[e].nomb_idio +
                    '</li>');
                verificarEstadoIdioma(data[e].codi_idio);
            }
        }
    });
}

function verificarEstadoIdioma(codi) {
    $.ajax({
        type: "POST",
        url: "../app/controllers/IdiomaEmpleoController",
        data: {
            accion: 'verificarIdiomas',
            codiIdio: codi
        },
        dataType: "JSON",
        success: function(x) {
            if (x == 'Si') {
                $('#idioma' + codi).append('<span class="badge badge-success badge-pill">o</span>');
            } else {
                $('#idioma' + codi).append('<span class="badge badge-danger badge-pill"></span>');
            }

        }
    });
}

function aplicarOferta() {
    var empleo = $('#codiEmpl').val();
    $.ajax({
        type: "POST",
        url: "../app/controllers/EmpleoUsuarioController",
        data: {
            accion: 'crear',
            codiEmpl: empleo
        },
        success: function(data) {
            var resp = data.indexOf("Exito");
            if (resp >= 0) {
                Swal.fire({
                    type: 'success',
                    title: 'Agregado a lista de candidatos',
                    text: 'El proceso puede ser tardado, pero puedes verlo en el apartado de mis ofertas'
                });
                obteniendoInformacion();
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: JSON.parse(data)
                });
            }
        }
    });
}