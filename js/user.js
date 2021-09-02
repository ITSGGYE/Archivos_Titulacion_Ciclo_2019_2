$("#form_agregar").hide();
$(document).ready(function(){
    $(document).on("submit","#agregar_usuario_form",function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url:"../../controller/ClassUsuariosC.php",
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            dataType:"json",
            success: function(result){
                if (result["ESTADO"] == 0) {
                    $('#toast-status').attr('href', '../../css/toast-red.css');
                    var toastHTML = '<span id="toast">' + result["MENSAJE"] + '</span>';
                    M.toast({
                        html: toastHTML,
                        classes: 'rounded'
                    });
                    $("#cedula").focus();
                }else if (result["ESTADO"] == 1){
                    $('#toast-status').attr('href', '../../css/toast-green.css');
                    var toastHTML = '<span id="toast">' + result["MENSAJE"] + '</span>';
                    M.toast({
                        html: toastHTML,
                        classes: 'rounded'
                    });
                    $('#agregar_usuario_form')[0].reset();
                    $("#cedula").focus();
                }

            },error: function(){
                $('#toast-status').attr('href', '../../css/toast-red.css');
                var toastHTML = '<span id="toast">OCURRIO UN ERROR INESPERADO</span>';
                M.toast({
                    html: toastHTML,
                    classes: 'rounded'
                });
                $("#cedula").focus();

            }
        })

    })
})

$(document).ready(function(){
    $(document).on("submit","#buscar_usuario_form",function(event){
        event.preventDefault();
        var data = "?find_cedula="+ $("#find_cedula").val();
        $.ajax({
            type: "GET",
            url: "../../controller/ClassUsuariosC.php"+ data,
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            success: function(result){
                if(typeof result["ESTADO"] !== "undefined"){
                    if (result["ESTADO"] == 2){
                        $('#toast-status').attr('href', '../../css/toast-red.css');
                        var toastHTML = '<span id="toast">' + result["MENSAJE"] + '</span>';
                        M.toast({
                            html: toastHTML,
                            classes: 'rounded'
                        });
                    }
                }else{
                    $("#cedula").val(result[0]["CEDULA"]);
                    $("#primer_nombre").val(result[0]["PRIMER_NOMBRE"]);
                    $("#segundo_nombre").val(result[0]["SEGUNDO_NOMBRE"]);
                    $("#primer_apellido").val(result[0]["PRIMER_APELLIDO"]);
                    $("#segundo_apellido").val(result[0]["SEGUNDO_APELLIDO"]);
                    $("#fecha").val(result[0]["FECHA_NACIMIENTO"]);
                    $("#direccion").val(result[0]["DIRECCION"]);
                    $("#telefono").val(result[0]["TELEFONO"]);
                    $("#celular").val(result[0]["CELULAR"]);
                    $("#correo").val(result[0]["CORREO"]);

                    var option = result[0]['TIPO_USUARIO'];
                    $("#tipo_usuario option[value='" + option + "']").attr("selected", true);
                    var tipo_usuario = $("#tipo_usuario");
                    tipo_usuario.formSelect();
                    $("#form_agregar").show();
                    $("#cedula").focus();
                    $("#primer_nombre").focus();
                    $("#segundo_nombre").focus();
                    $("#primer_apellido").focus();
                    $("#segundo_apellido").focus();
                    $("#fecha").focus();
                    $("#direccion").focus();
                    $("#telefono").focus();
                    $("#celular").focus();
                    $("#correo").focus();
                }

            },error: function(result){
                $('#toast-status').attr('href', '../../css/toast-red.css');
                var toastHTML = '<span id="toast">OCURRIO UN ERROR INESPERADO</span>';
                M.toast({
                    html: toastHTML,
                    classes: 'rounded'
                });
            }

        })
    })
})

$(document).ready(function(){
    $(document).on("submit","#actualizar_usuario_form",function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url:"../../controller/ClassUsuariosC.php",
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            dataType:"json",
            success: function(result){
                if (result["ESTADO"] == 0) {
                    $('#toast-status').attr('href', '../../css/toast-red.css');
                    var toastHTML = '<span id="toast">' + result["MENSAJE"] + '</span>';
                    M.toast({
                        html: toastHTML,
                        classes: 'rounded'
                    });
                    $("#cedula").focus();
                }else if (result["ESTADO"] == 1){
                    $('#toast-status').attr('href', '../../css/toast-green.css');
                    var toastHTML = '<span id="toast">' + result["MENSAJE"] + '</span>';
                    M.toast({
                        html: toastHTML,
                        classes: 'rounded'
                    });
                    $('#actualizar_usuario_form')[0].reset();
                    $("#cedula").focus();
                    $("#form_agregar").hide();
                }

            },error: function(){
                $('#toast-status').attr('href', '../../css/toast-red.css');
                var toastHTML = '<span id="toast">OCURRIO UN ERROR INESPERADO</span>';
                M.toast({
                    html: toastHTML,
                    classes: 'rounded'
                });
                $("#cedula").focus();

            }
        })
    })
})

$(document).ready(function(){
    $(document).on("submit","#reset_password_form",function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type:"POST",
            url:"../../controller/ClassUsuariosC.php",
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            dataType: "json",
            success: function(result){
                if (result["ESTADO"] == 0) {
                    $('#toast-status').attr('href', '../../css/toast-red.css');
                    var toastHTML = '<span id="toast">' + result["MENSAJE"] + '</span>';
                    M.toast({
                        html: toastHTML,
                        classes: 'rounded'
                    });
                }else if (result["ESTADO"] == 1){
                    $('#toast-status').attr('href', '../../css/toast-green.css');
                    var toastHTML = '<span id="toast">' + result["MENSAJE"] + '</span>';
                    M.toast({
                        html: toastHTML,
                        classes: 'rounded'
                    });
                    $('#reset_password_form')[0].reset();
                    $("#modal1").modal('close');
                }else if (result["ESTADO"] == 2){
                    $('#toast-status').attr('href', '../../css/toast-red.css');
                    var toastHTML = '<span id="toast">' + result["MENSAJE"] + '</span>';
                    M.toast({
                        html: toastHTML,
                        classes: 'rounded'
                    });
                    $('#reset_password_form')[0].reset();
                    $("#modal1").modal('close');
                }
            },error: function(){
                $('#toast-status').attr('href', '../../css/toast-red.css');
                var toastHTML = '<span id="toast">OCURRIO UN ERROR INESPERADO</span>';
                M.toast({
                    html: toastHTML,
                    classes: 'rounded'
                });

            }
        })
    })
})