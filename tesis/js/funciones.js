// ############################### FUNCION DE LOGIN ##########################################################

  function iniciar() { 
    var xhttp = new XMLHttpRequest();

    var a = document.getElementById('txt_usuario').value;
    var b = document.getElementById('txt_clave').value;

    var res = "usuario="+a + "&clave=" + b;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('respuesta').innerHTML = this.responseText;

        var c = document.getElementById('respuesta').innerHTML = this.responseText;

        //CON UNOS CONDICIONALES VALIDAMOS LA REPSUESTA Y LUEGO REALIZAMOS LA FUNCION RESPONDIENTE
        //PARA LA REDIRECCION
        if (c == "USUARIO Y CONTRASEÑA CORRECTAS") {
          document.getElementById('respuesta').style.color= "green";
          redireccion();
        }
        else if (c == "USUARIO Y CONTRASEÑA INCORRECTAS"){
          document.getElementById('respuesta').style.color= "red";
          limpiarCampos();
        }
      }
    };
    xhttp.open("POST", '../php/procesos/login.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(res); 
  } 

// ############################### FUNCIONES DE REDIRECCION ##########################################################

//FUNCION QUE NOS PERMITIRA REDIRECCIONAR AL INICIO
function cerrar() 
{ 
  //PROPIEDAD DE JAVASCRIPT QUE NOS PERMITE REDIRECCIONAR A UNA PAGINA
  window.location.assign("../html/inicio.html") 
} 

//FUNCION QUE NOS PERMITIRA REDIRECCIONAR AL LOGIN
function abrir() { 
  window.location.assign("../html/login.html"); 
}

//FUNCION QUE NOS PERMITIRA REDIRECCIONAR AL INICIO
function regresar() 
{ 
    window.location.assign("../html/inicio.html") 
} 

//FUNCION QUE NOS PERMITIRA REDIRECCIONAR AL MENU
function redireccion()
{
//PROPIEDAD DE JAVASCRIPT QUE NOS PERMITE EJECUTAR UNA FUNCION PERO EN QUE TIEMPO 
  setTimeout(function(){
    window.location.assign("../html/menu.html");
  }, 1500);
} 
// ############################### MOSTAR LOS PAGINAS DE LOS ENLACE #################################################

//funcion que nos permitira redireccionar solamente en un div las diversas paginas del sistema
function enlacePag(pagina)
{
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById("cuerpo").innerHTML = this.responseText;

        // POR MEDIO DE ESTOS CONDICIONALES VERIFICAMOS CUANDO PULSA UN ENLACE QUE METODO CREEMOS EJECUTAR 
        if (pagina == "reporte_grado.html") {
           mostrarGrado();
        }
        else if(pagina == "registro_alumno.html"){
          generadorCodigo('txt_matricula');
        }
        else if(pagina == "registro_Grado.html"){
          generadorCodigo('txt_codigo');
        }
        else if(pagina == "registro_materia.html"){
          comboxG('registro_materia');
          generadorCodigo('txt_codigo');
        }
        else if(pagina == "reporte_alumno.html"){
          mostrarAlumno();
        }
        else if(pagina == "reporte_materia.html"){
          mostrarMateria();
        }
        else if(pagina == "reporte_profesor.html"){
          mostrarDocente();
        }
      }
    };
    xhttp.open("POST",pagina, true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send();
}

// ################################ METODO PARA ELIMINAR LOS DATOS DEL USUARIO ########################################

//funcion que nos permitira dar confirmacion de la eliminacion de un usuario 
function eliminar(pagina,e){
    
  var mensaje = confirm("¿Seguro quieres eliminar al usuario?");//Ingresamos un mensaje a mostrar
    
  //Detectamos si el usuario acepto el mensaje
  if (mensaje) {
      obtenerid(pagina,e)
  }
  else {
    alert("¡Haz denegado!");
    }
}

