/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
   $('#guardar').click(function () {
        $('#idFormPlanificacionCreate').validate({
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
                },
                asignatura: {
                    required: true
                },
                hora: {
                    required: true
                },
                curso: {
                    required: true
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
                }, asignatura: {
                    required: "POR FAVOR ESCOJA UNA OPCION VALIDA!"
                }, hora: {
                    required: "POR FAVOR ESCOJA UNA OPCION VALIDA!"
                }, curso: {
                    required: "POR FAVOR ESCOJA UNA OPCION VALIDA!"
                }
            }
        });
    });

    $('#regresar').click(function () {
        window.location = "svt_planificacion";
    }); 
});