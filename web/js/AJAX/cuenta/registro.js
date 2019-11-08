$(document).ready(function() {
    mostrarPersona();
});

function mostrarPersona() {
    $('.persona').show();
    $('.empresa').hide();
}

function mostrarEmpresa() {
    $('.persona').hide();
    $('.empresa').show();
    llenarSelectEspecialidadEmpresa("SectorEmpresaController", "codiSectEmpr");
}

function registrarPersona() {
    var nombre = $("#nombUsua").val();
    var apellido = $("#apelUsua").val();
    var correo = $("#corrUsua").val();
    $.ajax({
        url: '../app/controllers/UsuarioController',
        method: 'POST',
        data: {
            accion: 'crear',
            nombUsua: nombre,
            apelUsua: apellido,
            corrUsua: correo
        },
        success: function(data) {
            var resp = data.indexOf("Exito");
            if (resp >= 0) {
                console.log(resp)
            } else {
                //se obtiene el texto del json del servidor
                var message = JSON.parse(data);

                console.log(message)
            }
        }
    });
}

function registrarEmpresa() {
    var datos = new FormData($("#empresa")[0]);
    datos.append('codiSectEmpr', $("#codiSectEmpr").val());
    datos.append('logoEmpr', $("#logoEmpr")[0].files[0]);
    datos.append('accion', 'crearUsuarioEmpresa');
    $.ajax({
        url: '../app/controllers/EmpresaController',
        type: 'POST',
        processData: false,
        contentType: false,
        data: datos,
        beforeSend: function() {},
        success: function(data) {
            //si la respuesta del servidores mayor o igual a 0
            if (JSON.parse(data) > 0) {
                datos.append('codiEmpr', JSON.parse(data));
                $.ajax({
                    url: '../app/controllers/UsuarioController',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: datos,
                    success: function(data2) {
                        var resp = data2.indexOf("Exito");
                        if (resp >= 0) {
                            console.log(resp)
                        } else {
                            //se obtiene el texto del json del servidor
                            var message = JSON.parse(data);
                            console.log(message)
                        }
                    }
                });
            } else {
                console.log(JSON.parse(data))
            }
        },
        error: function() {
            errorAlert("Error al contactar con el servidor");
        }
    });
}

function llenarSelectEspecialidadEmpresa(controller, select) {
    $.ajax({
        type: 'POST',
        url: '../app/controllers/' + controller,
        data: {
            accion: 'lista'
        },
        dataType: 'JSON',
        success: function(data) {
            $("#" + select).empty().append('whatever');
            $("#" + select).append('<option value="0" selected disabled>Seleccione el sector de la empresa:</option>');
            for (var i = 0; i < data.length; i++) {
                $("#" + select).append('<option value=' + data[i].codi_sect_empr + '>' + data[i].nomb_sect_empr + '</option>');
            }
        },
        error: function(data) {
            console.log("Error al traer datos");
        }
    });
}