// ESTE METODO NOS PERMITE OBTNER EL ENLACE Y EL ID CONTENIDO IDENTIFICADO PARA SU ELIMINACION 
// Y NO ELIMINAR TODOS LOS DATOS MOSTRARDOS
function obtenerid(pagina,e){
   var xhttp = new XMLHttpRequest();
   var id = "id="+ e;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        
        if (pagina == "eliminarMateria.php") {
          alert("USUARIO ELIMINADO");
          mostrarMateria();
        }
        else if (pagina == "eliminar.php") {
          alert("USUARIO ELIMINADO");
          mostrarGrado();
        }
        else if (pagina == "eliminarDocente.php") {
          alert("USUARIO ELIMINADO");
          mostrarDocente();
        }
        else if (pagina == "eliminarAlumno.php") {
          alert("USUARIO ELIMINADO");
          mostrarAlumno();
        }
        else if (pagina == "eliminarNota.php") {
          alert("USUARIO ELIMINADO");
          mostrarNota();
        }    
      }
    };
    xhttp.open("POST","../php/procesos/"+pagina, true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send(id);
}

// ############## METODO DE LIMPIAR Y RECEPTOR DEL MESAJE DE AGREGADO O ACTUALIZADO   ################################


function limpiarCampos() {
    document.getElementById("formulario").reset(); 
    // IDENTIFICAMOS EL ID DEL FORMULARIO 
    // Y POR MEDIO DEL METODO RESET SE REINICIA LOS DATOS DEL FORMULARIO
    mensaje();// EJECUATAMOS EL METODO MENSAJE
}


function limpiarCamposN() {
    document.getElementById("tablaNota").innerHTML ="";
    limpiarCampos();
}


function mensaje(){

  // EN ESTE METODO UTILIZAMOS LA PROPIEDAD SETTIMEOUT LA CULPA CONSISTE 
  // EN EJECUTAR UNA FUNCION PERO AL TIEMPO QUE LE DECLARAMOS
  setTimeout(function(){ 
    document.getElementById("respuesta").innerHTML = ""; 
  }, 2200);
}

// ######################### METODO DE REGISTRAR LOS DATOS #################################################


// REGISTRO DE GRADO 
// ASIGNAMOS LAS VARIABLES CON LOS VALORES DE LOS CAMPOS Y LO ENVIAMOS AL SERVIDOR 
// LUEGO EJECUTAMOS UNA FUNCION PARA ENVIAR UNA RESPUESTA
// LUEGO SE EJECUTA EL METODO LIMPIAR CAMPOS
function Grado(){

    var xhttp = new XMLHttpRequest();

    var a = document.getElementById("txt_codigo").value;
    var b = document.getElementById("sel_nivel").value;
    var c = document.getElementById("txt_cantidad").value;
    var d = document.getElementById("txt_grado").value;
    var e = document.getElementById("txtar_observacion").value;

    var res = "codigo=" + a + "&nivel=" + b + "&cantidad="+ c + "&grado=" + d + "&observacion=" + e;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('respuesta').innerHTML = this.responseText;
        limpiarCampos();
      }
    };
    xhttp.open("POST", '../php/procesos/insertar.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(res);
}


// REGISTRO DE MATERIA 
// ASIGNAMOS LAS VARIABLES CON LOS VALORES DE LOS CAMPOS Y LO ENVIAMOS AL SERVIDOR 
// LUEGO EJECUTAMOS UNA FUNCION PARA ENVIAR UNA RESPUESTA
// LUEGO SE EJECUTA EL METODO LIMPIAR CAMPOS
function materia(){

    var xhttp = new XMLHttpRequest();

    var a = document.getElementById("txt_codigo").value;
    var b = document.getElementById("txt_materia").value;
    var c = document.getElementById("sel_jornada").value;
    var d = document.getElementById("sel_grado").value;

    var res = "codigo=" + a + "&materia=" + b + "&jornada="+ c + "&grado=" + d;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('respuesta').innerHTML = this.responseText;
        limpiarCampos();
      }
    };
    xhttp.open("POST", '../php/procesos/insertarMateria.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(res);
}


