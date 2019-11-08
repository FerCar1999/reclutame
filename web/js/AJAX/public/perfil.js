$(document).ready(function() {
    obteniendoInformacion();
    //CURSOS
    $('#fechCurs').datepicker(config);
    $("#fechCursUpda").datepicker(config);
    //EXPERIENCIA
    $("#desdExpeUsua").datepicker(config);
    $("#hastExpeUsua").datepicker(config);
    $("#desdExpeUsuaUpda").datepicker(config);
    $("#hastExpeUsuaUpda").datepicker(config);
    //CURSOS
    llenarSelectInstitucionCurso("InstitucionesController", "codiInstCurs");
    llenarSelectInstitucionCurso("InstitucionesController", "codiInstCursUpda");
    //EXPERIENCIA
    llenarSelectEmpresasExperiencia("EmpresaController", 'codiEmpr')
    llenarSelectEmpresasExperiencia("EmpresaController", 'codiEmprUpda');
    //APTITUD
    llenarSelectHabilidadAptitud("HabilidadController", 'codiHabi')
    llenarSelectHabilidadAptitud("HabilidadController", 'codiHabiUpda');
    //IDIOMA
    llenarSelectIdiomaIdioma("IdiomaController", 'codiIdio')
    llenarSelectIdiomaIdioma("IdiomaController", 'codiIdioUpda');
    llenarSelectNiveldioma("NivelController", 'codiNiveIdio');
    llenarSelectNiveldioma("NivelController", 'codiNiveIdioUpda');
});
var config;
var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
config = {
    locale: 'es-es',
    uiLibrary: 'bootstrap4',
    maxDate: today,
    format: 'yyyy-mm-dd'
};

