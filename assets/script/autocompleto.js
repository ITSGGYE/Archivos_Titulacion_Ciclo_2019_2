// FUNCION AUTOCOMPLETE
$(function() {

    $("#busquedatipo").keyup(function() {

        var tipo = $('select#tipoentrada').val();

        if (tipo == "") {

            $("#tipoentrada").focus();
            $('#tipoentrada').css('border-color', '#2cabe3');
            $("#busquedatipo").val("");
            swal("Oops", "POR FAVOR SELECCIONE EL TIPO DE ENTRADA!", "error");
            return false;

        } else if (tipo == "PRODUCTO") {

          $("#busquedatipo").autocomplete({
            source: "class/buscaproductoc.php",
            minLength: 1,
            select: function(event, ui) {
              $('#codproducto').val(ui.item.codproducto);
              $('#producto').val(ui.item.producto);
              $('#codcategoria').val(ui.item.codcategoria);
              $('#categorias').val(ui.item.nomcategoria);
              $('#preciocompra').val(ui.item.preciocompra);
              $('#precioventa').val(ui.item.precioventa);
              $('#precioconiva').val((ui.item.ivaproducto == "SI") ? ui.item.preciocompra : "0.00");
              $('#existencia').val(ui.item.existencia);
              $('#ivaproducto').val(ui.item.ivaproducto);
              $('#descproducto').val(ui.item.descproducto);
              $("#cantidad").focus();
            }
          });

          return false;

        } else if (tipo == "INSUMO") {

          $("#busquedatipo").autocomplete({
            source: "class/buscainsumo.php",
            minLength: 1,
            select: function(event, ui) {
              $('#codproducto').val(ui.item.codinsumo);
              $('#producto').val(ui.item.insumo);
              $('#codcategoria').val(ui.item.codcategoria);
              $('#categorias').val(ui.item.nomcategoria);
              $('#preciocompra').val(ui.item.preciocompra);
              $('#precioventa').val(ui.item.precioventa);
              $('#precioconiva').val((ui.item.ivainsumo == "SI") ? ui.item.preciocompra : "0.00");
              $('#existencia').val(ui.item.existencia);
              $('#ivaproducto').val(ui.item.ivainsumo);
              $('#descproducto').val(ui.item.descinsumo);
              $("#cantidad").focus();
            }
          });

        }
    });
});


$(function() {
    $("#busquedaproductov").autocomplete({
        source: "class/buscaproductov.php",
        minLength: 1,
        select: function(event, ui) {
            $('#codproducto').val(ui.item.codproducto);
            $('#producto').val(ui.item.producto);
            $('#codcategoria').val(ui.item.codcategoria);
            $('#categorias').val(ui.item.nomcategoria);
            $('#preciocompra').val(ui.item.preciocompra);
            $('#precioventa').val(ui.item.precioventa);
            $('#precioconiva').val((ui.item.ivaproducto == "SI") ? ui.item.precioventa : "0.00");
            $('#existencia').val(ui.item.existencia);
            $('#ivaproducto').val(ui.item.ivaproducto);
            $('#descproducto').val(ui.item.descproducto);
            $("#cantidad").focus();
        }
    });
});


$(function() {
    $("#busquedainsumo").autocomplete({
        source: "class/buscainsumo.php",
        minLength: 1,
        select: function(event, ui) {
            $('#codinsumo').val(ui.item.codinsumo);
            $('#insumo').val(ui.item.insumo);
            $('#codcategoria').val(ui.item.codcategoria);
            $('#precioventa').val(ui.item.precioventa);
            $('#existencia').val(ui.item.existencia);
            $('#ivainsumo').val(ui.item.ivainsumo);
            $('#descinsumo').val(ui.item.descinsumo);
            $('#fechaexpiracion').val(ui.item.fechaexpiracion);
            $('#codproveedor').val(ui.item.codproveedor);
        }
    });
});

$(function() {
    $("#buscakardexproducto").autocomplete({
      source: "class/kardexproducto.php",
      minLength: 1,
      select: function(event, ui) {
        $('#codproducto').val(ui.item.codproducto);
      }
    });
});


$(function() {
    $("#buscakardexinsumo").autocomplete({
      source: "class/kardexinsumo.php",
      minLength: 1,
      select: function(event, ui) {
        $('#codinsumo').val(ui.item.codinsumo);
      }
    });
});


$(function() {
           $("#busqueda").autocomplete({
           source: "class/buscacliente.php",
           minLength: 1,
           select: function(event, ui) { 
          $('#codcliente').val(ui.item.codcliente);
          $('#creditoinicial').val(ui.item.limitecredito);
          $('#montocredito').val(ui.item.creditodisponible);
          $('#creditodisponible').val(ui.item.creditodisponible);
          $('#TextCliente').text(ui.item.nomcliente);
          $('#TextCredito').text(ui.item.creditodisponible);
           }  
      });
 });