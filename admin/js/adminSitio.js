/* formatNumber(params) {
    let locality = 'en-EN';
    params = parseFloat(params).toLocaleString(locality, {
        minimumFractionDigits: 2
    });
    params = params.replace(/[,.]/g, function(m) { return m === ',' ? '.' : ','; });
    return params;
}

FormatDecimalVal(e): boolean {
    let key = (e.which) ? e.which : e.keyCode;
    if (key > 31 && (key < 46 || key > 57)) {
        return false;
    }
    return true;
}

soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    especiales = [8, 37, 39, 46, 6]; 

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        alert('Tecla numerica no aceptada');
        return false;
    }



}


function SoloNumeros(evt) {
    if (window.event) { 
        keynum = evt.keyCode; 
    } else {
        keynum = evt.which; 
    }

    if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6) {

        return true;
    } else {
        alert('Tecla de texto no aceptada');
        return false;
    }
} */

//importamos configuraciones de toastr
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

function limpiarForm() {
    $("#idpaciente").val('');

    $("#idEspecialista").val('');
    $("#idEspecialidad").val('');
    $("#idHora").val('');
    $("#idobservacion").val('');
    document.getElementById("idEspecialista").disabled = true;
    document.getElementById("fecha").disabled = true;
    document.getElementById("idHora").disabled = true;
    document.getElementById("idobservacion").disabled = true;
    document.getElementById("idEspecialidad").disabled = true;
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);
    $("#fecha").val(today);
}


function validaGuardarCita() {
    var paciente = $("#idpaciente").val();
    var especialidad = $("#idEspecialidad").val();
    var especialista = $("#idEspecialista").val();
    var fecha = $("#fecha").val();
    var hora = $("#idHora").val();



    if (paciente == "") {
        let autFocus = $("#idpaciente").focus();
        toastr.error("Seleccione paciente");
    } else if (especialidad == "") {
        let autFocus = $("#idEspecialidad").focus();
        toastr.error("Seleccione la especialidad");
    } else if ((especialidad == "") && especialista == "") {
        let autFocus = $("#idEspecialidad").focus();
        toastr.error("Selecione primero la especilaidad");
    } else if ((especialidad == "") && fecha == "") {
        let autFocus = $("#idEspecialidad").focus();
        toastr.error("Selecione primero la especilaidad");
    } else if (especialista == "") {
        let autFocus = $("#idEspecialista").focus();
        toastr.error("Seleccione especialista");
    } else if (hora == "") {
        let autFocus = $("#idHora").focus();
        toastr.error("Seleccione Hora de cita");
    } else if (fecha == "dd/mm/aaaa") {
        let autFocus = $("#fecha").focus();
        toastr.error("Seleccione Fecha de cita");

    } else if (fecha == "") {
        let autFocus = $("#fecha").focus();
        toastr.error("Seleccione Fecha de cita");

    } else {
        swal({
            title: "Atención!!",
            text: "Seguro desea guardar la cita?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                guardarCitaUser();
            } else {
                swal("Error al Guardar !");
                location.reload();
            }
        });
        return false;
    }

}

function guardarCitaUser() {
    var paciente = $("#idpaciente").val();
    var especialidad = $("#idEspecialidad").val();
    var especialista = $("#idEspecialista").val();
    var fecha = $("#fecha").val();
    var hora = $("#idHora").val();
    var estado = $("#idestado").val();
    var motivo = $("#idobservacion").val();
    /*  console.log(paciente, especialidad, especialista, fecha, hora, estado, motivo); */
    $.ajax({
        type: "POST",
        method: "POST",
        url: "php/guardar_citas.php",
        data: 'paciente=' + paciente + '&especialidad=' + especialidad + '&especialista=' + especialista + '&fecha=' + fecha + '&hora=' + hora + '&estado=' + estado + '&motivo=' + motivo,
        success: function(data) {
            console.log(data);
            swal("Guardada!", "Cita guardada con Éxito", "success");
            setTimeout(function() {
                limpiarForm();
                location.reload();
            }, 700);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Cita", "error");
        }
    });
}

$(document).ready(function() {
    $('#idpaciente').on('change', function() {
        var paciente = $('#idpaciente').val();
        if (paciente == "") {
            document.getElementById("idEspecialidad").disabled = true;
            document.getElementById("idEspecialista").disabled = true;
            document.getElementById("fecha").disabled = true;
            document.getElementById("idHora").disabled = true;
            document.getElementById("idobservacion").disabled = true;
        } else {
            document.getElementById("idEspecialidad").disabled = false;
        }
    });
});


