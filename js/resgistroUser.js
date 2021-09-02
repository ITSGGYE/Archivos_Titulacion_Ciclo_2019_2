    //importamos configuraciones de toastr
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1500",
        "timeOut": "2800",
        "extendedTimeOut": "1500",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    function validarEmail(valor) {
        if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(valor)) {
            return true;
        } else {
            return false;
        }
    }

    async function validaRegistroPaciente() {

        await this.validaRegistrosDatos(0).then(resp => {
            if (resp) {
                setTimeout(function() {
                    validarUsuario();
                }, 1500);
            }
        });
    }

    function validaRegistrosDatos(action) {
        var cedula = $("#cedula").val();
        var nombre = $("#nombre").val();
        var correo = $("#correo").val();
        var contrasena = $("#contrasena").val();
        var rpass = $("#rpass").val();
        var fecha = $("#fecha").val();
        var genero = $("#genero").val();

        return new Promise((resolve, reject) => {

            if (!validaCedula()) {

            } else if (nombre == "") {
                let autFocus = $("#nombre").focus();
                toastr.error("Ingrese Nombres");
                return false;
            } else if (correo == "") {
                let autFocus = $("#correo").focus();
                toastr.error("Ingrese  Correo");
                return false;
            } else if (!validarEmail(correo)) {
                let autFocus = $("#correo").focus();
                this.toastr.error("El correo no es válido !!");
                return false;
            } else if (!ExistCorreo()) {

            } else if (contrasena == "") {
                console.log(contrasena);
                let autFocus = $("#contrasena").focus();
                toastr.error("Ingrese Contraseña");
                return false;

            } else if (rpass == "") {
                let autFocus = $("#rpass").focus();
                toastr.error("Repita Contraseña");
                return false;
            } else if (!ValidarPass()) {
                let autFocus = $("#rpass").focus();
                toastr.error("Ingreso de Contraseñas Diferentes");
            } else if (fecha == "") {
                let autFocus = $("#fecha").focus();
                toastr.error("Ingrese Fecha Nacimineto");
                return false;
            } else if (genero == "") {
                let autFocus = $("#genero").focus();
                toastr.error("Seleccione Genero");
                return false;
            } else {
                if (action === 0) {
                    $.ajax({
                        type: "POST",
                        method: "POST",
                        dataType: 'JSON',
                        url: './select_especialidaad.php?dato=' + 6,
                        data: 'cedula=' + cedula,
                        success: function(data) {
                            console.log(data);
                            if (data.length !== 0) {
                                let autFocus = document.getElementById("cedula").focus();
                                toastr.error("Cedula ya Registrada");
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


    function ExistCorreo() {
        var correo = $("#correo").val();
        $.ajax({
            type: "POST",
            method: "POST",
            dataType: 'JSON',
            url: './select_especialidaad.php?dato=' + 7,
            data: 'correo=' + correo,
            success: function(data) {
                console.log(data);
                if (data.length == 0) {
                    return true;
                } else {
                    let autFocus = $("#correo").focus();
                    toastr.error("Correo Registrado");
                    return false;
                }
            },

        });
        return true;
    }


    window.onload = function() {
        $("#cedula").val('');
        $("#nombre").val('');
        $("#correo").val('');
        $("#contrasena").val('');
        $("#rpass").val('');
        $("#genero").val('');
        var now = new Date();
        $("#fecha").val(now);

    };

    function validarUsuario() {
        var cedula = $("#cedula").val();
        var nombre = $("#nombre").val();
        var correo = $("#correo").val();
        var contrasena = $("#contrasena").val();
        var rpass = $("#rpass").val();
        var fecha = $("#fecha").val();
        var genero = $("#genero").val();
        console.log(cedula, nombre, correo, contrasena, rpass, fecha, genero);
        $.ajax({
            type: "POST",
            method: "POST",
            url: "./registro2.php",
            data: 'cedula=' + cedula + '&nombre=' + nombre + '&correo=' + correo + '&contrasena=' +
                contrasena + '&rpass=' + rpass + '&fecha=' + fecha + '&genero=' + genero,
            success: function(data) {
                $('#dataResultado').fadeIn(1000).html(data);
            }
        });
    }

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
                toastr.error("FECHA ERRONEA");
                return false;
            }

        });
    });






    function SoloNumeros(evt) {
        let key = (event.which) ? event.which : event.keyCode;
        if (key > 31 && (key < 48 || key > 59)) {
            return false;
        }
        return true;
    }

    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ"; //Se define todo el abecedario que se quiere que se muestre.
        especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

        tecla_especial = false
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        /* 
                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                    alert('Tecla numerica no aceptada');
                    return false;
                } */
    }