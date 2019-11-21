$(document).ready(function() {
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
        success: function(data) {
            $('#listaEmpleo').empty()
            for (let e = 0; e < data.length; e++) {
                $('#listaEmpleo').append('<a onclick="obtenerDetalleEmpleo(' + data[e].codi_empl + ');">' +
                    '<li class="list-group-item">' + data[e].nomb_empl + '</li>' +
                    '</a>');
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
        success: function(data) {
            $('#listaCandidatos').empty()
            for (let e = 0; e < data.length; e++) {
                $('#listaCandidatos').append('<a data-toggle="modal" data-target="#infoCandidato">' +
                    '<li class="list-group-item">' + data[e].nomb_usua + ' ' + data[e].apel_usua + '</li>' +
                    '</a>');
                $('#codiEmplUsuaAct').val(data[e].codi_empl_usua);
                $('#pruebaArchivo').attr('href', '../web/prueba/' + data[e].prue_usua);
                $('#contratoArchivo').attr('href', '../web/contrato/' + data[e].cont_usua);
                $('#reglamentoArchivo').attr('href', '../web/reglamento/' + data[e].regl_usua);
            }
        }
    });
}

function eliminarProceso() {
    var codigo = $('#codiEmplUsuaAct').val();
    var motivo = $('#motivoElim').val();
    $.ajax({
        type: "POST",
        url: "../app/controllers/EmpleoUsuarioController",
        data: {
            accion: 'eliminar',
            codiEmplUsuaDele: codigo,
            motiElim: motivo
        },
        success: function(data) {
            obtenerEmpleos();
        }
    });
}

function agregarPrueba() {
    var datos = new FormData($("#pruebas")[0]);
    datos.append('codiEmplUsua', $('#codiEmplUsuaAct').val())
    datos.append('archPrue', $("#pruebArchUsua")[0].files[0]);
    datos.append('accion', 'agregarPrueba');
    $.ajax({
        url: '../app/controllers/EmpleoUsuarioController',
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
                    title: 'Prueba agregada',
                    text: 'La prueba fue registrada con exito'
                });
                obtenerEmpleos();
            } else {
                console.log(data)
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

function agregarContrato() {
    var datos = new FormData($("#contrato")[0]);
    datos.append('codiEmplUsua', $('#codiEmplUsuaAct').val())
    datos.append('archCont', $("#contratoArchUsua")[0].files[0]);
    datos.append('accion', 'agregarContrato');
    $.ajax({
        url: '../app/controllers/EmpleoUsuarioController',
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
                    title: 'Prueba agregada',
                    text: 'La prueba fue registrada con exito'
                });
                obtenerEmpleos();
            } else {
                console.log(data);
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

function agregarReglamento() {
    var datos = new FormData($("#reglamento")[0]);
    datos.append('codiEmplUsua', $('#codiEmplUsuaAct').val())
    datos.append('archRegl', $("#reglamentoArchUsua")[0].files[0]);
    datos.append('accion', 'agregarReglamento');
    $.ajax({
        url: '../app/controllers/EmpleoUsuarioController',
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
                    title: 'Prueba agregada',
                    text: 'La prueba fue registrada con exito'
                });
                obtenerEmpleos();
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