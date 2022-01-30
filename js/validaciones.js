// JavaScript Document
var rep=0;
var mensajeerror = '';
function validaNombres(e){
	var nombres = document.getElementById("nombres");
        var texto = nombres.value;
        
        nombres.value = validarSoloTexto(texto);
       
}
function validaApellidos(e){
	var nombres = document.getElementById("apellidos");
        var texto = nombres.value;

        nombres.value = validarSoloTexto(texto);

}
function validaTelefono(e){
	var nombres = document.getElementById("telefono");
        var texto = nombres.value;

        nombres.value = validarSoloNumero(texto);

}
function validaCiudad(e){
	var nombres = document.getElementById("ciudad");
        var texto = nombres.value;

        nombres.value = validarSoloTexto(texto);

}

function validaUser(e){
	var nombres = document.getElementById("usuario");
        var texto = nombres.value;
        
        nombres.value = validarSoloTextoMinuscula(texto);

}
function validaMail(e){
	var nombres = document.getElementById("email");
        var texto = nombres.value;

        nombres.value = validarMail(texto);

}
function validarSoloTextoMinuscula(value)
{
    var patron =/[a-z]/;
    var a=0;
    var cont=0;
    var nueva = "";
    for(a=0;a<value.length;a++)
    {

        tecla = value.charAt(a);
        if(patron.test(tecla))
                nueva  = nueva + tecla;

    }
    return nueva;


}
function validarSoloTexto(value)
{
    var patron =/[A-Za-z\xe1\xe9\xed\xf3\xfa\s]/;
    var a=0;
    var cont=0;
    var nueva = "";
    for(a=0;a<value.length;a++)
    {

        tecla = value.charAt(a);
        if(patron.test(tecla))
                nueva  = nueva + tecla;

    }
    return nueva;


}
function validarMail(value)
{
    var patron = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    var a=0;
    var cont=0;
    var nueva = "";
    for(a=0;a<value.length;a++)
    {

        tecla = value.charAt(a);
        if(patron.test(tecla))
                nueva  = nueva + tecla;
            
    }
    return nueva;


}

function validarEmail(valor) {

   var mail = valor.split("@");
   if(mail.length==2)
   {
		if(mail[0].length<11&&mail[1]=="espol.edu.ec")
			return 1;
   }
   return 0;

}
function validarSoloNumero(value)
{
    var patron =/\d/;
    var a=0;
    var cont=0;
    var nueva = "";
    for(a=0;a<value.length;a++)
    {

        tecla = value.charAt(a);
        if(patron.test(tecla))
                nueva  = nueva + tecla;

    }
    return nueva;

}

