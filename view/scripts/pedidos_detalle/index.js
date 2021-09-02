<script>




//Cambiar fecha del link
  $('#fecha').on('change', function() {
    fecha = this.value;
fecha=fecha.split("/").join("-");
  $("#createlink").attr("href", "index.php?c=pedidosdetalle&a=create&fecha="+fecha);
});

</script>