// REGISTRO DE DOCENTE
// ASIGNAMOS LAS VARIABLES CON LOS VALORES DE LOS CAMPOS Y LO ENVIAMOS AL SERVIDOR 
// LUEGO EJECUTAMOS UNA FUNCION PARA ENVIAR UNA RESPUESTA
// LUEGO SE EJECUTA EL METODO LIMPIAR CAMPOS
function docente(){

    var xhttp = new XMLHttpRequest();

    var a = document.getElementById("txt_cedula").value;
    var b = document.getElementById("txt_telefono").value;
    var c = document.getElementById("txt_celular").value;
    var d = document.getElementById("txt_nombres").value;
    var e = document.getElementById("txt_apellidos").value;
    var f = document.getElementById("txt_nacionalidad").value;
    var g = document.getElementById("sel_genero").value;

    var h = document.getElementById("sel_sangre").value;
    var i = document.getElementById("txt_discapacidad").value;
    var j = document.getElementById("dat_fecha").value;
    var k = document.getElementById("txt_edad").value;
    var l = document.getElementById("sel_etnia").value;
    var m = document.getElementById("txt_domicilio").value;
    var n = document.getElementById("txt_correoP").value;

    var o = document.getElementById("sel_nivel").value;
    var p = document.getElementById("txt_especialidad").value;
    var q = document.getElementById("txt_correoI").value;
    var r = document.getElementById("sel_turno").value;
    var s = document.getElementById("txtar_observacion").value;
   

    var res = "cedula="+ a + "&telefono="+ b + "&celular="+ c + "&nombres="+ d + "&apellidos="+ e + "&nacionalidad="+ f + "&genero="+ g ;
    res += "&sangre="+ h + "&discapacidad="+ i + "&fecha="+ j + "&edad="+ k + "&etnia="+ l + "&domicilio="+ m + "&correop=" + n;
    res += "&nivel="+ o + "&especialidad="+ p + "&correoi="+ q + "&turno="+ r + "&observacion="+ s; 

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('respuesta').innerHTML = this.responseText;
        limpiarCampos();
      }
    };
    xhttp.open("POST", '../php/procesos/insertarDocente.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(res);
}


// REGISTRO DE ALUMNO
// ASIGNAMOS LAS VARIABLES CON LOS VALORES DE LOS CAMPOS Y LO ENVIAMOS AL SERVIDOR 
// LUEGO EJECUTAMOS UNA FUNCION PARA ENVIAR UNA RESPUESTA
// LUEGO SE EJECUTA EL METODO LIMPIAR CAMPOS
function Alumno(){

    var xhttp = new XMLHttpRequest();

    var a = document.getElementById("txt_cedula").value;
    var b = document.getElementById("txt_telefono").value;
    var c = document.getElementById("txt_celular").value;
    var d = document.getElementById("txt_nombres").value;
    var e = document.getElementById("txt_apellidos").value;
    var f = document.getElementById("txt_nacionalidad").value;
    var g = document.getElementById("sel_genero").value;

    var h = document.getElementById("sel_sangre").value;
    var i = document.getElementById("txt_discapacidad").value;
    var j = document.getElementById("dat_fecha").value;
    var k = document.getElementById("txt_edad").value;
    var l = document.getElementById("sel_etnia").value;
    var m = document.getElementById("txt_domicilio").value;
    var n = document.getElementById("txt_correoP").value;
    var q = document.getElementById("txt_correoI").value;

    var o = document.getElementById("sel_estado").value;
    var p = document.getElementById("txt_matricula").value;
    var r = document.getElementById("dat_fechaM").value;
    var s = document.getElementById("dat_fechaI").value;

    var t = document.getElementById("sel_nivel").value;
    var u = document.getElementById("txt_Pinicial").value;
    var v = document.getElementById("txt_Pfinal").value;
    var x = document.getElementById("sel_grado").value;
    var w = document.getElementById("sel_jornada").value;
    var y = document.getElementById("sel_procedencia").value;
   

    var res = "cedula="+ a + "&telefono="+ b + "&celular="+ c + "&nombres="+ d + "&apellidos="+ e + "&nacionalidad="+ f + "&genero="+ g ;
    res += "&sangre="+ h + "&discapacidad="+ i + "&fecha="+ j + "&edad="+ k + "&etnia="+ l + "&domicilio="+ m + "&correop=" + n;
    res += "&nivel="+ t + "&estado="+ o + "&correoi="+ q + "&matricula="+ p + "&fechaM="+ r + "&fechaI="+ s;
    res += "&periodoI="+ u + "&periodoF="+ v + "&grado="+ x + "&jornada="+ w + "&procedencia="+ y; 

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('respuesta').innerHTML = this.responseText;
        limpiarCampos();
      }
    };
    xhttp.open("POST", '../php/procesos/insertarAlumno.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(res);
}


