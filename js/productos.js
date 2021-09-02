$(document).ready(function() {
    $(document).on('submit', '#agregar_productos_form', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "../../controller/ClassProductosC.php",
            dataType: 'json',
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
                    $('#agregar_productos_form')[0].reset();
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
                    var toastHTML = '<span id="toast">'+ result+'</span>';
                    M.toast({
                        html: toastHTML,
                        classes: 'rounded'
                    });
                    $("#nombre_producto").focus();
                }

            },
            error: function(result) {
                $('#toast-status').attr('href', '../../css/toast-red.css');
                var toastHTML = '<span id="toast">'+result[0]+'</span>';
                M.toast({
                    html: toastHTML,
                    classes: 'rounded'
                });
                $("#nombre_producto").focus();
            }

        })
    });
});

$(document).ready(function() {
    var data = "cod_producto=" + "true";
    $.ajax({
        type: "GET",
        url: "../../controller/ClassProductosC.php?" + data,
        contentType: false,
        processData: false,
        cache: false,
        success: function(result) {
            $("#codigo_producto").val(result);
            $("#codigo_producto").focus();

        },
        error: function(result) {
            alert(result);
        }
    })
});

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

$(document).ready(function() {
    $(document).on("submit", "#formGetProduct", function(event) {
        event.preventDefault();
        var $start = parseInt($("#start").val());
        var $finish = parseInt($start) + parseInt(10);
        $("#start").val($finish);
        var data = "getProductos=true&start=0&finish=" + $finish;
        $.ajax({
            type: "GET",
            url: "../../controller/ClassProductosC.php?" + data,
            contentType: false,
            processData: false,
            cache: false,
            success: function(result) {
                $("#container").html(result);
            },
            error: function() {
                console.log("error al caragr productos");
            }
        })
    })
})