function validar(){
    mensajeerror = '';
    
    var nombres = document.getElementById("nombres");
    var apellidos = document.getElementById("apellidos");
    var telefono = document.getElementById("telefono");
    var usuario = document.getElementById("usuario");
    var clave = document.getElementById("pass");
    var clave2 = document.getElementById("pass2");
    var mail = document.getElementById("email");
	var respuesta = document.getElementById("respuesta");
	var materia1 = document.getElementById("materia1");
    if(nombres.value==''){
        mensajeerror = "* El campo Nombres no puede estar vacio.";
        nombres.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(apellidos.value==''){
        mensajeerror = "* El campo Apellidos no puede estar vacio.";
        apellidos.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(telefono.value==''){
        mensajeerror = "* El campo tel\xe9fono no puede estar vacio.";
        telefono.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(telefono.value.length<9){
        mensajeerror = "* El n\xfamero de telefono debe tener 9 d\xedgitos.";
        telefono.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(usuario.value==''){
        mensajeerror = "* El campo Usuario no puede estar vacio.";
        usuario.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(clave.value==''){
        mensajeerror = "* El campo Clave no puede estar vacio.";
        clave.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(clave2.value==''){
        mensajeerror = "* El campo Confirmar clave no puede estar vacio.";
        clave2.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
	else if(respuesta.value==''){
        mensajeerror = "* El campo de la respuesta no puede estar vacio.";
        respuesta.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(mail.value==''){
        mensajeerror = "* El campo e-mail no puede estar vacio.";
        mail.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    
    
    else if(clave.value!=clave2.value){
       
        mensajeerror = "* No concuerda la verificaci\xf3n de la clave .";
        clave.value='';
        clave2.value='';
        clave.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(validarEmail(mail.value)==0)
    {
        mensajeerror = "* El mail ingresado no es v\xe1lido.";
        mail.focus();
		mostrarMensaje(mensajeerror);
        return false;
    }
    else if(materia1.value=='')
    {
        mensajeerror = "* Debe agregar por lo menos una materia.";
        mostrarMensaje(mensajeerror);
        return false;
    }
    if(mensajeerror != '')
        mostrarMensaje(mensajeerror);
    else
        return true;
    return false;

}

function validarActualizar(){
    mensajeerror = '';

    var nombres = document.getElementById("nombres");
    var apellidos = document.getElementById("apellidos");
    var cedula = document.getElementById("cedula");
    var ciudad = document.getElementById("ciudad");
    
    var clave = document.getElementById("pass");
    var clave2 = document.getElementById("pass2");
    var mail = document.getElementById("email");
    if(nombres.value==''){
        mensajeerror = "* El campo Nombres no puede estar vacio.";
        nombres.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(apellidos.value==''){
        mensajeerror = "* El campo Apellidos no puede estar vacio.";
        apellidos.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(cedula.value==''){
        mensajeerror = "* El campo C\xe9dula no puede estar vacio.";
        cedula.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(ciudad.value==''){
        mensajeerror = "* El campo Ciudad no puede estar vacio.";
        ciudad.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    
    else if(clave.value==''){
        mensajeerror = "* El campo Clave no puede estar vacio.";
        clave.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(clave2.value==''){
        mensajeerror = "* El campo Confirmar clave no puede estar vacio.";
        alert("asd");
        clave2.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(mail.value==''){
        mensajeerror = "* El campo e.mail no puede estar vacio.";
        mail.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(cedula.value.length>0&&cedula.value.length<10){
        mensajeerror = "* El n\xfamero de c\xe9dula debe tener 10 d\xedgitos.";
        cedula.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    
    else if(clave.value!=clave2.value){

        mensajeerror = "* No concuerda la verificaci\xf3n de la clave .";
        clave.value='';
        clave2.value='';
        clave.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(validarEmail(mail.value)==0)
    {
        mensajeerror = "* El mail ingresado no es v\xe1lido.";
        mail.focus();
        return false;
    }
    else if(materia1.value=='')
    {
        mensajeerror = "* Debe agregar por lo menos una materia.";
        
        return false;
    }
    if(mensajeerror != '')
        mostrarMensaje(mensajeerror);
    else
        return true;
    return false;

}
function mostrarMensaje(mensaje)
{
    
    var tr = document.getElementById("trmensaje");
    var td1=document.createElement("td");
    var td2=document.createElement("td");
    var span=document.createElement("span");
    
    
    while(tr.hasChildNodes())
        tr.removeChild(tr.firstChild);

   
    td1.setAttribute("class","tdname");
    td2.setAttribute("class","tdinput");
    
    
    span.setAttribute("id","advert");
    span.setAttribute("style","color:red;font-size:12px");

    
    tr.appendChild(td1);
    tr.appendChild(td2);
    td2.appendChild(span);
    span.appendChild(document.createTextNode(mensaje));


}
function validarUser(user,mail,cedula){
        var xhr = createXMLHttpRequest() ;
	xhr.open("GET","../Controlador?accion=verificarUser&usuario="+user+"&email="+mail+"&cedula="+cedula,true);
	xhr.onreadystatechange=function(){callback(xhr);}
	xhr.send(null);
}
function callback(xhr){
    var mensajeuser;
    var mensajemail;
    var mensajecedula;
    var xml;
    
    if (xhr.readyState == 4)  {
                
		if (xhr.status == 200)  {
                        
			xml = xhr.responseXML.getElementsByTagName("verificar");
			mensajeuser = xml[0].getElementsByTagName("mensajeuser")[0].firstChild.nodeValue;
                        mensajemail = xml[0].getElementsByTagName("mensajemail")[0].firstChild.nodeValue;
                        mensajecedula = xml[0].getElementsByTagName("mensajecedula")[0].firstChild.nodeValue;
                        
                        if(mensajemail!="ok")
                            mensajeerror = "* El mail ya ha sido ingresado. Ingrese otro por favor.";
                        else if(mensajeuser!="ok")
                            mensajeerror = "* El usuario ingresado ya ha sido escogido. Ingrese otro por favor.";
                        else if(mensajecedula!="ok")
                            mensajeerror = "* El n\xfamero de c\xe9dula ya ha sido ingresado.";
                        else
                            mensajeerror = '';
                }
        }
}



function createXMLHttpRequest() {
    var xmlHttp;
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    }
    return xmlHttp;
}
function validarCambio(){
    var pass1 = document.getElementById("pass");
    var pass2 = document.getElementById("pass2");
    var mensajeerror;
    if(pass1.value!=pass2.value)
    {
        mensajeerror = "* No concuerda la verificaci\xf3n de la clave .";
        pass1.value='';
        pass2.value='';
        pass1.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    return true;
    
}

function validaUser2(){
        
        var user = document.getElementById("user");
       
        if(user.value=='')
        {
            mensajeerror = "* Debe ingresar su usuario .";
            user.focus();
            mostrarMensaje(mensajeerror);
            return false;
        }
        
        validarUser2(user.value);
        alert("Su usuario se esta verificando... ");
        if(mensajeerror != '')
            mostrarMensaje(mensajeerror);
        else
            return true;
        return false;
	
}
function validarUser2(user){
        var xhr = createXMLHttpRequest() ;
	xhr.open("GET","../Controlador?accion=verificarUser2&usuario="+user,true);
	xhr.onreadystatechange=function(){callback2(xhr);}
	xhr.send(null);
}
function callback2(xhr){
    var mensajeuser;
    var xml;
    var user = document.getElementById("user");
    
     if (xhr.readyState==1) {

         }
    else if (xhr.readyState == 4)  {
                
		if (xhr.status == 200)  {

			xml = xhr.responseXML.getElementsByTagName("verificar");
			mensajeuser = xml[0].getElementsByTagName("mensajeuser")[0].firstChild.nodeValue;
                        
                        if(mensajeuser!="ok")
                            mensajeerror = "* El usuario ingresado no existe.";
                        else
                            mensajeerror = '';
                }
        }
}

function validaLogin(){
    var user = document.getElementById("user");
    var pass = document.getElementById("pass");

    if(user.value=='')
    {
            alert("Ingrese su usuario");
            user.focus();
            return false;

    }
    if(pass.value=='')
    {
            alert("Ingrese su clave");
            pass.focus();
            return false;

    }
    return true;


}
function validarUsuarioRecuperar(){
	    var user = document.getElementById("usuario");

    if(user.value=='')
    {
            alert("Ingrese su usuario");
            user.focus();
            return false;

    }
	return true;

}
function validarRespuestaRecuperar(){
	    var user = document.getElementById("respuesta2");

    if(user.value=='')
    {
            alert("Ingrese su respuesta");
            user.focus();
            return false;

    }
	return true;

}
function validarClaveRecuperar(){
	    var clave = document.getElementById("pass");
    var clave2 = document.getElementById("pass2");
	
	if(clave.value==''){
        mensajeerror = "* El campo Clave no puede estar vacio.";
        clave.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
    else if(clave2.value==''){
        mensajeerror = "* El campo Confirmar clave no puede estar vacio.";
        clave2.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
	if(clave.value!=clave2.value){
       
        mensajeerror = "* No concuerda la verificaci\xf3n de la clave.";
        clave.value='';
        clave2.value='';
        clave.focus();
        mostrarMensaje(mensajeerror);
        return false;
    }
	return true;
    

}
function obtenerFecha(){
	var excel = document.getElementById("excel");
	var fecha = document.getElementById("fecha");
	var lab = document.getElementById("labescogido");
	if(fecha.value!="")
		excel.setAttribute("href","exportar.php?lab="+lab.value+"&fecha="+fecha.value);
	else
	{
		alert("Escoja una fecha");
		excel.setAttribute("href","#");
	}


}