// REGISTRO DE NOTA
// ASIGNAMOS LAS VARIABLES CON LOS VALORES DE LOS CAMPOS Y LO ENVIAMOS AL SERVIDOR 
// LUEGO EJECUTAMOS UNA FUNCION PARA ENVIAR UNA RESPUESTA
// LUEGO SE EJECUTA EL METODO LIMPIAR CAMPOS
function Nota(id){

    var xhttp = new XMLHttpRequest();

    var a = document.getElementById("sel_grado").value;
    var b = document.getElementById("sel_nivel").value;
    var c = document.getElementById("sel_materia").value;
    var d = document.getElementById("sel_quimestre").value;
    var f = document.getElementById("txt_nota1"+id).value;
    var g = document.getElementById("txt_nota2"+id).value;
    var h = document.getElementById("txt_nota3"+id).value;
    var i = document.getElementById("txt_promedio"+id).value;

    var res = "grado=" + a + "&nivel=" + b + "&materia="+ c + "&quimestre=" + d + "&alumno=" + id + "&nota1=" + f + "&nota2="+ g + "&nota3="+ h + "&promedio="+ i;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('respuesta').innerHTML = this.responseText;
        mensaje();
        var tr = document.getElementById('tr_rem');
        tr.remove();
      }
    };
    xhttp.open("POST", '../php/procesos/insertarNota.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(res);
}


//############################ METODO MOSTRAR LOS DATOS ###################################################

// MOSTRAR LOS DATOS DE GRADO 
// LUEGO EJECUTAMOS UNA FUNCION PARA RECEPTAR UNA RESPUESTA DEL SERVIDOR
function mostrarGrado()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById("res").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST","../php/procesos/mostrar.php", true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send();
}


// MOSTRAR LOS DATOS DE MATERIA
// LUEGO EJECUTAMOS UNA FUNCION PARA RECEPTAR UNA RESPUESTA DEL SERVIDOR
function mostrarMateria()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById("res").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST","../php/procesos/mostrarMateria.php", true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send();
}


// MOSTRAR LOS DATOS DE DOCENTE
// LUEGO EJECUTAMOS UNA FUNCION PARA RECEPTAR UNA RESPUESTA DEL SERVIDOR
function mostrarDocente()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById("res").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST","../php/procesos/mostrarDocente.php", true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send();
}


// MOSTRAR LOS DATOS DE ALUMNO
// LUEGO EJECUTAMOS UNA FUNCION PARA RECEPTAR UNA RESPUESTA DEL SERVIDOR
function mostrarAlumno()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById("res").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST","../php/procesos/mostrarAlumno.php", true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send();
}


// MOSTRAR LOS DATOS DE NOTA
// LUEGO EJECUTAMOS UNA FUNCION PARA RECEPTAR UNA RESPUESTA DEL SERVIDOR
function mostrarNota()
{  
    var xhttp = new XMLHttpRequest();

    var selG = document.getElementById('sel_grado').value; 
    var selN = document.getElementById('sel_nivel').value; 
    var selM = document.getElementById('sel_materia').value;
    var selQ = document.getElementById('sel_quimestre').value;

    var env = "selG=" + selG + "&selN=" + selN + "&selM=" + selM + "&selQ=" + selQ;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById("tablaNota").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST","../php/procesos/mostrarNota.php", true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send(env);
}

//################# METODO DE MOSTRAR CONTENDIO PARA LA ACTUALIZACION DE LOS DATOS ##########################

// MOSTRAR CONTENDIO DE GRADO
// EN LA FUNCION ENVIAMOS UN PARAMETROS PARA IDENTIFICAR EL ID QUE QUIEN QUIEREE SER ACTUALIZADO
function mostrarContenido(e)
{
    var xhttp = new XMLHttpRequest();

    var id = "id="+ e;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById("vista").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST","../php/procesos/contenido.php", true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send(id);
}


// MOSTRAR CONTENDIO DE DOCENTE
// EN LA FUNCION ENVIAMOS UN PARAMETROS PARA IDENTIFICAR EL ID QUE QUIEN QUIEREE SER ACTUALIZADO
function ContenidoDocente(e)
{
    var xhttp = new XMLHttpRequest();

    var id = "id="+ e;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById("vista").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST","../php/procesos/contenidoDocente.php", true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send(id);
}


// MOSTRAR CONTENDIO DE MATERIA
// EN LA FUNCION ENVIAMOS UN PARAMETROS PARA IDENTIFICAR EL ID QUE QUIEN QUIEREE SER ACTUALIZADO
function ContenidoMateria(e)
{
    var xhttp = new XMLHttpRequest();

    var id = "id="+ e;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById("vista").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST","../php/procesos/ContenidoMateria.php", true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send(id);
}


