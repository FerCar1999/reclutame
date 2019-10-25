$(document).ready(function () {
    obtenerEmpleos();
});

function obtenerEmpleos() {
    $.ajax({
        type: "POST",
        url: "../app/controllers/EmpleoController",
        data: {
            accion: 'lista'
        },
        dataType: "JSON",
        success: function (data) {
            $("#lista").empty();
            for (let e = 0; e < data.length; e++) {
                $('#lista').append('<li class="collection-item avatar">' +
                    '<img src="../web/img/logos/' + data[e].logo_empr + '" alt="ImagenEmpresa" class="circle responsive-img">' +
                    '<span class="title">' + data[e].nomb_empl + '</span>' +
                    '<p>Empleo: ' + data[e].nomb_empr + '<br>' +
                    data[e].desc_empl +
                    '</p>' +
                    '<a href="#verInformacionEmpleo" class="secondary-content modal-trigger" onclick="obtenerDetalleEmpleo(' + data[e].codi_empl + ');">Ver mas</a>' +
                    '</li>');
            }
        }
    });
}
function buscarOfertas() {
    if ($('#nombFindEmpl').val() === "") {
        obtenerEmpleos();
    } else {
        $.ajax({
            type: "POST",
            url: "../app/controllers/EmpleoController",
            data: {
                accion: 'buscar',
                nombEmpl: '\'%' + $("#nombFindEmpl").val() + '%\''
            },
            dataType: "JSON",
            success: function (data) {
                $("#lista").empty();
                for (let e = 0; e < data.length; e++) {
                    $('#lista').append('<li class="collection-item avatar">' +
                        '<img src="../web/img/logos/' + data[e].logo_empr + '" alt="ImagenEmpresa" class="circle">' +
                        '<span class="title">' + data[e].nomb_empl + '</span>' +
                        '<p>Empleo: ' + data[e].nomb_empr + '<br>' +
                        data[e].desc_empl +
                        '</p>' +
                        '<a href="#verInformacionEmpleo" class="secondary-content modal-trigger" onclick="obtenerDetalleEmpleo(' + data[e].codi_empl + ');">Ver mas</a>' +
                        '</li>');
                }
            }
        });
    }
}
function obtenerDetalleEmpleo(codi) {
    $.ajax({
        type: "POST",
        url: "../app/controllers/EmpleoController",
        data: {
            accion: 'uno',
            codiEmpl: codi
        },
        dataType: "JSON",
        success: function (response) {
            console.log(response.publ_fina_empl)
            $("#imagenEmpresa").attr("src", '../web/img/logos/' + response.logo_empr);
            $("#nombreEmpleo").text(response.nomb_empl);
            //$("#nombreEmpresa").text("Empresa: "+response.nomb_empr);
            $("#fechaFinalizacion").text("Expira: " + response.publ_fina_empl);
            $("#ubicacionEmpleo").text("Ubicacion: " + response.ubic_empl);
            $("#experiencia").text("Nivel de Experiencia: " + response.desc_expe);
            $("#tipoEmpleo").text("Tipo Empleo: " + response.nomb_tipo_empl);
            $("#solicitantes").text("Cantidad de Solicitantes: " + response.cant_soli_empl);
            $("#sueldoInfe").text("Rango de sueldo: $" + response.suel_empl_infe + " - $" + response.suel_empl_supe);
            $("#rangoEdad").text("Rango de edad(anios): " + response.edad_mini + " - " + response.edad_maxi);
            $("#descripcion").text("Descripcion del Empleo: " + response.desc_empl);
        }
    });
}
