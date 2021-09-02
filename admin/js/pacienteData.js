//importamos configuraciones de toastr
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};



async function validaGuadrPaciente() {
    console.log(1);
    await this.commonValidate(0).then(resp => {
        if (resp) {
            swal({
                title: "Atención!!",
                text: "Seguro desea guardar Paciente",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                time: 1000,
            }).then((result) => {
                if (result) {
                    setTimeout(function() {
                        guardarPaciente();
                    }, 1000);
                } else {
                    swal("Error al Guardar !");
                    location.reload();
                }
            });

        }
    });
}


function commonValidate(action) {
    var cedula = $("#cedular").val();
    var nombre = $("#nombrer").val();
    var email = $("#emailr").val();
    var contrasena = $("#passr").val();
    var fecha = $("#fechar").val();

    return new Promise((resolve, reject) => {


        if (!validaCedulaGuadr()) {

        } else if (cedula == "") {
            let autFocus = $("#cedular").focus();
            toastr.error("Ingrese Numero de Cedula");
            return false;
        } else if (nombre == "") {
            let autFocus = $("#nombrer").focus();
            toastr.error("Ingrese nombre");
            return false;
        } else if (email == "") {
            let autFocus = $("#emailr").focus();
            toastr.error("Ingrese Correo");
            return false;
        } else if (!validarEmail(email)) {
            let autFocus = $("#emailr").focus();

            this.toastr.error("El correo no es válido !!");
            return false;
        } else if (contrasena == "") {
            let autFocus = $("#passr").focus();
            toastr.error("Ingrese password");
            return false;
        } else if (fecha == "") {
            let autFocus = $("#fechar").focus();
            toastr.error("Seleccione fecha nacimiento");
            return false;
        } else {
            if (action === 0) {
                $.ajax({
                    type: "POST",
                    method: "POST",
                    dataType: 'JSON',
                    url: 'php/select_especialidaad.php?dato=' + 6,
                    data: 'cedula=' + cedula,
                    success: function(data) {

                        if (data.length !== 0) {
                            let autFocus = document.getElementById("cedular").focus();
                            toastr.error("Cedula Exitente");
                            return false;
                        } else {
                            resolve(true);
                        }
                    },
                });
            } else if (action === 1) {
                resolve(true);
            }

        }

    });
}


function validaCedulaGuadr() {
    numero = document.getElementById('cedular').value;
    var residuo = 0;
    var nat = false;
    var numeroProvincias = 24;
    var modulo = 10;

    var ok = 1;
    for (i = 0; i < numero.length && ok == 1; i++) {
        var n = parseInt(numero.charAt(i));
        if (isNaN(n)) ok = 0;
    }
    if (ok == 0) {
        let autFocus = $("#cedular").focus();
        toastr.error("No puede ingresar caracteres");
        return false;
    } else if (numero.length !== 10 && numero.length !== 0) {
        let autFocus = $("#cedular").focus();
        toastr.error("Número de Cedula Incompleto");
        return false;
    } else if (numero == "") {
        let autFocus = $("#cedular").focus();
        toastr.error("Ingrese Número de Cedula");
        return false;
    }

    provincia = numero.substr(0, 2);
    if (provincia < 0 || provincia > numeroProvincias) {
        let autFocus = $("#cedular").focus();
        toastr.error("El código de la Provincia (dos primeros dígitos) es Inválido");
        return false;
    }

    d1 = numero.substr(0, 1);
    d2 = numero.substr(1, 1);
    d3 = numero.substr(2, 1);
    d4 = numero.substr(3, 1);
    d5 = numero.substr(4, 1);
    d6 = numero.substr(5, 1);
    d7 = numero.substr(6, 1);
    d8 = numero.substr(7, 1);
    d9 = numero.substr(8, 1);
    d10 = numero.substr(9, 1);

    if (d3 == 7 || d3 == 8 || d3 == 9 || d3 == 6) {
        let autFocus = $("#cedular").focus();
        toastr.error("Tercer dígito de cedula ingresado es Inválido");
        return false;
    } else if (d3 < 6) {
        nat = true;
        p1 = d1 * 2;
        if (p1 >= 10) p1 -= 9;
        p2 = d2 * 1;
        if (p2 >= 10) p2 -= 9;
        p3 = d3 * 2;
        if (p3 >= 10) p3 -= 9;
        p4 = d4 * 1;
        if (p4 >= 10) p4 -= 9;
        p5 = d5 * 2;
        if (p5 >= 10) p5 -= 9;
        p6 = d6 * 1;
        if (p6 >= 10) p6 -= 9;
        p7 = d7 * 2;
        if (p7 >= 10) p7 -= 9;
        p8 = d8 * 1;
        if (p8 >= 10) p8 -= 9;
        p9 = d9 * 2;
        if (p9 >= 10) p9 -= 9;
        modulo = 10;
    }

    suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;
    residuo = suma % modulo;

    /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
    digitoVerificador = residuo == 0 ? 0 : modulo - residuo;

    if (nat == true) {
        if (digitoVerificador != d10) {
            let autFocus = $("#cedular").focus();
            toastr.error("El Número de cédula no es Válido.");
            return false;
        } else {
            let autFocus = $("#cedular").focus();
            setTimeout(function() {
                toastr.success("El número de cédula es Válido.");
            }, 100);

            return true;
        }
    }
    return true;
}