// MOSTRAR CONTENDIO DE ALUMNO
// EN LA FUNCION ENVIAMOS UN PARAMETROS PARA IDENTIFICAR EL ID QUE QUIEN QUIEREE SER ACTUALIZADO
function contenidoAlumno(e)
{
    var xhttp = new XMLHttpRequest();

    var id = "id="+ e;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById("vista").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST","../php/procesos/contenidoAlumno.php", true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send(id);
}


// MOSTRAR CONTENDIO DE NOTA
// EN LA FUNCION ENVIAMOS UN PARAMETROS PARA IDENTIFICAR EL ID QUE QUIEN QUIEREE SER ACTUALIZADO
function contenidoNota()
{
    var xhttp = new XMLHttpRequest();

    var sel = document.getElementById('sel_grado').value; 
    var sel2 = document.getElementById('sel_nivel').value; 
    var sel3 = document.getElementById('sel_materia').value; 

    var en = "selG=" + sel + "&selN=" + sel2 + "&selM=" + sel3;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById("tablaNota").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST","../php/procesos/contenidoNota.php", true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send(en);
}


//#################### METODO PARA EL ENLACE DE MOSTARAR CONTENIDO DE LA ACTUALIZACION ###############################

// METODO DE ENLACE DONDE NOS PERMITIRA REENVIAR A LA PAGINA ACTUALIZAR Y SU DATOS
// EN LA FUNCION ENVIAMOS DOS PARAMETROS UNO PARA LA PAGINA Y EL OTRO EL IDENTIFICADOR
function enlace(pagina,e)
{
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById("cuerpo").innerHTML = this.responseText;

        //POR MEDIO DE ESTOS CONDICIONALES VERIFICAMOS LAS PAGINAS DE ACTUALIZACION DE CADA OPCION
        //DESPUES DE VERIFICAR SE EJECUTAR EL TRASLADO DE DATOS EN LA PAGINA DE ACTUALIZACION EN LOS RESPECTIVOS CAMPOS

        if (pagina == "actualizar_grado.html") {
           mostrarContenido(e);
        }
        else if(pagina == "actualizar_materia.html"){
           ContenidoMateria(e);
        }
        else if(pagina == "actualizar_profesor.html"){
           ContenidoDocente(e);
        }
        else if(pagina == "actualizar_alumno.html"){
           contenidoAlumno(e);
        }
        else if(pagina == "actualizar_nota.html"){
           contenidoNota(e);
        }
      }
    };
    xhttp.open("POST",pagina, true);
    xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhttp.send();
}

//#################### METODO DE ACTUALIZAR ##################################


//ACTUALIZAR GRADO
//EN ESTAS FUNCION ENVIAREMOS LOS DATOS NUEVOS PARA ACTUALIZAR EL CONTENIDO RESPECTIVO
//ENVIAMOS UN PARAMETROS PARA IDENTIFICAR EL ID DE QUIEN VA A SER ACTUALIZADO
function UGrado(id){

    var xhttp = new XMLHttpRequest();

    var a = document.getElementById("txt_codigo").value;
    var b = document.getElementById("sel_nivel").value;
    var c = document.getElementById("txt_cantidad").value;
    var d = document.getElementById("txt_grado").value;
    var e = document.getElementById("txtar_observacion").value;

    var res = "codigo=" + a + "&nivel=" + b + "&cantidad="+ c + "&grado=" + d + "&observacion=" + e + "&id="+ id;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('respuesta').innerHTML = this.responseText;
        mensaje();
      }
    };
    xhttp.open("POST", '../php/procesos/actualizar.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(res);
}

//ACTUALIZAR MATERIA
//EN ESTAS FUNCION ENVIAREMOS LOS DATOS NUEVOS PARA ACTUALIZAR EL CONTENIDO RESPECTIVO
//ENVIAMOS UN PARAMETROS PARA IDENTIFICAR EL ID DE QUIEN VA A SER ACTUALIZADO
function Umateria(id){

    var xhttp = new XMLHttpRequest();

    var a = document.getElementById("txt_codigo").value;
    var b = document.getElementById("txt_materia").value;
    var c = document.getElementById("sel_jornada").value;
    var d = document.getElementById("sel_grado").value;

    var res = "codigo=" + a + "&materia=" + b + "&jornada="+ c + "&grado=" + d + "&id=" + id;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('respuesta').innerHTML = this.responseText;
        mensaje();
      }
    };
    xhttp.open("POST", '../php/procesos/actualizarMateria.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(res);
}

