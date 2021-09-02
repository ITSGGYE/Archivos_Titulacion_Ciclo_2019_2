<script>

//Cambiar fecha del link
$('#pe_cantidad').on('keyup', function() {  

var res=(this.value*60)/60000;
$('#pe_masas').val(res);

 });




</script>