$(document).ready(function() {
    $('#idEspecialidad').on('change', function() {
        var especialidad = $('#idEspecialidad').val();
        /*       if (especialidad == "" || especialidad == undefined || especialidad == "Seleccione Especialidad") {
                  document.getElementById("idEspecialista").disabled = true;
                  document.getElementById("fecha").disabled = true;
                  document.getElementById("idHora").disabled = true;
                  document.getElementById("idobservacion").disabled = true;
                  document.getElementById("idEspecialidad").disabled = true;
              } else {
                  document.getElementById("idEspecialidad").disabled = false;
                  document.getElementById("idEspecialista").disabled = false;
                  document.getElementById("fecha").disabled = true;
                  document.getElementById("idHora").disabled = true;
                  document.getElementById("idobservacion").disabled = true;
              } */

        $.ajax({
            type: "POST",
            method: "POST",
            dataType: 'JSON',
            url: 'php/select_especialidaad.php?dato=' + 1,
            data: 'especialidad=' + especialidad,
            success: function(data) {
                console.log(data);
                if (data) {
                    var especialista = $("#idEspecialista");

                    especialista.find('option').remove();
                    especialista.append('<option value=""></option>');
                    $(data).each(function(i, v) {
                        especialista.append('<option value="' + v.id_especialista + '">' + v.nombre_doctor + '</option>');
                    });

                    var especialidad = $('#idEspecialidad').val();
                    if (data.length == 0) {
                        toastr.error("No existe este Especialista para esta Especialidad ");
                        document.getElementById("idEspecialista").disabled = true;
                    } else {
                        document.getElementById("idEspecialista").disabled = false;
                    }

                } else {
                    var especialist = $("#idEspecialista");
                    var especiali = $('#idEspecialidad');
                    $('#idEspecialista').val('');
                    $('#idEspecialidad').val('');
                    especiali.find('option').remove();
                    especialist.find('option').remove();
                    let autFocus = $("#idEspecialista").focus();
                }
            },
        });
    });

});


$(document).ready(function() {
    $('#idEspecialista').on('change', function() {
        var paciente = $("#idpaciente").val();
        var especialidad = $("#idEspecialidad").val();
        var especialista = $("#idEspecialista").val();

        if (especialista == "" || especialista == undefined) {
            document.getElementById("fecha").disabled = true;
            document.getElementById("idHora").disabled = true;
            document.getElementById("idHora").disabled = true;
            document.getElementById("idobservacion").disabled = true;
        }
        $.ajax({
            contentType: "application/json; charset=utf-8",
            url: 'php/select_especialidaad.php?dato=' + 2 + "&Dpaciente=" + paciente + "&Despecialidad=" + especialidad + "&Despecialista=" + especialista,
            type: 'post',
            success: function(data) {
                var citaData = JSON.parse(data);
                if (citaData.length > 0) {

                    document.getElementById("guardarCita").disabled = true;
                    document.getElementById("fecha").disabled = true;
                    document.getElementById("idHora").disabled = true;
                    document.getElementById("idobservacion").disabled = true;
                    toastr.error("Cita ya registrada en esta Especialidad, Cancele la cita y registre la nueva");
                } else {
                    document.getElementById("guardarCita").disabled = false;
                    document.getElementById("fecha").disabled = false;
                    document.getElementById("idHora").disabled = false;
                    document.getElementById("idobservacion").disabled = false;
                }
            }
        });
    });
});

$(document).ready(function() {
    $('#fecha').on('change', function() {
        document.getElementById("idHora").disabled = false;
    });
});

