$subtotalpagar = 0;
$(document).ready(function(){
    $data = "?id_vendedor="+$("#id_vendedor").val();
    $.ajax({
        type :"GET",
        url: "../../controller/ClassFacturacionC.php"+$data,
        processData: false,
        contentType: false,
        cache: false,
        success: function(result){
            $("#name_vendedor").val(result);
            $("#name_vendedor").focus();
        },error: function(){
            alert("NO SE PUEDE OBTENER EL NOMBRE DEL VENDEDOR");
        }
    })
})

$(document).ready(function(){
    $data = "?factura=1";
    $.ajax({
        type :"GET",
        url: "../../controller/ClassFacturacionC.php"+$data,
        processData: false,
        contentType: false,
        cache: false,
        success: function(result){
            $("#numero_factura").val(result);
            $("#numero_factura").focus();
        },error: function(){
            alert("NO SE PUEDE GENERAR EL NUMERO DE FACTURA");
        }
    })
})


$(document).ready(function(){
    $(document).on("submit","#addProductForm",function(event){
        event.preventDefault();
        $codProducto = $("#addCodigo_producto").val();
        $nombreProducto = $("#addNombre_producto").val();
        $cantidad = $("#addCantidad").val();
        $precio = $("#addPrecio").val();
        $subtotal = $("#addSubtotal").val();
        $subtotalpagar = parseFloat($subtotalpagar) + parseFloat($subtotal);
        $iva = (parseFloat($subtotalpagar) * 12) / 100;
        $valorpagar = parseFloat($subtotalpagar) + parseFloat($iva);
        var data = '  <div class="input-field col s2">\n' +
            '                            <input id="codigo_producto[]" name="codigo_producto[]" type="text" class="validate" value="'+$codProducto+'">\n' +
            '                        </div>\n' +
            '  <div class="input-field col s4">\n' +
            '                            <input readonly="true" id="nombre_producto[]" name="nombre_producto[]" type="text" class="validate" value="'+$nombreProducto+'">\n' +
            '                        </div>\n' +
            '                        <div class="input-field col s2">\n' +
            '                            <input id="cantidad[]" name="cantidad[]" type="number" value="'+$cantidad+'" class="validate">\n' +
            '                        </div>\n' +
            '                        <div class="input-field col s2">\n' +
            '                            <input readonly="true" id="precio[]" name="precio[]" type="text" value="'+$precio+'" class="validate">\n' +
            '                        </div>\n' +
            '                        <div class="input-field col s2">\n' +
            '                            <input readonly="true" id="subtotal[]" name="subtotal[]" type="text" value="'+$subtotal+'" class="validate">\n' +
            '                        </div>\n' +
            '                      ';
        $("#codigo_producto").focus();
        $("#cantidad").focus();
        $("#precio").focus();
        $("#subtotal").focus();
        $("#addProductForm")[0].reset();
        $("#subtotal_pagar").val($subtotalpagar);
        $("#iva_pagar").val($iva);
        $("#total_pagar").val($valorpagar);
        $("#factura").append(data);

    })
})
$(document).ready(function(){
    $(document).on("focusout","#addCodigo_producto",function(event){
        event.preventDefault();
        $codigo_producto = $("#addCodigo_producto").val();
        $data = "?get_product=1&codigo_producto="+$codigo_producto;
        $.ajax({
            type: "GET",
            url: "../../controller/ClassProductosC.php"+$data,
            processData: false,
            contentType: false,
            dataType: "json",
            cache: false,
            success: function(result){
                if (result[0]["CANTIDAD"] > 0){
                    $("#addPrecio").val(result[0]["PRECIO"]);
                    $("#addPrecio").focus();
                    $("#addNombre_producto").val(result[0]["NOMBRE_PRODUCTO"]);
                    $("#addNombre_producto").focus();
                    $("#addCantidad").focus();
                }else{
                    alert("NO HAY STOCK");
                    $("#addCodigo_producto").val("");

                }

            },error: function(){
                alert("ERROR");
            }
        })
    })

})

$(document).ready(function(){
    $("#addSubtotal").focus(function(event){
        event.preventDefault();
        $cant = $("#addCantidad").val();
        $price = $("#addPrecio").val();
        $subt = parseInt($cant) * parseFloat($price);
        $("#addSubtotal").val($subt);
    })
})

$(document).ready(function(){
    $(document).on("submit","#formFacturacion",function (event){
        event.preventDefault();
        var formData = new FormData(this);
        var factura = $("#numero_factura").val();

        $.ajax({
            type: "POST",
            url: "../../controller/ClassFacturacionC.php",
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            success: function(r){
                if (r == 1){
                    $('#toast-status').attr('href', '../../css/toast-green.css');
                    var toastHTML = "<span id='toast'>Transaccion Completa con Éxito</span>";
                    M.toast({ html: toastHTML, classes: 'rounded' });
                    $("#formFacturacion")[0].reset();
                    window.open("../../constants/imprimir_factura.php?cod_factura=" + factura, '_black');
                    window.focus();
                    location.reload();
                }else if (r == 0){
                    $('#toast-status').attr('href', '../../css/toast-red.css');
                    var toastHTML = "<span id='toast'>Transaccion no Exitosa</span>";
                    M.toast({ html: toastHTML, classes: 'rounded' });
                }
            },error: function(r){
                $('#toast-status').attr('href', './css/toast-red.css');
                var toastHTML = "<span id='toast'>SE PRODUJO UN ERROR</span>";
                M.toast({ html: toastHTML, classes: 'rounded' });
            }
        })
    })

    })

