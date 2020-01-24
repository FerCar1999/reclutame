$(document).ready(function() {
    //$('#informacion').hide();
    $("#fechEval").datepicker(config);
    $("#fechCursX").datepicker(config);

    llenarSelectInstitucionCurso("InstitucionesController", "codiInstCurs");


    listaRecursos();
});

var config;
var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
config = {
    locale: 'es-es',
    uiLibrary: 'bootstrap4',
    maxDate: today,
    format: 'yyyy-mm-dd'
};


function listaRecursos() {
    $.ajax({
        type: "POST",
        url: "../app/controllers/EmpresaController",
        data: {
            accion: 'recurso'
        },
        dataType: 'JSON',
        success: function(data) {
            $('#listaRecurso').empty();
            $.each(data, function(y, x) {
                $('#listaRecurso').append(
                    '<a onclick="buscarInformacion(' + x.codi_usua + ');">' +
                    '<li class="list-group-item">' +
                    '<div class="row">' +
                    '<div class="col-3">' +
                    '<img src="../web/img/fotos/' + x.foto_usua + '" alt="perfil" class="img-fluid rounded-circle">' +
                    '</div>' +
                    '<div class="col-9 align-self-center">' +
                    '<p>' + x.nomb_usua + ' ' + x.apel_usua + '</p>' +
                    '<h6></h6>' +
                    '<p>' + x.corr_expe + '</p>' +
                    '</div>' +
                    '</div>' +
                    '</li>' +
                    '</a>');
                $('#idUsuario').val(x.codi_expe_usua);
                //$('#idUsuarioR').val(x);
            });
        }
    });
}

function buscarInformacion(x) {
    buscarAsistencia(x);
    buscarEvaluaciones(x);
    buscarCapacitaciones(x);
    buscarAusencias(x);
    //$('#idUsuario').val(data[0].codi_expe_usua);
    $('#idUsuarioR').val(x);
}

function buscarAsistencia(id) {
    $.ajax({
        type: "POST",
        url: "../app/controllers/AsistenciaController",
        data: {
            accion: 'lista',
            correlativo: id
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data.length);

            $('#listaAsistencia').empty();
            switch (data.length) {
                case 0:
                    $('#listaAsistencia').append('<li class="list-group-item">La persona no se ha presentado</li>');
                    break;
                case 1:
                    $('#listaAsistencia').append('<li class="list-group-item">Hora de Entrada: ' + data[0].fech_asis + '</li>');
                    break;
                case 2:
                    $('#listaAsistencia').append('<li class="list-group-item">Hora de Entrada: ' + data[0].fech_asis + '</li>');
                    $('#listaAsistencia').append('<li class="list-group-item">Hora de Salida: ' + data[1].fech_asis + '</li>');
                    break;
            }
        }
    });
}

function buscarAusencias(x) {
    $.ajax({
        type: "POST",
        url: "../app/controllers/AusenciaController",
        data: {
            accion: 'lista',
            codiExpe: x
        },
        dataType: "JSON",
        success: function(data) {
            $('#listaAusencia').empty();
            $.each(data, function(y, x) {
                $('#listaAusencia').append('<li class="list-group-item">Desde: ' + x.fech_inic_ause + ' - Hasta: ' + x.fech_fina_ause + '</li>');
            });
        }
    });
}

function agregarAusencia() {

}

function buscarCapacitaciones(x) {
    $.ajax({
        type: "POST",
        url: "../app/controllers/CursoUsuarioController",
        data: {
            accion: 'lista',
            codiUsua: x
        },
        dataType: "JSON",
        success: function(data) {
            $('#listaCapacitacion').empty();
            $.each(data, function(y, x) {
                $('#listaCapacitacion').append(
                    '<li class="list-group-item">' +
                    '<div class="row">' +
                    '<div class="col-12 align-self-center">' +
                    '<a href="../web/curso/' + x.arch_curs + '" class="btn btn-secondary btn-sm btn-block text-white" role="button" target="_blank">' + x.nomb_curs + '(Realizada el: ' + x.fech_curs + ')</a>' +
                    '</div>' +
                    '</div>' +
                    '</li>'
                );
            });
        }
    });
}