$(document).ready(function() {
    $('#idHora').on('change', function() {
        document.getElementById("idobservacion").disabled = false;
        var hora = $("#idHora").val();
        var paciente = $("#idpaciente").val();
        var especialidad = $("#idEspecialidad").val();
        var especialista = $("#idEspecialista").val();
        var fecha = $("#fecha").val();
        $.ajax({
            contentType: "application/json; charset=utf-8",
            url: 'php/select_especialidaad.php?dato=' + 3 + "&Cpaciente=" + paciente + "&Cespecialidad=" + especialidad + "&Cespecialista=" + especialista + '&Cfecha=' + fecha + '&Chora=' + hora,
            type: 'post',
            success: function(data) {
                var citaData = JSON.parse(data);
                if (citaData.length == 0) {
                    document.getElementById("guardarCita").disabled = false;
                    //    toastr.success("Enhorabuena!, Cita Disponible");
                    swal("Cita Disponible", "Enhorabuena!", "success");
                } else {
                    var id_paciente = citaData[0].id_paciente;
                    var id_especialidad = citaData[0].id_especialidad;
                    var id_especialista = citaData[0].id_especialista;
                    var fechad = citaData[0].fecha;
                    var horad = citaData[0].hora;
                    var doctor = citaData[0].nombre_doctor;
                    var especialidadDoctor = citaData[0].nombre_especialidad;
                    if (id_paciente == paciente && horad == hora && fechad == fecha && id_especialidad == especialidad && id_especialista == especialista) {

                        document.getElementById("guardarCita").disabled = true;
                        // toastr.error(" Oh no!, Fecha y Hora Ya Registrada para este Paciente");
                        swal("Oh no!", "Cita ya Disponible", "error");

                    } else if (id_paciente !== paciente && horad == hora && fechad == fecha && id_especialidad == especialidad && id_especialista == especialista) {

                        document.getElementById("guardarCita").disabled = true;
                        //  toastr.error(" Oh no!, Cita no Disponible con este doctor para esta Fecha y hora  ");
                        swal("Oh no!", "Cita No Disponible con este doctor para esta Fecha y hora", "error");
                    }
                }
            }
        });
    });
});





//////Cancelar Cita

$('.deletebtn').on('click', function() {
    $tr = $(this).closest('tr');
    var datos = $tr.children("td").map(function() {
        return $(this).text();
    });
    $('#delete_id').val(datos[0]);
    id = datos[0];
    swal({
        title: "Atención!!",
        text: "Seguro desea eliminar la cita?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((result) => {
        if (result) {
            deleteCita();
        } else {
            swal("Error al Guardar !");
            location.reload();
        }
    });

});

//Modificar Cita
$('.editCita').on('click', function() {
    $tr = $(this).closest('tr');
    var dt = $tr.children("td").map(function() {
        return $(this).text();

    });
    limpiarFormedit();
    $('#IDCita').val(dt[0]);
    $('#IDPaciente').val(dt[1]);
    $('#IDEspecialidad').val(dt[2]);
    $('#IDEspecialista').val(dt[3]);

    $('#nombrePaciente').val(dt[4]);
    $('#nombreEspecilidad').val(dt[5]);
    $('#nombreEspecialista').val(dt[6]);
    $('#IDfecha').val(dt[7]);
    $('#IDHora').val(dt[8]);
    $('#IDEstado').val(dt[9]);
    $('#IDObservacion').val(dt[10]);
    var hora = dt[8];


    $('#IDHora').append('<option value="' + hora + '">' + hora + '</option>');
    var especialidad = $('#IDEspecialidad').val();

    $.ajax({
        type: "POST",
        method: "POST",
        dataType: 'JSON',
        url: 'php/select_especialidaad.php?dato=' + 1,
        data: 'especialidad=' + especialidad,
        success: function(data) {
            if (data) {
                var especialista = $("#IDEspecialista");
                especialista.find('option').remove();
                var especialistaName = dt[6];
                var especialistaId = dt[3];
                $('#IDEspecialista').append('<option value="' + especialistaId + '">' + especialistaName + '</option>');
                $(data).each(function(i, v) {
                    if (v.id_especialista !== especialistaId) {
                        especialista.append('<option value="' + v.id_especialista + '">' + v.nombre_doctor + '</option>');
                    }

                });

            }

        },
    });

});

