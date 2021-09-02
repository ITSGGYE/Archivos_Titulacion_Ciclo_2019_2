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

function limpiarForm() {
    $("#idEspecialista").val('');
    $("#idEspecialidad").val('');
    $("#idHora").val('');
    $("#idobservacion").val('');
    document.getElementById("idEspecialista").disabled = true;
    document.getElementById("guardarCita").disabled = false;
    document.getElementById("fecha").disabled = true;
    document.getElementById("idHora").disabled = true;
    document.getElementById("idobservacion").disabled = true;
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear() + "-" + (month) + "-" + (day);
    $("#fecha").val(today);
}





function validaGuardarCita() {
    console.log("hola");
    var especialidad = $("#idEspecialidad").val();
    var especialista = $("#idEspecialista").val();
    var fecha = $("#fecha").val();
    var hora = $("#idHora").val();

    if (especialidad == "") {
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
    } else if (fecha === hoy) {
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

/* function guardarCitaUser() {

    var paciente = $("#idpaciente").val();
    var nombrepaciente = $("#idnombre").val();
    var especialidad = $("#idEspecialidad").val();
    var especialista = $("#idEspecialista").val();
    var fecha = $("#fecha").val();
    var hora = $("#idHora").val();
    var estado = $("#idestado").val();
    var motivo = $("#idobservacion").val();
    $.ajax({

        contentType: "application/json; charset=utf-8",
        url: 'php/select_especialidaad.php?dato=' + 4 + "&paciente=" + paciente + '&nombrepaciente=' + nombrepaciente + '&especialidad=' + especialidad + '&especialista=' + especialista + '&fecha=' + fecha + '&hora=' + hora + '&estado=' + estado + '&motivo=' + motivo,
        type: 'post',
        success: function(data) {
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
} */

function guardarCitaUser() {

    var paciente = $("#idpaciente").val();
    var nombrepaciente = $("#idnombre").val();
    var especialidad = $("#idEspecialidad").val();
    var especialista = $("#idEspecialista").val();
    var fecha = $("#fecha").val();
    var hora = $("#idHora").val();
    var estado = $("#idestado").val();
    var motivo = $("#idobservacion").val();
    /*   console.log(paciente, nombrepaciente, especialidad, especialista, fecha, hora, estado, motivo); */
    $.ajax({
        type: "POST",
        method: "POST",
        url: "php/guardar_citas.php",
        data: 'paciente=' + paciente + '&nombrepaciente=' + nombrepaciente + '&especialidad=' + especialidad + '&especialista=' + especialista + '&fecha=' + fecha + '&hora=' + hora + '&estado=' + estado + '&motivo=' + motivo,
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
            location.reload();
        }
    });
}

$(document).ready(function() {
    $('#idEspecialidad').on('change', function() {
        var especialidad = $("#idEspecialidad").val();
        console.log(especialidad);
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
                        document.getElementById("idobservacion").disabled = true;
                        document.getElementById("fecha").disabled = true;
                        document.getElementById("idHora").disabled = true;
                        document.getElementById("guardarCita").disabled = true;
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
        document.getElementById("fecha").disabled = false;

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
    $('#idHora').on('change', function() {

        var hora = $("#idHora").val();
        var paciente = $("#idpaciente").val();
        var especialidad = $("#idEspecialidad").val();
        var especialista = $("#idEspecialista").val();
        var fecha = $("#fecha").val();
        document.getElementById("idHora").disabled = false;
        document.getElementById("idobservacion").disabled = false;

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


/*   
$(document).ready(function() {
    $('#fecha').on('change', function() {

        console.log("hola");
              var fecha = $("#fecha").val();
                var x = document.getElementById("fecha");
                var timeStart = new Date(document.getElementById("fecha").value.replace(/-/g, '\/'));
                var moonLanding = new Date(fecha);
                var day = ("0" + timeStart.getDate()).slice(-2);
                var month = ("0" + (timeStart.getMonth() + 1)).slice(-2);
                var today = timeStart.getFullYear() + "-" + (month) + "-" + (day);
                var data = 'aaaa' + "-" + (month) + "-" + (day);
                var prubea = timeStart.getFullYear();
                var t = new Date();
                var dd = t.getDate();
                var mm = t.getMonth() + 1; //January is 0!
                var yyyy = t.getFullYear();
                if (prubea > yyyy) {
                    var date = new Date();
                    $("#fecha").val(date);
                    toastr.error("Año es mayor al año actual");
                    return false;
                }
         */


/*     var timeStart = new Date(document.getElementById("fecha").value.replace(/-/g, '\/'));

            var prubeadd = timeStart.getDate();
            var prubeamm = timeStart.getMonth() + 1;
           
            var today = timeStart.getFullYear() + "-" + (prubeadd) + "-" + (prubeamm);

            var t = new Date();
            var dd = t.getDate();
            var mm = t.getMonth() + 1; //January is 0!
            var yyyy = t.getFullYear();
            var hoy = t.getFullYear() + "-" + (dd) + "-" + (mm);

            console.log(today);
            console.log(hoy);


            if (today < hoy) {
                var date = new Date();
                $("#fecha").val(date);
                toastr.error("Fecha Antigua");
                return false;
            }
    });
}); */