function guardarPaciente() {
    var cedula = $("#cedular").val();
    var nombre = $("#nombrer").val();
    var email = $("#emailr").val();
    var pass = $("#passr").val();
    var fecha = $("#fechar").val();
    var genero = $("#generor").val();
    /* console.log(cedula, nombre, email, pass, fecha, genero); */
    $.ajax({
        type: "POST",
        method: "POST",
        url: "./registrar_paciente.php",
        data: 'cedula=' + cedula + '&nombre=' + nombre + '&email=' + email + '&pass=' + pass + '&fecha=' + fecha + '&genero=' + genero,
        success: function(data) {

            if (data) {
                swal("Guardar!", "Paciente Guardado con Éxito", "success");
                setTimeout(function() {
                    limpiarForm();
                    location.reload();
                }, 600);
            }

        }
    });
}


$(document).ready(function() {
    $('#fechar').on('change', function() {
        var fecha = $("#fechar").val();
        var x = document.getElementById("fechar");
        var timeStart = new Date(document.getElementById("fechar").value.replace(/-/g, '\/'));
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
            $("#fechar").val(date);
            toastr.error("Año es mayor al año actual");
            return false;
        }

    });
});

$(document).ready(function() {
    $('#fecha').on('change', function() {
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

    });
});


function validarEmail(valor) {
    if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(valor)) {
        return true;
    } else {
        return false;
    }
}



function limpiarForm() {
    $("#cedular").val('');
    $("#nombrer").val('');
    $("#emailr").val('');
    $("#passr").val('');
    $("#fechar").val('');
    $("#generor").val('');

    var now = new Date();
    $("#fecha").val(now);


}




async function validaEditarDatos() {
    await this.commonValidateEditPaciente(0).then(resp => {
        if (resp) {
            swal({
                title: "Atención!!",
                text: "Seguro desea editar Paciente",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    editPaciente();
                } else {
                    swal("Error al Editar !");
                    location.reload();
                }
            });

        }
    });
}