//ACTUALIZAR DOCENTE
//EN ESTAS FUNCION ENVIAREMOS LOS DATOS NUEVOS PARA ACTUALIZAR EL CONTENIDO RESPECTIVO
//ENVIAMOS UN PARAMETROS PARA IDENTIFICAR EL ID DE QUIEN VA A SER ACTUALIZADO
function Udocente(id){

    var xhttp = new XMLHttpRequest();

    var a = document.getElementById("txt_cedula").value;
    var b = document.getElementById("txt_telefono").value;
    var c = document.getElementById("txt_celular").value;
    var d = document.getElementById("txt_nombres").value;
    var e = document.getElementById("txt_apellidos").value;
    var f = document.getElementById("txt_nacionalidad").value;
    var g = document.getElementById("sel_genero").value;

    var h = document.getElementById("sel_sangre").value;
    var i = document.getElementById("txt_discapacidad").value;
    var j = document.getElementById("dat_fecha").value;
    var k = document.getElementById("txt_edad").value;
    var l = document.getElementById("sel_etnia").value;
    var m = document.getElementById("txt_domicilio").value;
    var n = document.getElementById("txt_correoP").value;

    var o = document.getElementById("sel_nivel").value;
    var p = document.getElementById("txt_especialidad").value;
    var q = document.getElementById("txt_correoI").value;
    var r = document.getElementById("sel_turno").value;
    var s = document.getElementById("txtar_observacion").value;
   

    var res = "cedula="+ a + "&telefono="+ b + "&celular="+ c + "&nombres="+ d + "&apellidos="+ e + "&nacionalidad="+ f + "&genero="+ g ;
    res += "&sangre="+ h + "&discapacidad="+ i + "&fecha="+ j + "&edad="+ k + "&etnia="+ l + "&domicilio="+ m + "&correop=" + n;
    res += "&nivel="+ o + "&especialidad="+ p + "&correoi="+ q + "&turno="+ r + "&observacion="+ s + "&id=" + id;


    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('respuesta').innerHTML = this.responseText;
        mensaje();
      }
    };
    xhttp.open("POST", '../php/procesos/actualizarDocente.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(res);
}

//ACTUALIZAR ALUMNO
//EN ESTAS FUNCION ENVIAREMOS LOS DATOS NUEVOS PARA ACTUALIZAR EL CONTENIDO RESPECTIVO
//ENVIAMOS UN PARAMETROS PARA IDENTIFICAR EL ID DE QUIEN VA A SER ACTUALIZADO
function Ualumno(id){

    var xhttp = new XMLHttpRequest();

    var a = document.getElementById("txt_cedula").value;
    var b = document.getElementById("txt_telefono").value;
    var c = document.getElementById("txt_celular").value;
    var d = document.getElementById("txt_nombres").value;
    var e = document.getElementById("txt_apellidos").value;
    var f = document.getElementById("txt_nacionalidad").value;
    var g = document.getElementById("sel_genero").value;

    var h = document.getElementById("sel_sangre").value;
    var i = document.getElementById("txt_discapacidad").value;
    var j = document.getElementById("dat_fecha").value;
    var k = document.getElementById("txt_edad").value;
    var l = document.getElementById("sel_etnia").value;
    var m = document.getElementById("txt_domicilio").value;
    var n = document.getElementById("txt_correoP").value;
    var q = document.getElementById("txt_correoI").value;

    var o = document.getElementById("sel_estado").value;
    var p = document.getElementById("txt_matricula").value;
    var r = document.getElementById("dat_fechaM").value;
    var s = document.getElementById("dat_fechaI").value;

    var t = document.getElementById("sel_nivel").value;
    var u = document.getElementById("txt_Pinicial").value;
    var v = document.getElementById("txt_Pfinal").value;
    var x = document.getElementById("sel_grado").value;
    var w = document.getElementById("sel_jornada").value;
    var y = document.getElementById("sel_procedencia").value;
   

    var res = "cedula="+ a + "&telefono="+ b + "&celular="+ c + "&nombres="+ d + "&apellidos="+ e + "&nacionalidad="+ f + "&genero="+ g ;
    res += "&sangre="+ h + "&discapacidad="+ i + "&fecha="+ j + "&edad="+ k + "&etnia="+ l + "&domicilio="+ m + "&correop=" + n;
    res += "&nivel="+ t + "&estado="+ o + "&correoi="+ q + "&matricula="+ p + "&fechaM="+ r + "&fechaI="+ s;
    res += "&periodoI="+ u + "&periodoF="+ v + "&grado="+ x + "&jornada="+ w + "&procedencia="+ y + "&id=" + id;


    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('respuesta').innerHTML = this.responseText;
        mensaje();
      }
    };
    xhttp.open("POST", '../php/procesos/actualizarAlumno.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(res);
}


