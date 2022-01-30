/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global v_txtUsuario */

$(document).ready(function () {
    $('#btnAceptar').click(function () {
        var v_txtUsuario = $('#txtUsuario').val();
        var v_txtContra = $('#txtContra').val();
        var data = $('#frm_login').serialize();

        $('#frm_login').validate({
            rules: {
                txtUsuario: {
                    required: true,
                    minlength: 3
                },
                txtContra: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                txtUsuario: {
                    required: "LLENE EL CAMPO USUARIO POR FAVOR!",
                    minlength: "ESCRIBA MAS DE TRES CARACTERES EN EL CAMPO USUARIO!"
                },
                txtContra: {
                    required: "LLENE EL CAMPO CONTRASEÑA POR FAVOR!",
                    minlength: "ESCRIBA MAS DE TRES CARACTERES EN EL CAMPO CONTRASEÑA!"
                }
            }
        });
    }
    });
});