function commonValidateEditPaciente(action) {

    var cedulas = $("#cedula").val();
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var contrasena = $("#passw").val();
    var fecha = $("#fecha").val();
    return new Promise((resolve, reject) => {

        if (!validaCedula()) {

        } else if (cedulas == "") {
            let autFocus = $("#cedula").focus();
            toastr.error("Ingrese Numero de Cedula");
            return false;
        } else if (nombre == "") {
            let autFocus = $("#nombre").focus();
            toastr.error("Ingrese nombre");
            return false;
        } else if (email == "") {
            let autFocus = $("#email").focus();
            toastr.error("Ingrese Correo");
            return false;
        } else if (contrasena == "") {
            let autFocus = $("#passw").focus();
            toastr.error("Ingrese password");
            return false;
        } else if (fecha == "") {
            let autFocus = $("#fecha").focus();
            toastr.error("Seleccione fecha nacimiento");
            return false;
        } else {
            if (action === 0) {
                if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(email)) {
                    resolve(true);
                } else {
                    let autFocus = $("#email").focus();
                    this.toastr.error("El correo no es válido !!");
                    return false;
                }
            } else if (action === 1) {
                resolve(true);
            }
        }
    });

}




function validaCedula() {
    numero = document.getElementById('cedula').value;
    var residuo = 0;
    var nat = false;
    var numeroProvincias = 24;
    var modulo = 10;

    var ok = 1;
    for (i = 0; i < numero.length && ok == 1; i++) {
        var n = parseInt(numero.charAt(i));
        if (isNaN(n)) ok = 0;
    }
    if (ok == 0) {
        let autFocus = $("#cedula").focus();
        toastr.error("No puede ingresar caracteres");
        return false;
    } else if (numero.length !== 10 && numero.length !== 0) {
        let autFocus = $("#cedula").focus();
        toastr.error("Número de Cedula Incompleto");
        return false;
    } else if (numero == "") {
        let autFocus = $("#cedula").focus();
        toastr.error("Ingrese Número de Cedula");
        return false;
    }

    provincia = numero.substr(0, 2);
    if (provincia < 0 || provincia > numeroProvincias) {
        let autFocus = $("#cedula").focus();
        toastr.error("El código de la Provincia (dos primeros dígitos) es Inválido");
        return false;
    }

    d1 = numero.substr(0, 1);
    d2 = numero.substr(1, 1);
    d3 = numero.substr(2, 1);
    d4 = numero.substr(3, 1);
    d5 = numero.substr(4, 1);
    d6 = numero.substr(5, 1);
    d7 = numero.substr(6, 1);
    d8 = numero.substr(7, 1);
    d9 = numero.substr(8, 1);
    d10 = numero.substr(9, 1);

    if (d3 == 7 || d3 == 8 || d3 == 9 || d3 == 6) {
        let autFocus = $("#cedula").focus();
        toastr.error("Tercer dígito de cedula ingresado es Inválido");
        return false;
    } else if (d3 < 6) {
        nat = true;
        p1 = d1 * 2;
        if (p1 >= 10) p1 -= 9;
        p2 = d2 * 1;
        if (p2 >= 10) p2 -= 9;
        p3 = d3 * 2;
        if (p3 >= 10) p3 -= 9;
        p4 = d4 * 1;
        if (p4 >= 10) p4 -= 9;
        p5 = d5 * 2;
        if (p5 >= 10) p5 -= 9;
        p6 = d6 * 1;
        if (p6 >= 10) p6 -= 9;
        p7 = d7 * 2;
        if (p7 >= 10) p7 -= 9;
        p8 = d8 * 1;
        if (p8 >= 10) p8 -= 9;
        p9 = d9 * 2;
        if (p9 >= 10) p9 -= 9;
        modulo = 10;
    }

    suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;
    residuo = suma % modulo;

    /* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
    digitoVerificador = residuo == 0 ? 0 : modulo - residuo;

    if (nat == true) {
        if (digitoVerificador != d10) {
            let autFocus = $("#cedula").focus();
            toastr.error("El Número de cédula no es Válido.");
            return false;
        } else {
            let autFocus = $("#cedula").focus();
            toastr.success("El número de cédula es Válido.");
            return true;
        }
    }
    return true;
}

function ValidarPass() {
    var contrasena = $("#contrasena").val();
    var rpass = $("#rpass").val();
    if (contrasena !== rpass) {
        return false;
    } else {
        return true;
    }
}

function editPaciente() {
    var id = $("#update_id").val();
    var cedula = $("#cedula").val();
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var pass = $("#passw").val();
    var fecha = $("#fecha").val();
    var genero = $("#genero").val();
    console.log(id, cedula, nombre, email, pass, fecha, genero);
    $.ajax({
        type: "POST",
        method: "POST",
        url: "./editar_paciente.php",
        data: 'id=' + id + '&cedula=' + cedula + '&nombre=' + nombre + '&email=' + email + '&pass=' + pass + '&fecha=' + fecha + '&genero=' + genero,
        success: function(data) {

            if (data) {
                swal("Editar!", "Editar guardado con Éxito", "success");
                setTimeout(function() {
                    limpiarForm();
                    location.reload();
                }, 600);
            }
        }
    });
}

function limpiarFormEdit() {
    $("#cedulaE").val('');
    $("#nombreE").val('');
    $("#telefonoE").val('');
    $("#direccionE").val('');
    $("#emailE").val('');
    $("#generoE").val('');
    $("#especialidadE").val('');
    var now = new Date();
    $("#fecha").val(now);

}

///// Especialista Guardar

async function validaGuardarEspecialista() {
    await this.commonValdtGuardarEspta(0).then(resp => {
        if (resp) {
            swal({
                title: "Atención!!",
                text: "Seguro desea Guardar Especialista",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    guardarEspecialista();
                } else {
                    swal("Error al Guardar !");
                    location.reload();
                }
            });

        }
    });
}

function commonValdtGuardarEspta(action) {

    var cedula = $("#cedulaE").val();
    var nombre = $("#nombreE").val();
    var telefono = $("#telefonoE").val();
    var direccion = $("#direccionE").val();
    var email = $("#emailE").val();
    var fecha = $("#fechaE").val();
    var genero = $("#generoE").val();
    var especialidad = $("#especialidadE").val();


    return new Promise((resolve, reject) => {

        if (cedula == "") {
            let autFocus = $("#cedulaE").focus();
            toastr.error("Ingrese Numero de Cedula");
        } else if (nombre == "") {
            let autFocus = $("#nombreE").focus();
            toastr.error("Ingrese nombre");
        } else if (telefono == "") {
            let autFocus = $("#telefonoE").focus();
            toastr.error("Ingrese Número Teléfono");
        } else if (direccion == "") {
            let autFocus = $("#direccionE").focus();
            toastr.error("Ingrese Dirección");
        } else if (email == "") {
            let autFocus = $("#emailE").focus();
            toastr.error("Ingrese Correo");
        } else if (!validarEmail(email)) {
            let autFocus = $("#emailE").focus();
            this.toastr.error("El correo no es válido !!");
        } else if (fecha == "") {
            let autFocus = $("#fechaE").focus();
            toastr.error("Seleccione Fecha Nacimiento");
        } else if (genero == "") {
            let autFocus = $("#generoE").focus();
            toastr.error("Seleccione Genero");
        } else if (especialidad == "") {
            let autFocus = $("#especialidadE").focus();
            toastr.error("Seleccione Especialidad");
        } else {
            if (action === 0) {
                $.ajax({
                    type: "POST",
                    method: "POST",
                    dataType: 'JSON',
                    url: 'php/select_especialidaad.php?dato=' + 8,
                    data: 'cedula=' + cedula,
                    success: function(data) {
                        if (data.length !== 0) {
                            let autFocus = document.getElementById("cedulaE").focus();
                            toastr.error("Cedula Exitente");

                        } else {
                            resolve(true);
                        }
                    },
                });
            } else if (action === 1) {
                resolve(true);
            }
        }
    });
}

function guardarEspecialista() {
    var cedula = $("#cedulaE").val();
    var nombre = $("#nombreE").val();
    var telefono = $("#telefonoE").val();
    var direccion = $("#direccionE").val();
    var email = $("#emailE").val();
    var fecha = $("#fechaE").val();
    var genero = $("#generoE").val();
    var especialidad = $("#especialidadE").val();
    /* console.log(cedula, nombre, telefono, direccion, email, fecha, genero, especialidad); */
    $.ajax({
        type: "POST",
        method: "POST",
        url: "./registrar_especialista.php",
        data: 'cedula=' + cedula + '&nombre=' + nombre + '&telefono=' + telefono + '&direccion=' + direccion + '&email=' + email + '&fecha=' + fecha + '&genero=' + genero + '&especialidad=' + especialidad,
        success: function(data) {
            if (data) {
                swal("Guardada!", "Especialista guardado con Éxito", "success");
                setTimeout(function() {
                    limpiarForm();
                    location.reload();
                }, 700);
            }
        }
    });
}


