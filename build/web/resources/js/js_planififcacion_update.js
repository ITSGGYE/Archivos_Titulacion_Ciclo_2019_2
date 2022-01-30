/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    var v_asignatura = $("#idAsignatura").val();
    var v_hora = $("#idHora").val();
    var v_curso = $("#idCurso").val();

    $("#idAsignatura option[value='" + v_asignatura + "'").attr("selected", true);

    $("#idHora option[value='" + v_hora + "'").attr("selected", true);

    $("#idCurso option[value='" + v_curso + "'").attr("selected", true);

    $('#actualizarForm').click(function () {
//        var v_txtUsuario = $('#txtUsuario').val();
//        var v_txtContra = $('#txtContra').val();
//        var data = $('#frm_login').serialize();

        $('#frmPlanificacionUpdate').validate({
            rules: {
                objUnidad: {
                    required: true,
                    minlength: 5
                },
                criterioEvaluacion: {
                    required: true,
                    minlength: 5
                },
                destresaCriterioDesempeno: {
                    required: true,
                    minlength: 5
                },
                actividadesAprendisaje: {
                    required: true,
                    minlength: 5
                },
                recursos: {
                    required: true,
                    minlength: 5
                },
                tecnicasInsteumentosEvaluacion: {
                    required: true,
                    minlength: 5
                },
                revisado: {
                    required: true,
                    minlength: 5
                },
                aprovado: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                objUnidad: {
                    required: "LLENE EL CAMPO POR FAVOR!",
                    minlength: "ESCRIBA MAS CARACTERES EN EL CAMPO!"
                },
                criterioEvaluacion: {
                    required: "LLENE EL CAMPO POR FAVOR!",
                    minlength: "ESCRIBA MAS CARACTERES EN EL CAMPO!"
                }, destresaCriterioDesempeno: {
                    required: "LLENE EL CAMPO POR FAVOR!",
                    minlength: "ESCRIBA MAS CARACTERES EN EL CAMPO!"
                }, actividadesAprendisaje: {
                    required: "LLENE EL CAMPO POR FAVOR!",
                    minlength: "ESCRIBA MAS CARACTERES EN EL CAMPO!"
                }, recursos: {
                    required: "LLENE EL CAMPO POR FAVOR!",
                    minlength: "ESCRIBA MAS CARACTERES EN EL CAMPO!"
                }, tecnicasInsteumentosEvaluacion: {
                    required: "LLENE EL CAMPO POR FAVOR!",
                    minlength: "ESCRIBA MAS CARACTERES EN EL CAMPO!"
                }, revisado: {
                    required: "LLENE EL CAMPO POR FAVOR!",
                    minlength: "ESCRIBA MAS CARACTERES EN EL CAMPO!"
                }, aprovado: {
                    required: "LLENE EL CAMPO POR FAVOR!",
                    minlength: "ESCRIBA MAS CARACTERES EN EL CAMPO!"
                }
            }
        });
    });

    $('#regresar').click(function () {
        window.location = "svt_planificacion";
    });
});

