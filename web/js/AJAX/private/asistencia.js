$(document).ready(function() {

});

function tomarAsistencia() {
    $.ajax({
        type: "POST",
        url: "../app/controllers/AsistenciaController",
        data: {
            accion: 'crear',
            correlativo: $('#corrExpe').val()
        },
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
        }
    });
}