//ACTUALIZAR NOTA
//EN ESTAS FUNCION ENVIAREMOS LOS DATOS NUEVOS PARA ACTUALIZAR EL CONTENIDO RESPECTIVO
//ENVIAMOS UN PARAMETROS PARA IDENTIFICAR EL ID DE QUIEN VA A SER ACTUALIZADO
function Unota(id){

    var xhttp = new XMLHttpRequest();

    var f = document.getElementById("txt_nota1"+id).value;
    var g = document.getElementById("txt_nota2"+id).value;
    var h = document.getElementById("txt_nota3"+id).value;
    var i = document.getElementById("txt_promedio"+id).value;

    var res ="nota1=" + f + "&nota2="+ g + "&nota3="+ h + "&promedio="+ i + "&id=" + id;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('respuesta').innerHTML = this.responseText;
        mensaje();
      }
    };
    xhttp.open("POST", '../php/procesos/actualizarNota.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(res);
}


//################ METODO DE COMBO BOX #########################################

//METODO COMBOX DE GRADO
//EN ESTA FUNCION NOS PERMITIRA CARGAR LOS DATOS DE LA TABLA QUE ESTEN RELACONADAS 
function comboxG(pagina){

    var xhttp = new XMLHttpRequest();

     if (pagina == "registro_alumno") {
      
        var selN = document.getElementById('sel_nivel').value; 

        var envioP = "pagina="+pagina + "&sel=" +selN;  

        xhttp.onreadystatechange = function() 
        {
          if (this.readyState == 4 && this.status == 200)
          { 
            document.getElementById('sel_grado').innerHTML = this.responseText; 
          }
        };
        xhttp.open("POST","../php/procesos/combGrado.php", true);
        xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhttp.send(envioP);

    }
    else if (pagina == "registro_nota"){

        var selN = document.getElementById('sel_nivel').value; 

        var envioP = "pagina="+pagina + "&sel=" +selN;  

        xhttp.onreadystatechange = function() 
        {
          if (this.readyState == 4 && this.status == 200)
          { 
            document.getElementById('sel_grado').innerHTML = this.responseText; 
          }
        };
        xhttp.open("POST","../php/procesos/combGrado.php", true);
        xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhttp.send(envioP);
    }

    else if (pagina == "registro_materia"){
       
        var envioP = "pagina="+pagina;  

        xhttp.onreadystatechange = function() 
        {
          if (this.readyState == 4 && this.status == 200)
          { 
            document.getElementById('sel_grado').innerHTML = this.responseText; 
          }
        };
        xhttp.open("POST","../php/procesos/combGrado.php", true);
        xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhttp.send(envioP);
    }
}

//METODO COMBOX DE MATERIA
//EN ESTA FUNCION NOS PERMITIRA CARGAR LOS DATOS DE LA TABLA QUE ESTEN RELACONADAS
function comboxM(){

    var xhttp = new XMLHttpRequest();

    var selG = document.getElementById('sel_grado').value; 

    var envioG = "selG=" + selG;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('sel_materia').innerHTML = this.responseText;     
      }
    };
    xhttp.open("POST", '../php/procesos/combMateria.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(envioG);
}



//###################### METODO BUSCAR ######################################

//FUNCION BUSCAR

