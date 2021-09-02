$(document).ready(function() {
    $("input").on("keypress", function() {
        $input = $(this);
        $input.val($input.val().toUpperCase());
    })

    $(".numeros").on("keypress", function() {
        $numeros = $(this);
        $numeros = window.Event ? this.which : this.keyCode
        return ($numeros >= 48 && $numeros <= 57)
    })
});
function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}
function soloLetras(e) {
    key = e.KeyCode || e.which;
    tecla = String.fromCharCode(key).toUpperCase();
    letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZÃ‘ ';
    especiales = '8-37-39-46';
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function soloMail(e) {
    key = e.KeyCode || e.which;
    tecla = String.fromCharCode(key).toUpperCase();
    letras = '1234567890@._/$#-ABCDEFGHIJKLMNOPQRSTUVWXYZÃ‘ ';
    especiales = '8-37-39-46';
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function soloPrecios(e) {
    key = e.KeyCode || e.which;
    tecla = String.fromCharCode(key).toUpperCase();
    letras = '1234567890.';
    especiales = '8-37-39-46';
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}