$(document).ready(function() {
    $('#IDEspecialidad').on('change', function() {
        var especialidad = $('#IDEspecialidad').val();
        $.ajax({
            type: "POST",
            method: "POST",
            dataType: 'JSON',
            url: 'php/select_especialidaad.php?dato=' + 1,
            data: 'especialidad=' + especialidad,
            success: function(data) {
                if (data) {
                    var especialista = $("#IDEspecialista");
                    especialista.find('option').remove();
                    especialista.append('<option value="">Selecione Especialista</option>');
                    $(data).each(function(i, v) {
                        especialista.append('<option value="' + v.id_especialista + '">' + v.nombre_doctor + '</option>');
                    });

                    var especialidad = $('#IDEspecialidad').val();
                    if (data.length == 0) {
                        toastr.error("No existe este Especialista para esta Especialidad ");
                        document.getElementById("IDEspecialista").disabled = true;
                        document.getElementById("IDfecha").disabled = true;
                        document.getElementById("IDEstado").disabled = true;
                        document.getElementById("IDHora").disabled = true;
                        document.getElementById("IDObservacion").disabled = true;
                        $("#IDHora").val('');
                        var now = new Date();
                        $("#IDEstado").val('');
                        $("#IDObservacion").val('');
                        $("#IDfecha").val(now);
                    } else {
                        document.getElementById("IDEspecialista").disabled = false;
                        $("#IDHora").val('');
                        var now = new Date();
                        $("#IDEstado").val('');
                        $("#IDObservacion").val('');
                        $("#IDfecha").val(now);
                    }

                } else {
                    var especialist = $("#IDEspecialista");
                    var especiali = $('#IDEspecialidad');
                    $('#IDEspecialista').val('');
                    $('#IDEspecialidad').val('');
                    especiali.find('option').remove();
                    especialist.find('option').remove();
                    let autFocus = $("#IDEspecialista").focus();
                }
            },
        });
    });

});



$(document).ready(function() {
    $('#IDEspecialista').on('change', function() {
        var paciente = $("#IDPaciente").val();
        var especialidad = $("#IDEspecialidad").val();
        var especialista = $("#IDEspecialista").val();

        if (especialista == "" || especialista == undefined) {
            document.getElementById("IDfecha").disabled = true;
            document.getElementById("IDHora").disabled = true;
            document.getElementById("IDObservacion").disabled = true;
        }

        /*       $.ajax({
                  contentType: "application/json; charset=utf-8",
                  url: 'php/select_especialidaad.php?dato=' + 2 + "&Dpaciente=" + paciente + "&Despecialidad=" + especialidad + "&Despecialista=" + especialista,
                  type: 'post',
                  success: function(data) {
                      var citaData = JSON.parse(data);
                      if (citaData.length > 0) {

                          document.getElementById("idActualizar").disabled = true;
                          document.getElementById("IDfecha").disabled = true;
                          document.getElementById("IDHora").disabled = true;
                          document.getElementById("IDObservacion").disabled = true;
                          toastr.error("Cita ya registrada en esta Especialidad, Cancele la cita y registre la nueva");
                      } else {
                          document.getElementById("idActualizar").disabled = false;
                          document.getElementById("IDfecha").disabled = false;
                          document.getElementById("IDHora").disabled = false;
                          document.getElementById("IDObservacion").disabled = false;
                      }
                  }
              }); */
    });
});

$(document).ready(function() {
    $('#IDfecha').on('change', function() {
        document.getElementById("IDHora").disabled = false;
    });
});

$(document).ready(function() {
    $('#IDHora').on('change', function() {
        document.getElementById("IDObservacion").disabled = false;
        var hora = $("#IDHora").val();
        var paciente = $("#IDPaciente").val();
        var especialidad = $("#IDEspecialidad").val();
        var especialista = $("#IDEspecialista").val();
        var fecha = $("#IDfecha").val();
        $.ajax({
            contentType: "application/json; charset=utf-8",
            url: 'php/select_especialidaad.php?dato=' + 3 + "&Cpaciente=" + paciente + "&Cespecialidad=" + especialidad + "&Cespecialista=" + especialista + '&Cfecha=' + fecha + '&Chora=' + hora,
            type: 'post',
            success: function(data) {
                var citaData = JSON.parse(data);
                if (citaData.length == 0) {
                    document.getElementById("idActualizar").disabled = false;
                    //    toastr.success("Enhorabuena!, Cita Disponible");
                    swal("Cita Disponible", "Enhorabuena!", "success");
                } else {
                    var id_paciente = citaData[0].id_paciente;
                    var id_especialidad = citaData[0].id_especialidad;
                    var id_especialista = citaData[0].id_especialista;
                    var fechad = citaData[0].fecha;
                    var horad = citaData[0].hora;
                    var doctor = citaData[0].nombre_doctor;
                    var especialidadDoctor = citaData[0].nombre_especialidad;
                    if (id_paciente == paciente && horad == hora && fechad == fecha && id_especialidad == especialidad && id_especialista == especialista) {

                        document.getElementById("idActualizar").disabled = true;
                        // toastr.error(" Oh no!, Fecha y Hora Ya Registrada para este Paciente");
                        swal("Oh no!", "Cita ya Disponible", "error");


                    } else if (id_paciente !== paciente && horad == hora && fechad == fecha && id_especialidad == especialidad && id_especialista == especialista) {

                        document.getElementById("idActualizar").disabled = true;
                        //  toastr.error(" Oh no!, Cita no Disponible con este doctor para esta Fecha y hora  ");
                        swal("Oh no!", "Cita No Disponible con este doctor para esta Fecha y hora", "error");
                    }
                }
            }
        });
    });
});

