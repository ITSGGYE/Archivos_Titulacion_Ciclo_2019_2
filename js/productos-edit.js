$(document).ready(function() {
    var data = "tipo_presentaciones=" + "true";
    var presentaciones = $("#tipo_presentacion");
    $.ajax({
        type: "GET",
        url: "../../controller/ClassProductosC.php?" + data,
        contentType: false,
        processData: false,
        dataType: 'json',
        cache: false,
        success: function(result) {
            $(result).each(function(i, v) {
                presentaciones.append('<option value="' + v.COD_PRESENTACION + '">' + v.TAMAÑO_PRESENTACION + '</option>');
            })
            presentaciones.formSelect();
        },
        error: function(result) {

        }
    })
})


    function getCodProductoAdd(cod_producto){
    var codigo = "P0"+cod_producto;
        $("#codigo_producto").val(codigo);
        $("#codigo_producto").focus();
        $("#cantidad").focus();
    }

function getCodProductoRemove(cod_producto){
    var codigo = "P0"+cod_producto;
    $("#codigo_producto_d").val(codigo);
    $("#codigo_producto_d").focus();
    $("#cantidad_d").focus();
}



$(document).ready(function() {
    $(document).on("submit", "#findProductFrom", function(event) {
        event.preventDefault();
        var presentaciones = $("#tipo_presentacion");
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "../../controller/ClassProductosC.php",
            dataType: "json",
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            success: function(result) {
                $("#codigo_producto").val(result[0]['COD_PRODUCTO']);
                $("#codigo_producto").focus();
                $("#nombre_producto").val(result[0]['NOMBRE_PRODUCTO']);
                $("#nombre_producto").focus();
                var option = result[0]['TIPO_PRESENTACION'];
                $("#tipo_presentacion option[value='" + option + "']").attr("selected", true);
                presentaciones.formSelect();
                $("#precio").val(parseFloat(result[0]['PRECIO']));
                $("#precio").focus();

            },
            error: function() {
                console.log("error al buscar el producto");
                alert("error al buscar el producto");
            }
        })
    })
})

$(document).ready(function() {
    $(document).on("submit", "#updateProductForm", function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "../../controller/ClassProductosC.php",
            dataType: "json",
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            success: function(result) {
                if (result["ESTADO"] == 1) {
                    $('#toast-status').attr('href', '../../css/toast-green.css');
                    var toastHTML = '<span id="toast">' + result["MENSAJE"] + '</span>';
                    M.toast({
                        html: toastHTML,
                        classes: 'rounded'
                    });
                    $('#updateProductForm')[0].reset();
                    $("#nombre_producto").focus();
                    setTimeout(function() { location.reload(); }, 1000);
                } else if (result == 0) {
                    $('#toast-status').attr('href', '../../css/toast-red.css');
                    var toastHTML = '<span id="toast">' + result["MENSAJE"] + '</span>';
                    M.toast({
                        html: toastHTML,
                        classes: 'rounded'
                    });
                    $("#nombre_producto").focus();
                } else {
                    $('#toast-status').attr('href', '../../css/toast-red.css');
                    var toastHTML = '<span id="toast">Ocurrio un error inesperado</span>';
                    M.toast({
                        html: toastHTML,
                        classes: 'rounded'
                    });
                    $("#nombre_producto").focus();
                }
            },
            error: function() {
                $('#toast-status').attr('href', '../../css/toast-red.css');
                var toastHTML = '<span id="toast">Error al actualizar el producto</span>';
                M.toast({
                    html: toastHTML,
                    classes: 'rounded'
                });
            }
        })
    })
})

$(document).ready(function(){
    $(document).on("submit","#addItems",function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "../../controller/ClassInventarioC.php",
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            dataType: "json",
            success: function(result){

                    $('#toast-status').attr('href', '../../css/toast-green.css');
                    var toastHTML = '<span id="toast">' + result+ '</span>';
                    M.toast({
                        html: toastHTML,
                        classes: 'rounded'
                    });
                    $("#cantidad").val("");

            }, error: function(result){
                $('#toast-status').attr('href', '../../css/toast-red.css');
                var toastHTML = '<span id="toast">' + result+ '</span>';
                M.toast({
                    html: toastHTML,
                    classes: 'rounded'
                });
            }

        })
        })
})

$(document).ready(function(){
    $(document).on("submit","#removeItems",function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "../../controller/ClassInventarioC.php",
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            dataType: "json",
            success: function(result){

                $('#toast-status').attr('href', '../../css/toast-green.css');
                var toastHTML = '<span id="toast">' + result+ '</span>';
                M.toast({
                    html: toastHTML,
                    classes: 'rounded'
                });
                $("#cantidad_d").val("");

            }, error: function(result){
                $('#toast-status').attr('href', '../../css/toast-red.css');
                var toastHTML = '<span id="toast">' + result+ '</span>';
                M.toast({
                    html: toastHTML,
                    classes: 'rounded'
                });
            }

        })
    })
})