//// Especialista Modificar
async function validaEditarEspecialista() {
    await this.commonValidateEspecialista(0).then(resp => {
        if (resp) {
            swal({
                title: "Atención!!",
                text: "Seguro desea Editar Especialista",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    editEspecilaista();
                } else {
                    swal("Error al Editar !");
                    location.reload();
                }
            });

        }
    });
}


function commonValidateEspecialista(action) {

    var cedula = $("#cedula").val();
    var nombre = $("#nombre").val();
    var telefono = $("#telefono").val();
    var direccion = $("#direccion").val();
    var email = $("#email").val();
    var fecha = $("#fecha").val();
    var genero = $("#genero").val();
    var especialidad = $("#especialidad").val();

    return new Promise((resolve, reject) => {
        if (cedula == "") {
            let autFocus = $("#cedula").focus();
            toastr.error("Ingrese Numero de Cedula");
        } else if (nombre == "") {
            let autFocus = $("#nombre").focus();
            toastr.error("Ingrese nombre");
        } else if (telefono == "") {
            let autFocus = $("#telefono").focus();
            toastr.error("Ingrese Número Teléfono");
        } else if (direccion == "") {
            let autFocus = $("#direccion").focus();
            toastr.error("Ingrese Dirección");
        } else if (email == "") {
            let autFocus = $("#email").focus();
            toastr.error("Ingrese Correo");
        } else if (fecha == "") {
            let autFocus = $("#fecha").focus();
            toastr.error("Seleccione Fecha Nacimiento");
        } else if (genero == "") {
            let autFocus = $("#genero").focus();
            toastr.error("Seleccione Genero");
        } else if (especialidad == "") {
            let autFocus = $("#especialidad").focus();
            toastr.error("Seleccione Especialidad");
        } else {
            if (action === 0) {
                if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(email)) {
                    resolve(true);
                } else {
                    let autFocus = $("#email").focus();
                    this.toastr.error("El correo no es válido !!");
                }
            } else if (action === 1) {
                resolve(true);
            }
        }
    });
}

function editEspecilaista() {
    var id = $("#update_id").val();
    var cedula = $("#cedula").val();
    var nombre = $("#nombre").val();
    var telefono = $("#telefono").val();
    var direccion = $("#direccion").val();
    var email = $("#email").val();
    var fecha = $("#fecha").val();
    var genero = $("#genero").val();
    var especialidad = $("#especialidad").val();
    console.log(cedula, nombre, telefono, direccion, email, fecha, genero, especialidad);
    $.ajax({
        type: "POST",
        method: "POST",
        url: "./editar_especialista.php",
        data: 'id=' + id + '&cedula=' + cedula + '&nombre=' + nombre + '&telefono=' + telefono + '&direccion=' + direccion + '&email=' + email + '&fecha=' + fecha + '&genero=' + genero + '&especialidad=' + especialidad,
        success: function(data) {
            if (data) {
                swal("Editar!", "Editar con Éxito", "success");
                setTimeout(function() {
                    limpiarForm();
                    location.reload();
                }, 600);
            }
        }
    });
}