function llenarSelectInstitucionCurso(controller, select) {
    $.ajax({
        type: 'POST',
        url: '../app/controllers/' + controller,
        data: {
            accion: 'lista'
        },
        dataType: 'JSON',
        success: function(data) {
            $("#" + select).empty().append('whatever');
            $("#" + select).append('<option value="0" selected disabled>Seleccione la institucion:</option>');
            for (var i = 0; i < data.length; i++) {
                $("#" + select).append('<option value=' + data[i].codi_inst + '>' + data[i].nomb_inst + '</option>');
            }
        },
        error: function(data) {
            console.log("Error al traer datos");
        }
    });
}

function agregarCapacitacion() {
    var datos = new FormData($("#curso")[0]);
    datos.append('codiUsua', $("#idUsuarioR").val());
    datos.append('nombCurs', $("#nombCurs").val());
    datos.append('codiInst', $("#codiInstCurs").val());
    datos.append('fechCurs', $("#fechCursX").val());
    datos.append('archCurs', $("#archCurs")[0].files[0]);
    datos.append('accion', 'capacitacion');
    $.ajax({
        url: '../app/controllers/CursoUsuarioController',
        type: 'POST',
        processData: false,
        contentType: false,
        data: datos,
        beforeSend: function() {},
        success: function(data) {
            var resp = data.indexOf("Exito");
            if (resp >= 0) {
                Swal.fire({
                    type: 'success',
                    title: 'Registro agregado',
                    text: 'El registro fue agregado con exito'
                });
                $('.agregarCapacitacion').modal('hide');
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: JSON.parse(data)
                });
            }
        },
        error: function() {
            errorAlert("Error al contactar con el servidor");
        }
    });
}

function buscarEvaluaciones(id) {
    $.ajax({
        type: "POST",
        url: "../app/controllers/EvaluacionController",
        data: {
            accion: 'lista',
            codiExpe: id
        },
        dataType: "JSON",
        success: function(data) {
            $('#listaEvaluacion').empty();
            $.each(data, function(y, x) {
                $('#listaEvaluacion').append(
                    '<li class="list-group-item">' +
                    '<div class="row">' +
                    '<div class="col-12 align-self-center">' +
                    '<a href="../web/evaluacion/' + x.docu_eval + '" class="btn btn-secondary btn-sm btn-block text-white" role="button" target="_blank">Evaluacion del ' + x.fech_eval + '</a>' +
                    '</div>' +
                    '</div>' +
                    '</li>'
                );
            });
        }
    });
}

function agregarEvaluacion() {
    var datos = new FormData($("#evaluacion")[0]);
    datos.append('fechEval', $("#fechEval").val());
    datos.append('codiExpe', $("#idUsuario").val());
    datos.append('docuEval', $("#docuEval")[0].files[0]);
    datos.append('accion', 'crear');
    $.ajax({
        url: '../app/controllers/EvaluacionController',
        type: 'POST',
        processData: false,
        contentType: false,
        data: datos,
        beforeSend: function() {},
        success: function(data) {
            var resp = data.indexOf("Exito");
            if (resp >= 0) {
                Swal.fire({
                    type: 'success',
                    title: 'Registro agregado',
                    text: 'El registro fue agregado con exito'
                });
                $('.agregarEvaluacion').modal('hide');
                listaRecursos();
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: JSON.parse(data)
                });
            }
        },
        error: function() {
            errorAlert("Error al contactar con el servidor");
        }
    });
}

function iat() {
    $.ajax({
        type: "POST",
        url: "../app/controllers/AusenciaController",
        data: {
            accion: 'iat',
            codi_usua: $('#idUsuarioR').val()
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data);
        }
    });
}

function iatr() {
    $.ajax({
        type: "POST",
        url: "../app/controllers/AusenciaController",
        data: {
            accion: 'iatr',
            codi_usua: $('#idUsuarioR').val()
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data);
        }
    });
}

function iatnr() {
    $.ajax({
        type: "POST",
        url: "../app/controllers/AusenciaController",
        data: {
            accion: 'iatnr',
            codi_usua: $('#idUsuarioR').val()
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data);
        }
    });
}