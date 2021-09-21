  // FUNCION AUTOCOMPLETE PARA DEPARTAMENTOS
  $(function() {
             $("#departamento").autocomplete({
             source: "class/buscadepartamentos.php",
  		       minLength: 2,
             select: function(event, ui) { 
  		       $('#coddepartamento').val(ui.item.coddepartamento);
             }  
        });
   });

// FUNCION AUTOCOMPLETE PARA INSTITUCIONES
  $(function() {
        $("#nominstitucion").autocomplete({
             source: "class/buscainstituciones.php",
  		       minLength: 2,
             select: function(event, ui) { 
  		       $('#codinstitucion').val(ui.item.codinstitucion);
             }  
        });
   });

// FUNCION AUTOCOMPLETE PARA UNIDADES
  $(function() {
             $("#unidad").autocomplete({
             source: "class/buscaunidades.php",
             minLength: 2,
             select: function(event, ui) { 
             $('#codunidad').val(ui.item.codunidad);
             }  
        });
   });

// FUNCION AUTOCOMPLETE PARA CAPACIDADES
  $(function() {
             $("#capacidad2").autocomplete({
             source: "class/buscacapacidades.php",
             minLength: 2,
             select: function(event, ui) { 
             $('#codunidad2').val(ui.item.codunidad);
             $('#unidad2').val(ui.item.unidad);
             $('#codcapacidad2').val(ui.item.codcapacidad);
             }  
        });
   });

// FUNCION AUTOCOMPLETE PARA CONTENIDOS
  $(function() {
             $("#tema3").autocomplete({
             source: "class/buscatemas.php",
             minLength: 2,
             select: function(event, ui) { 
             $('#codunidad3').val(ui.item.codunidad);
             $('#unidad3').val(ui.item.unidad);
             $('#codcapacidad3').val(ui.item.codcapacidad);
             $('#capacidad3').val(ui.item.capacidad);
             $('#codtema3').val(ui.item.codtema);
             }  
        });
   });

// FUNCION AUTOCOMPLETE PARA INDICADORES
  $(function() {
             $("#indicador4").autocomplete({
             source: "class/buscaindicadores.php",
             minLength: 2,
             select: function(event, ui) { 
             $('#codunidad4').val(ui.item.codunidad);
             $('#unidad4').val(ui.item.unidad);
             $('#codcapacidad4').val(ui.item.codcapacidad);
             $('#capacidad4').val(ui.item.capacidad);
             $('#codtema4').val(ui.item.codtema);
             $('#tema4').val(ui.item.tema);
             $('#codindicador4').val(ui.item.codindicador);
             }  
        });
   });

// FUNCION AUTOCOMPLETE PARA ESTRATEGIAS
  $(function() {
             $("#estrategia5").autocomplete({
             source: "class/buscaestrategias.php",
             minLength: 2,
             select: function(event, ui) { 
             $('#codunidad5').val(ui.item.codunidad);
             $('#unidad5').val(ui.item.unidad);
             $('#codcapacidad5').val(ui.item.codcapacidad);
             $('#capacidad5').val(ui.item.capacidad);
             $('#codtema5').val(ui.item.codtema);
             $('#tema5').val(ui.item.tema);
             $('#codindicador5').val(ui.item.codindicador);
             $('#indicador5').val(ui.item.indicador);
             $('#codestrategia5').val(ui.item.codestrategia);
             }  
        });
   });

// FUNCION AUTOCOMPLETE PARA DOCENTES
 $(function() {
   $("#buscadocente").autocomplete({
     source: "class/buscadocente.php",
     minLength: 2,
     select: function(event, ui) { 
       $('#coddoc').val(ui.item.coddoc);
     }  
   });
 });

// FUNCION AUTOCOMPLETE PARA ALUMNOS
 $(function() {
   $("#buscaalumno").autocomplete({
     source: "class/buscaalumno.php",
     minLength: 2,
     select: function(event, ui) { 
       $('#codalumno').val(ui.item.codalumno);
     }  
   });
 });

















  $(function() {
             $("#dnitutor").autocomplete({
             source: "class/buscatutor.php",
  		       minLength: 2,
             select: function(event, ui) { 
             $('#dniant').val(ui.item.dnitutor);
  		       $('#nomtutor').val(ui.item.nomtutor);
  		       $('#apetutor').val(ui.item.apetutor);
  		       $('#parentesco').val(ui.item.parentesco);
  		       $('#tlftutor').val(ui.item.tlftutor);
  		       $('#emailtutor').val(ui.item.emailtutor);
  		       $('#statustutor').val(ui.item.statustutor);
             }  
        });
   });
  

 $('body').on('focus',"#procedencia", function(){
   $(this).autocomplete({
     source: "class/buscainstituciones.php",
     minLength: 2,
     select: function(event, ui) { 
       $('#codinstitucion').val(ui.item.codinstitucion);
     }  
   });
 });

 $('body').on('focus',"#proyecto", function(){
   $(this).autocomplete({
     source: "class/buscaproyectos.php",
     minLength: 2,
     select: function(event, ui) { 
       $('#codproyecto').val(ui.item.codproyecto);
     }  
   });
 });

 $('body').on('focus',"#dnitutor", function(){
   $(this).autocomplete({
     source: "class/buscatutor.php",
     minLength: 2,
     select: function(event, ui) { 
       $('#dniant').val(ui.item.dnitutor);
       $('#nomtutor').val(ui.item.nomtutor);
       $('#apetutor').val(ui.item.apetutor);
       $('#parentesco').val(ui.item.parentesco);
       $('#tlftutor').val(ui.item.tlftutor);
       $('#emailtutor').val(ui.item.emailtutor);
       $('#statustutor').val(ui.item.statustutor);
     }  
   });
 });


 $(function() {
   $("#dnialumno").autocomplete({
     source: "class/buscaestudiante.php",
     minLength: 2,
     select: function(event, ui) { 
       $('#dnialumno').val(ui.item.dniest);
     }  
   });
 });


 $(function() {
   $("#busqueda").autocomplete({
     source: "class/busquedaestudiante.php",
     minLength: 2,
     select: function(event, ui) {
       $('#codest').val(ui.item.codest); 
       $('#dniest').val(ui.item.dniest);
       $('#nomest').val(ui.item.nomest);
       $('#apeest').val(ui.item.apeest);
       $('#sexoest').val(ui.item.sexoest);
       $('#direcest').val(ui.item.direcest);
       $('#fnacest').val(ui.item.fnacest);
       $('#motivollegada').val(ui.item.motivollegada);
       $('#situacionactual').val(ui.item.situacionactual);
     }  
   });
 });