function obteniendoInformacion() {
    $.ajax({
        url: "../app/controllers/UsuarioController",
        type: "POST",
        data: {
            accion: 'infoUsua'
        },
        dataType: "JSON",
        success: function(data) {
            $('#fotoPerfil').attr('src', '../web/img/fotos/' + data.foto_usua);
            $('#nombrePersona').text(data.nomb_usua + ' ' + data.apel_usua);
            $('#descripcionPersona').text(data.corr_usua);
            $('#direccionPersona').text(data.dire_usua);
            $('#acercaDe').text(data.desc_usua);
            obtenerCursos(data.codi_usua);
            obtenerExperienciasLaborales(data.codi_usua);
            obtenerAptitudes(data.codi_usua);
            obtenerIdiomas(data.codi_usua);
        }
    });
}
//CURSOS
function obtenerCursos(codi) {
    $.ajax({
        url: "../app/controllers/CursoUsuarioController",
        type: "POST",
        data: {
            accion: 'lista',
            codiUsua: codi
        },
        dataType: "JSON",
        success: function(data) {
            $('#listaCursos').empty();
            for (let e = 0; e < data.length; e++) {
                $('#listaCursos').append(
                    '<li class="list-group-item">' +
                    '<div class="row">' +
                    '<div class="col-7">' +
                    '<div class="row">' +
                    '<div class="col-12">' + data[e].nomb_curs + '</div>' +
                    '<div class="col-12">' + data[e].nomb_inst + '</div>' +
                    '<div class="col-12">' + data[e].fech_curs + '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-5 align-self-center" id="opciones">' +
                    '<div class="row text-center">' +
                    '<div class="col-6 col-lg-6 col-xl-6">' +
                    '<button onclick="buscarInformacionCurso(' + data[e].codi_curs_usua + ');" type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#modificarCurso">Modificar</button>' +
                    '</div>' +
                    '<div class="col-6 col-lg-6 col-xl-6">' +
                    '<button onclick="eliminarCurso(' + data[e].codi_curs_usua + ');" type="button" class="btn btn-sm btn-outline-danger">Eliminar</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</li>');
            }
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

function agregarCurso() {
    var datos = new FormData($("#curso")[0]);
    datos.append('nombCurs', $("#nombCurs").val());
    datos.append('codiInst', $("#codiInstCurs").val());
    datos.append('fechCurs', $("#fechCurs").val());
    datos.append('archCurs', $("#archCurs")[0].files[0]);
    datos.append('accion', 'crear');
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
                $('#agregarCurso').modal('hide');
                obteniendoInformacion();
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

function modificarCurso() {
    var codigo = $('#codiCursUsuaUpda').val();
    var nombre = $('#nombCursUpda').val();
    var fecha = $('#fechCursUpda').val();
    var institucion = $('#codiInstCursUpda').val();
    $.ajax({
        url: '../app/controllers/CursoUsuarioController',
        type: 'POST',
        data: {
            accion: 'modificar',
            codiCursUsua: codigo,
            nombCurs: nombre,
            fechCurs: fecha,
            codiInst: institucion
        },
        beforeSend: function() {},
        success: function(data) {
            var resp = data.indexOf("Exito");
            if (resp >= 0) {
                Swal.fire({
                    type: 'success',
                    title: 'Registro modificado',
                    text: 'El registro fue modificado con exito'
                });
                $('#modificarCurso').modal('hide');
                obteniendoInformacion();
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

function modificarArchivoCurso() {
    var datos = new FormData($("#cursoModificarArchivo")[0]);
    datos.append('archCurs', $("#archCursUpda")[0].files[0]);
    datos.append('accion', 'modificarArchivo');
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
                    title: 'Registro eliminado',
                    text: 'El registro fue eliminado con exito'
                });
                obteniendoInformacion();
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

function eliminarCurso(codi) {
    Swal.fire({
        title: 'Estas seguro?',
        text: "Una vez realizada la accion no se puede revertir",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "../app/controllers/CursoUsuarioController",
                type: "POST",
                data: {
                    accion: 'eliminar',
                    codiCursUsuaDele: codi
                },
                dataType: "dataType",
                success: function(data) {
                    var resp = data.indexOf("Exito");
                    if (resp >= 0) {
                        Swal.fire({
                            type: 'success',
                            title: 'Registro eliminado',
                            text: 'El registro fue eliminado con exito'
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
    })
}

function buscarInformacionCurso(codigo) {
    $.ajax({
        url: "../app/controllers/CursoUsuarioController",
        type: "POST",
        data: {
            accion: 'uno',
            codiCursUsua: codigo
        },
        dataType: "JSON",
        success: function(data) {
            $("#codiCursUsuaUpda").val(data.codi_curs_usua);
            $("#nombCursUpda").val(data.nomb_curs);
            $("#fechCursUpda").val(data.fech_curs);
            $("#codiInstCursUpda").val(data.codi_inst);
        }
    });
}

//EXPERIENCIAS LABORALES
function obtenerExperienciasLaborales(codi) {
    $.ajax({
        url: "../app/controllers/ExperienciaUsuarioController",
        type: "POST",
        data: {
            accion: 'lista',
            codiUsua: codi
        },
        dataType: "JSON",
        success: function(data) {
            $('#listaExperiencias').empty();
            for (let e = 0; e < data.length; e++) {
                $('#listaExperiencias').append(
                    '<li class="list-group-item">' +
                    '<div class="row align-items-center">' +
                    '<div class="col-2">' +
                    '<img src="../web/img/logos/' + data[e].logo_empr + '" id="fotoPerfil" alt="imagenEmpresa" class="img-fluid">' +
                    '</div>' +
                    '<div class="col-5">' +
                    '<div class="row">' +
                    '<div class="col-12">' + data[e].nomb_carg + '</div>' +
                    '<div class="col-12">' + data[e].nomb_empr + '</div>' +
                    '<div class="col-12">' +
                    '<div class="row">' +
                    '<div class="col-12">' +
                    'Desde: ' + data[e].desd_expe_usua +
                    '</div>' +
                    '<div class="col-12">' +
                    'Hasta: ' + data[e].hast_expe_usua +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-5 align-self-center" id="opciones">' +
                    '<div class="row text-center">' +
                    '<div class="col-6 col-lg-6 col-xl-6">' +
                    '<button onclick="buscarInformacionExperiencia(' + data[e].codi_expe_usua + ');" type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#modificarExperiencia">Modificar</button>' +
                    '</div>' +
                    '<div class="col-6 col-lg-6 col-xl-6">' +
                    '<button onclick="eliminarExperiencia(' + data[e].codi_expe_usua + ');" type="button" class="btn btn-sm btn-outline-danger">Eliminar</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</li>');
            }
        }
    });
}

function llenarSelectEmpresasExperiencia(controller, select) {
    $.ajax({
        type: 'POST',
        url: '../app/controllers/' + controller,
        data: {
            accion: 'lista'
        },
        dataType: 'JSON',
        success: function(data) {
            $("#" + select).empty().append('whatever');
            $("#" + select).append('<option value="0" selected disabled>Seleccione la empresa:</option>');
            for (var i = 0; i < data.length; i++) {
                $("#" + select).append('<option value=' + data[i].codi_empr + '>' + data[i].nomb_empr + '</option>');
            }
        },
        error: function(data) {
            console.log("Error al traer datos");
        }
    });
}

function agregarExperiencia() {
    var nombre = $("#nombCarg").val();
    var empresa = $("#codiEmpr").val();
    var desde = $("#desdExpeUsua").val();
    var hasta;
    if ($('#check').prop('checked')) {
        hasta = 'Actualidad';
    } else {
        hasta = $("#hastExpeUsua").val();
    }
    $.ajax({
        url: '../app/controllers/ExperienciaUsuarioController',
        type: 'POST',
        data: {
            nombCarg: nombre,
            codiEmpr: empresa,
            desdExpeUsua: desde,
            hastExpeUsua: hasta,
            accion: 'crear'
        },
        beforeSend: function() {},
        success: function(data) {
            var resp = data.indexOf("Exito");
            if (resp >= 0) {
                Swal.fire({
                    type: 'success',
                    title: 'Registro agregado',
                    text: 'El registro fue agregado con exito'
                });
                $('#agregarExperiencia').modal('hide');
                obteniendoInformacion();
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

function modificarExperiencia() {
    var codigo = $('#codiExpeUsua').val();
    var nombre = $("#nombCargUpda").val();
    var empresa = $("#codiEmprUpda").val();
    var desde = $("#desdExpeUsuaUpda").val();
    var hasta;
    if ($('#checkUpda').prop('checked')) {
        hasta = 'Actualidad';
    } else {
        hasta = $("#hastExpeUsuaUpda").val();
    }
    $.ajax({
        url: '../app/controllers/ExperienciaUsuarioController',
        type: 'POST',
        data: {
            codiExpeUsua: codigo,
            nombCarg: nombre,
            codiEmpr: empresa,
            desdExpeUsua: desde,
            hastExpeUsua: hasta,
            accion: 'modificar'
        },
        beforeSend: function() {},
        success: function(data) {
            var resp = data.indexOf("Exito");
            if (resp >= 0) {
                Swal.fire({
                    type: 'success',
                    title: 'Registro modificado',
                    text: 'El registro fue modificado con exito'
                });
                $('#modificarExperiencia').modal('hide');
                obteniendoInformacion();
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

function eliminarExperiencia(codi) {
    Swal.fire({
        title: 'Estas seguro?',
        text: "Una vez realizada la accion no se puede revertir",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "../app/controllers/ExperienciaUsuarioController",
                type: "POST",
                data: {
                    accion: 'eliminar',
                    codiExpeUsuaDele: codi
                },
                success: function(data) {
                    var resp = data.indexOf("Exito");
                    if (resp >= 0) {
                        Swal.fire({
                            type: 'success',
                            title: 'Registro eliminado',
                            text: 'El registro fue eliminado con exito'
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
    })
}

function buscarInformacionExperiencia(codigo) {
    $.ajax({
        url: "../app/controllers/ExperienciaUsuarioController",
        type: "POST",
        data: {
            accion: 'uno',
            codiExpeUsua: codigo
        },
        dataType: "JSON",
        success: function(data) {
            $("#codiExpeUsua").val(data.codi_expe_usua);
            $("#nombCargUpda").val(data.nomb_carg);
            $("#desdExpeUsuaUpda").val(data.desd_expe_usua);
            $("#codiEmprUpda").val(data.codi_empr);
            if (data.hast_expe_usua == "Actualidad") {
                $('#checkUpda').prop('checked', true);
            } else {
                $("#hastExpeUsuaUpda").val(data.hast_expe_usua);
            }
        }
    });
}
//APTITUDES
function obtenerAptitudes(codi) {
    var nivel = ["Basico", "Intermedio", "Avanzado"];
    $.ajax({
        url: "../app/controllers/HabilidadUsuarioController",
        type: "POST",
        data: {
            accion: 'lista',
            codiUsua: codi
        },
        dataType: "JSON",
        success: function(data) {
            $('#listaAptitudes').empty();
            for (let e = 0; e < data.length; e++) {
                $('#listaAptitudes').append(
                    '<li class="list-group-item">' +
                    '<div class="row">' +
                    '<div class="col-5">' +
                    '<div class="row">' +
                    '<div class="col-12">' + data[e].nomb_habi + '</div>' +
                    '<div class="col-12">' + nivel[(data[e].codi_nive - 1)] + '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-7 align-self-center" id="opciones">' +
                    '<div class="row text-center">' +
                    '<div class="col-6 col-lg-6 col-xl-6">' +
                    '<button onclick="buscarInformacionAptitud(' + data[e].codi_habi_usua + ');" type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#modificarAptitud">Modificar</button>' +
                    '</div>' +
                    '<div class="col-6 col-lg-6 col-xl-6">' +
                    '<button onclick="eliminarAptitud(' + data[e].codi_habi_usua + ');" type="button" class="btn btn-sm btn-outline-danger">Eliminar</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</li>');
            }
        }
    });
}

function llenarSelectHabilidadAptitud(controller, select) {
    $.ajax({
        type: 'POST',
        url: '../app/controllers/' + controller,
        data: {
            accion: 'lista'
        },
        dataType: 'JSON',
        success: function(data) {
            $("#" + select).empty().append('whatever');
            $("#" + select).append('<option value="0" selected disabled>Seleccione la aptitud:</option>');
            for (var i = 0; i < data.length; i++) {
                $("#" + select).append('<option value=' + data[i].codi_habi + '>' + data[i].nomb_habi + '</option>');
            }
        },
        error: function(data) {
            console.log("Error al traer datos");
        }
    });
}

function agregarAptitud() {
    var habilidad = $("#codiHabi").val();
    var nivel = $("#codiNive").val();
    $.ajax({
        url: '../app/controllers/HabilidadUsuarioController',
        type: 'POST',
        data: {
            codiHabi: habilidad,
            codiNive: nivel,
            accion: 'crear'
        },
        beforeSend: function() {},
        success: function(data) {
            var resp = data.indexOf("Exito");
            if (resp >= 0) {
                Swal.fire({
                    type: 'success',
                    title: 'Registro agregado',
                    text: 'El registro fue agregado con exito'
                });
                $('#agregarAptitud').modal('hide');
                obteniendoInformacion();
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

function modificarAptitud() {
    var codigo = $("#codiHabiUsua").val();
    var habilidad = $("#codiHabiUpda").val();
    var nivel = $("#codiNiveUpda").val();
    $.ajax({
        url: '../app/controllers/HabilidadUsuarioController',
        type: 'POST',
        data: {
            codiHabiUsua: codigo,
            codiHabi: habilidad,
            codiNive: nivel,
            accion: 'modificar'
        },
        beforeSend: function() {},
        success: function(data) {
            var resp = data.indexOf("Exito");
            if (resp >= 0) {
                Swal.fire({
                    type: 'success',
                    title: 'Registro modificado',
                    text: 'El registro fue modificado con exito'
                });
                $('#modificarAptitud').modal('hide');
                obteniendoInformacion();
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

function eliminarAptitud(codi) {
    Swal.fire({
        title: 'Estas seguro?',
        text: "Una vez realizada la accion no se puede revertir",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "../app/controllers/HabilidadUsuarioController",
                type: "POST",
                data: {
                    accion: 'eliminar',
                    codiHabiUsuaDele: codi
                },
                success: function(data) {
                    var resp = data.indexOf("Exito");
                    if (resp >= 0) {
                        Swal.fire({
                            type: 'success',
                            title: 'Registro eliminado',
                            text: 'El registro fue eliminado con exito'
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
    })
}

function buscarInformacionAptitud(codigo) {
    $.ajax({
        url: "../app/controllers/HabilidadUsuarioController",
        type: "POST",
        data: {
            accion: 'uno',
            codiHabiUsua: codigo
        },
        dataType: "JSON",
        success: function(data) {
            $("#codiHabiUsua").val(data.codi_habi_usua);
            $("#codiHabiUpda").val(data.codi_habi);
            $("#codiNiveUpda").val(data.codi_nive);
        }
    });
}
//IDIOMAS
function obtenerIdiomas(codi) {
    $.ajax({
        url: "../app/controllers/IdiomaUsuarioController",
        type: "POST",
        data: {
            accion: 'lista',
            codiUsua: codi
        },
        dataType: "JSON",
        success: function(data) {
            $('#listaIdiomas').empty();
            for (let e = 0; e < data.length; e++) {
                $('#listaIdiomas').append(
                    '<li class="list-group-item">' +
                    '<div class="row">' +
                    '<div class="col-5">' +
                    '<div class="row">' +
                    '<div class="col-12">' + data[e].nomb_idio + '</div>' +
                    '<div class="col-12">' + data[e].nomb_nive_idio + '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-7 align-self-center" id="opciones">' +
                    '<div class="row text-center">' +
                    '<div class="col-6 col-lg-6 col-xl-6">' +
                    '<button onclick="buscarInformacionIdioma(' + data[e].codi_idio_usua + ');" type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#modificarIdioma">Modificar</button>' +
                    '</div>' +
                    '<div class="col-6 col-lg-6 col-xl-6">' +
                    '<button onclick="eliminarIdioma(' + data[e].codi_idio_usua + ');" type="button" class="btn btn-sm btn-outline-danger">Eliminar</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</li>');
            }
        }
    });
}

function llenarSelectIdiomaIdioma(controller, select) {
    $.ajax({
        type: 'POST',
        url: '../app/controllers/' + controller,
        data: {
            accion: 'lista'
        },
        dataType: 'JSON',
        success: function(data) {
            $("#" + select).empty().append('whatever');
            $("#" + select).append('<option value="0" selected disabled>Seleccione el idioma:</option>');
            for (var i = 0; i < data.length; i++) {
                $("#" + select).append('<option value=' + data[i].codi_idio + '>' + data[i].nomb_idio + '</option>');
            }
        },
        error: function(data) {
            console.log("Error al traer datos");
        }
    });
}

function llenarSelectNiveldioma(controller, select) {
    $.ajax({
        type: 'POST',
        url: '../app/controllers/' + controller,
        data: {
            accion: 'lista'
        },
        dataType: 'JSON',
        success: function(data) {
            $("#" + select).empty().append('whatever');
            $("#" + select).append('<option value="0" selected disabled>Seleccione el nivel:</option>');
            for (var i = 0; i < data.length; i++) {
                $("#" + select).append('<option value=' + data[i].codi_nive_idio + '>' + data[i].nomb_nive_idio + '</option>');
            }
        },
        error: function(data) {
            console.log("Error al traer datos");
        }
    });
}

function agregarIdioma() {
    var idioma = $("#codiIdio").val();
    var nivel = $("#codiNiveIdio").val();
    $.ajax({
        url: '../app/controllers/IdiomaUsuarioController',
        type: 'POST',
        data: {
            codiIdio: idioma,
            codiNive: nivel,
            accion: 'crear'
        },
        beforeSend: function() {},
        success: function(data) {
            var resp = data.indexOf("Exito");
            if (resp >= 0) {
                Swal.fire({
                    type: 'success',
                    title: 'Registro agregado',
                    text: 'El registro fue agregado con exito'
                });
                $('#agregarIdioma').modal('hide');
                obteniendoInformacion();
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

function modificarIdioma() {
    var codigo = $("#codiIdioUsua").val();
    var idioma = $("#codiIdioUpda").val();
    var nivel = $("#codiNiveIdioUpda").val();
    $.ajax({
        url: '../app/controllers/IdiomaUsuarioController',
        type: 'POST',
        data: {
            codiIdioUsua: codigo,
            codiIdio: idioma,
            codiNive: nivel,
            accion: 'modificar'
        },
        beforeSend: function() {},
        success: function(data) {
            var resp = data.indexOf("Exito");
            if (resp >= 0) {
                Swal.fire({
                    type: 'success',
                    title: 'Registro modificado',
                    text: 'El registro fue modificado con exito'
                });
                $('#modificarIdioma').modal('hide');
                obteniendoInformacion();
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

function eliminarIdioma(codi) {
    Swal.fire({
        title: 'Estas seguro?',
        text: "Una vez realizada la accion no se puede revertir",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "../app/controllers/IdiomaUsuarioController",
                type: "POST",
                data: {
                    accion: 'eliminar',
                    codiIdioUsuaDele: codi
                },
                success: function(data) {
                    var resp = data.indexOf("Exito");
                    if (resp >= 0) {
                        Swal.fire({
                            type: 'success',
                            title: 'Registro eliminado',
                            text: 'El registro fue eliminado con exito'
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
    })
}

function buscarInformacionIdioma(codigo) {
    $.ajax({
        url: "../app/controllers/IdiomaUsuarioController",
        type: "POST",
        data: {
            accion: 'uno',
            codiIdioUsua: codigo
        },
        dataType: "JSON",
        success: function(data) {
            $("#codiIdioUsua").val(data.codi_idio_usua);
            $("#codiIdioUpda").val(data.codi_idio);
            $("#codiNiveIdioUpda").val(data.codi_nive);
        }
    });
}

//MODIFICAR ACERCA DE
function modificarAcercaDe() {
    var acercaDe = $("#descUsua").val();
    $.ajax({
        url: "../app/controllers/UsuarioController",
        type: "POST",
        data: {
            accion: 'modificarAcercaDe',
            descUsua: acercaDe
        },
        success: function(data) {
            var resp = data.indexOf("Exito");
            if (resp >= 0) {
                Swal.fire({
                    type: 'success',
                    title: 'Descripcion modificada',
                    text: 'La descripcion fue modificada con exito'
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