function buscar(pagina,datos){

  var xhttp = new XMLHttpRequest();

// CONDICION PARA ALUMNO
 if (pagina == "reporte_alumno") {
      if (datos.length == "") {
        mostrarAlumno();
      }
      else{
        
        var envio = "pagina="+pagina +"&datos=" + datos;  

        xhttp.onreadystatechange = function() 
        {
          if (this.readyState == 4 && this.status == 200)
          { 
            document.getElementById("res").innerHTML = this.responseText;
          }
        };
        xhttp.open("POST","../php/procesos/buscar.php", true);
        xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhttp.send(envio);
      }
  }

  // CONDICION PARA DOCENTE
  else if (pagina == "reporte_profesor") {
      if (datos.length == "") {
        mostrarDocente();
      }
      else{
        var envio = "pagina="+pagina +"&datos=" + datos;  

        xhttp.onreadystatechange = function() 
        {
          if (this.readyState == 4 && this.status == 200)
          { 
            document.getElementById("res").innerHTML = this.responseText;
          }
        };
        xhttp.open("POST","../php/procesos/buscar.php", true);
        xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhttp.send(envio);
      }
  }

  // CONDICION PARA GRADO
  else if (pagina == "reporte_grado") {
      if (datos.length == "") {
        mostrarGrado();
      }
      else{
        var envio = "pagina="+pagina +"&datos=" + datos;  

        xhttp.onreadystatechange = function() 
        {
          if (this.readyState == 4 && this.status == 200)
          { 
            document.getElementById("res").innerHTML = this.responseText;
          }
        };
        xhttp.open("POST","../php/procesos/buscar.php", true);
        xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhttp.send(envio);
      }
  }

  // CONDICION PARA MATERIA
  else if (pagina == "reporte_materia") {
      if (datos.length == "") {
        mostrarMateria();
      }
      else{
        var envio = "pagina="+pagina +"&datos=" + datos;  

        xhttp.onreadystatechange = function() 
        {
          if (this.readyState == 4 && this.status == 200)
          { 
            document.getElementById("res").innerHTML = this.responseText;
          }
        };
        xhttp.open("POST","../php/procesos/buscar.php", true);
        xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhttp.send(envio);
      }
  }

  // CONDICION PARA NOTA
  else if (pagina == "reporte_nota") {
      if (datos.length == "") {
        mostrarNota();
      }
      else{
        var envio = "pagina="+pagina +"&datos=" + datos;  

        xhttp.onreadystatechange = function() 
        {
          if (this.readyState == 4 && this.status == 200)
          { 
            document.getElementById("res").innerHTML = this.responseText;
          }
        };
        xhttp.open("POST","../php/procesos/buscar.php", true);
        xhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhttp.send(envio);
      }
  }
}

//############################ CALCULAR EDAD POR MEDIO DE LA FECHA DE NACIMIENTO #####################
function Edad() {

    var fecha = document.getElementById('dat_fecha').value;

    var fechaNace = new Date(fecha);
    var fechaActual = new Date()

    var mes = fechaActual.getMonth();
    var dia = fechaActual.getDate();
    var año = fechaActual.getFullYear();

    fechaActual.setDate(dia);
    fechaActual.setMonth(mes);
    fechaActual.setFullYear(año);

    edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));
   
    return edad;
}

//################### FUNCION PARA MOSTRAR LA EDAD EN EL CAMPO DE TEXTO ########################
function mostrarEdad(){

  Edad()
  
  var edad = Edad();

  document.getElementById('txt_edad').value = edad;

}

//###################### FUNCION IMPRIMIR #########################################

function imprimir(pagina,e)
{    
    window.open("../php/procesos/"+ pagina + "?id="+ e);  
}

//++++==+++++++++++++++++++++++++++++++++++++++
 //onclick="Nota()"

function infoAlumno(){

    var xhttp = new XMLHttpRequest();

    var sel = document.getElementById('sel_grado').value; 
    var sel2 = document.getElementById('sel_nivel').value; 
    var sel3 = document.getElementById('sel_materia').value;
    var sel4 = document.getElementById('sel_quimestre').value; 

    var en = "selG=" + sel + "&selN=" + sel2 + "&selM=" + sel3 + "&selQ=" + sel4;

    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200)
      { 
        document.getElementById('tablaNota').innerHTML = this.responseText; 
      }
    };
    xhttp.open("POST", '../php/procesos/infoAlumno.php', true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(en);
}


function generadorCodigo(id){

      var cod ="1234567890";

      var codNum = "";
      
      for (var i = 0; i < 4; i++) {
        var gen = Math.floor(Math.random()*cod.length);
        codNum =codNum + cod[gen];
      } 
      document.getElementById(id).value = codNum;
}


function sumPromedio(id){

    var num1 = parseInt(document.getElementById('txt_nota1'+id).value);
    var num2 = parseInt(document.getElementById('txt_nota2'+id).value);
    var num3 = parseInt(document.getElementById('txt_nota3'+id).value); 

    var prom = (num1 +num2+ num3)/3;

    document.getElementById('txt_promedio'+id).value = prom.toFixed(2); 
    
}