function validaEditarCita() {
    /* var paciente = $("#IDPaciente").val(); */
    var especialidad = $("#IDEspecialidad").val();
    var especialista = $("#IDEspecialista").val();
    var fecha = $("#IDfecha").val();
    var hora = $("#IDHora").val();
    var estado = $("#IDEstado").val();

    var now = new Date();
    /*  if (paciente == "") {
         let autFocus = $("#IDPaciente").focus();
         toastr.error("Seleccione Paciente");
     } else */
    if (especialidad == "") {
        let autFocus = $("#IDEspecialidad").focus();
        toastr.error("Seleccione la Especialidad");
    } else if (especialista == "") {
        let autFocus = $("#IDEspecialista").focus();
        toastr.error("Seleccione la Especialista");
    } else if (especialidad == "" && especialista == "") {
        let autFocus = $("#IDEspecialista").focus();
        toastr.error("Seleccione la Especialista");
    } else if (fecha == now) {
        let autFocus = $("#IDfecha").focus();
        toastr.error("Ingrese Fecha de Cita");
    } else if (hora == "") {
        let autFocus = $("#IDHora").focus();
        toastr.error("Seleccione Hora");
    } else if (estado == "") {
        let autFocus = $("#IDEstado").focus();
        toastr.error("Seleccione Estado");
    } else {
        swal({
            title: "Atención!!",
            text: "Seguro desea guardar la cita?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                editarCitaUser();
            } else {
                swal("Error al Guardar !");
                location.reload();
            }
        });
        return false;
    }

}

function editarCitaUser() {
    var id = $("#IDCita").val();
    var paciente = $("#IDPaciente").val();
    var especialidad = $("#IDEspecialidad").val();
    var especialista = $("#IDEspecialista").val();
    var fecha = $("#IDfecha").val();
    var hora = $("#IDHora").val();
    var estado = $("#IDEstado").val();
    var motivo = $("#IDObservacion").val();
    /*  console.log(paciente, especialidad, especialista, fecha, hora, estado, motivo); */
    $.ajax({
        type: "POST",
        method: "POST",
        url: "php/editar_citas.php",
        data: 'idCita=' + id + '&paciente=' + paciente + '&especialidad=' + especialidad + '&especialista=' + especialista + '&fecha=' + fecha + '&hora=' + hora + '&estado=' + estado + '&motivo=' + motivo,
        success: function(data) {
            console.log(data);
            swal("Editada!", "Cita editada con Éxito", "success");
            setTimeout(function() {
                limpiarForm();
                location.reload();
            }, 700);
        },
        error: function(error) {
            swal("Guardada!", "Error al Guardar Cita", "error");
            location.reload();
        }
    });
}

function deleteCita() {
    var estado = 'cancelado';
    $.ajax({

        contentType: "application/json; charset=utf-8",
        url: 'php/select_especialidaad.php?dato=' + 5 + "&id=" + id + "&estado=" + estado,
        type: 'post',
        success: function(data) {
            swal("Eliminar!", "Cita Eliminada con Éxito", "success");
            setTimeout(function() {
                location.reload();
            }, 500);
        },
        error: function(error) {
            swal("Eliminar!", "Error al Eliminar Cita", "error");
            location.reload();
        }
    });
}

function limpiarFormedit() {

    document.getElementById("nombrePaciente").disabled = true;
    document.getElementById("IDEspecialidad").disabled = false;
    document.getElementById("IDEspecialista").disabled = false;
    document.getElementById("IDHora").disabled = false;
    document.getElementById("IDfecha").disabled = false;
    document.getElementById("IDEstado").disabled = false;
    document.getElementById("IDObservacion").disabled = false;
    document.getElementById("IDfecha").disabled = false;

}