






/////  <input type="radio" name="materia" onClick="escogercliente('<?php echo $datocliente['idespe'] ?>','<?php echo $datocliente['descri'] ?>','<?php echo $datocliente['prequi'] ?>','<?php echo $datocliente['impue'] ?>','<?php echo $datocliente['cantidad'] ?>

function escogercliente(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10)
{
	
		
	var cedula1 = document.getElementById("codipe");
	cedula1.value = id1;
	
		var nombres1 = document.getElementById("nombre");
	nombres1.value = id2;
	
			var direcion1 = document.getElementById("apellido");
	direcion1.value = id3;
	
			var telefono1= document.getElementById("apellidoma");
	telefono1.value = id4;
	
		var telefono51= document.getElementById("fechana");
	telefono51.value = id5;
	
	var telefono511= document.getElementById("genero");
	telefono511.value = id6;
	
	var telefono512= document.getElementById("pais");
	telefono512.value = id7;
	
	var telefono513= document.getElementById("provincia");
	telefono513.value = id8;
	
	var telefono514= document.getElementById("ciudad");
	telefono514.value = id9;
	
	var te= document.getElementById("veri");
	te.value = id10;
	
	
	//son muy importantes pone disable un control, pone visible e invisible y asina un valor a un select
//	document.formName.enviar.disabled=!document.formName.enviar.disabled
	
//	document.formName.enviar.style.display='none'; 
	
//	document.formName.enviar.style.display='block'; 
//document.forms["formName"]["padre"].value = cedula1.value;
	
	
	//document.forms["tuForm"]["tuSelect"].value = "tuDato";
	
	//var popular1 = new Option("Rock de los 90","Rock1","","");
    //var popular2 = new Option("Rock de los 80","Rock2","","");
    //combo[0] = popular1;
    //combo[1] = popular2;
	//document.forms.form1.mes.options[x]=new Option(texto,valor,"defaultSelected");
	//document.formName.padre.options[]=new Option(fdsfgg,0,"defaultSelected");
	
	
	
		//window.location.href = 'dato.php?id=' + cliente2.value + '&id1='+usuarioagregado.value;	 block
}

function escogeresposo(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,id11,id12,id13,id14,id15,id16,id17)
{
	
		
	var cedula1 = document.getElementById("codipe");
	cedula1.value = id1;
	
		var nombres1 = document.getElementById("nombre");
	nombres1.value = id2;
	
			var direcion1 = document.getElementById("apellido");
	direcion1.value = id3;
	
			var telefono1= document.getElementById("apellidoma");
	telefono1.value = id4;
	
		var telefono51= document.getElementById("fechana");
	telefono51.value = id5;
	
	var telefono511= document.getElementById("genero");
	telefono511.value = id6;
	
	var telefono512= document.getElementById("pais");
	telefono512.value = id7;
	
	var telefono513= document.getElementById("provincia");
	telefono513.value = id8;
	
	var telefono514= document.getElementById("ciudad");
	telefono514.value = id9;
	
	var te= document.getElementById("veri");
	te.value = id10;
	
	var te1= document.getElementById("local");
	te1.value = id11;
	document.forms["form"]["local"].value = te1.value;
	
	
	var te11= document.getElementById("ano1");
	te11.value = id12;
	var te12= document.getElementById("tomo1");
	te12.value = id13;
	var te13= document.getElementById("pagina1");
	te13.value = id14;
	var te14= document.getElementById("numero2");
	te14.value = id15;
	var te15= document.getElementById("fecbau");
	te15.value = id16;
	var te16= document.getElementById("numero1");
	te16.value = id17;	
	
	//son muy importantes pone disable un control, pone visible e invisible y asina un valor a un select
//	document.formName.enviar.disabled=!document.formName.enviar.disabled
	
	
	
	
	
	
//	document.formName.enviar.style.display='none'; 
	
//	document.formName.enviar.style.display='block'; 
//document.forms["formName"]["padre"].value = cedula1.value;
	
	
	//document.forms["tuForm"]["tuSelect"].value = "tuDato";
	
	//var popular1 = new Option("Rock de los 90","Rock1","","");
    //var popular2 = new Option("Rock de los 80","Rock2","","");
    //combo[0] = popular1;
    //combo[1] = popular2;
	//document.forms.form1.mes.options[x]=new Option(texto,valor,"defaultSelected");
	//document.formName.padre.options[]=new Option(fdsfgg,0,"defaultSelected");
	
	
	
		//window.location.href = 'dato.php?id=' + cliente2.value + '&id1='+usuarioagregado.value;	 block
}

function escogeresposa(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,id11,id12,id13,id14,id15,id16,id17)
{
	
		
	var cedula1 = document.getElementById("codipees");
	cedula1.value = id1;
	
		var nombres1 = document.getElementById("nombrees");
	nombres1.value = id2;
	
			var direcion1 = document.getElementById("apellidoes");
	direcion1.value = id3;
	
			var telefono1= document.getElementById("apellidomaes");
	telefono1.value = id4;
	
		var telefono51= document.getElementById("fechanaes");
	telefono51.value = id5;
	
	var telefono511= document.getElementById("generoes");
	telefono511.value = id6;
	
	var telefono512= document.getElementById("paises");
	telefono512.value = id7;
	
	var telefono513= document.getElementById("provinciaes");
	telefono513.value = id8;
	
	var telefono514= document.getElementById("ciudades");
	telefono514.value = id9;
	
	var te= document.getElementById("veries");
	te.value = id10;
	
	var te1= document.getElementById("locales");
	te1.value = id11;
	document.forms["form"]["locales"].value = te1.value;
	
	
	var te11= document.getElementById("ano1es");
	te11.value = id12;
	var te12= document.getElementById("tomo1es");
	te12.value = id13;
	var te13= document.getElementById("pagina1es");
	te13.value = id14;
	var te14= document.getElementById("numero2es");
	te14.value = id15;
	var te15= document.getElementById("fecbaues");
	te15.value = id16;
	var te16= document.getElementById("numero1es");
	te16.value = id17;	
	
	//son muy importantes pone disable un control, pone visible e invisible y asina un valor a un select
//	document.formName.enviar.disabled=!document.formName.enviar.disabled
	
	
	
	
	
	
//	document.formName.enviar.style.display='none'; 
	
//	document.formName.enviar.style.display='block'; 
//document.forms["formName"]["padre"].value = cedula1.value;
	
	
	//document.forms["tuForm"]["tuSelect"].value = "tuDato";
	
	//var popular1 = new Option("Rock de los 90","Rock1","","");
    //var popular2 = new Option("Rock de los 80","Rock2","","");
    //combo[0] = popular1;
    //combo[1] = popular2;
	//document.forms.form1.mes.options[x]=new Option(texto,valor,"defaultSelected");
	//document.formName.padre.options[]=new Option(fdsfgg,0,"defaultSelected");
	
	
	
		//window.location.href = 'dato.php?id=' + cliente2.value + '&id1='+usuarioagregado.value;	 block
}


function escogerclientepa(id1,id2,id3,id4)
{
	
		
	var cedula1 = document.getElementById("codipepa");
	cedula1.value = id1;
	
		var nombres1 = document.getElementById("nombrepapa");
	nombres1.value = id2;
	
			var direcion1 = document.getElementById("apellidopapa");
	direcion1.value = id3;
	
			var telefono1= document.getElementById("apellidopama");
	telefono1.value = id4;
	
		
	
		//window.location.href = 'dato.php?id=' + cliente2.value + '&id1='+usuarioagregado.value;	
}
function escogerclientepaes(id1,id2,id3,id4)
{
	
		
	var cedula1 = document.getElementById("codipepaes");
	cedula1.value = id1;
	
		var nombres1 = document.getElementById("nombrepapaes");
	nombres1.value = id2;
	
			var direcion1 = document.getElementById("apellidopapaes");
	direcion1.value = id3;
	
			var telefono1= document.getElementById("apellidopamaes");
	telefono1.value = id4;
	
		
	
		//window.location.href = 'dato.php?id=' + cliente2.value + '&id1='+usuarioagregado.value;	
}
function escogerclientema(id1,id2,id3,id4)
{
	
		
	var cedula1 = document.getElementById("codipema");
	cedula1.value = id1;
	
		var nombres1 = document.getElementById("nombremama");
	nombres1.value = id2;
	
			var direcion1 = document.getElementById("apellidomama");
	direcion1.value = id3;
	
			var telefono1= document.getElementById("apellidomapa");
	telefono1.value = id4;
	
		
	
		//window.location.href = 'dato.php?id=' + cliente2.value + '&id1='+usuarioagregado.value;	
}
function escogerclientemaes(id1,id2,id3,id4)
{
	
		
	var cedula1 = document.getElementById("codipemaes");
	cedula1.value = id1;
	
		var nombres1 = document.getElementById("nombremamaes");
	nombres1.value = id2;
	
			var direcion1 = document.getElementById("apellidomamaes");
	direcion1.value = id3;
	
			var telefono1= document.getElementById("apellidomapaes");
	telefono1.value = id4;
	
		
	
		//window.location.href = 'dato.php?id=' + cliente2.value + '&id1='+usuarioagregado.value;	
}
function escogerclientepadri(id1,id2,id3,id4)
{
	
		
	var cedula1 = document.getElementById("codipepadri");
	cedula1.value = id1;
	
		var nombres1 = document.getElementById("nombrepadri");
	nombres1.value = id2;
	
			var direcion1 = document.getElementById("apellidopadrima");
	direcion1.value = id3;
	
			var telefono1= document.getElementById("apellidopadripa");
	telefono1.value = id4;
	
		
	
		//window.location.href = 'dato.php?id=' + cliente2.value + '&id1='+usuarioagregado.value;	
}

function escogerclientemadri(id1,id2,id3,id4)
{
	
		
	var cedula1 = document.getElementById("codipemadri");
	cedula1.value = id1;
	
		var nombres1 = document.getElementById("nombremadri");
	nombres1.value = id2;
	
			var direcion1 = document.getElementById("apellidomadrima");
	direcion1.value = id3;
	
			var telefono1= document.getElementById("apellidomadripa");
	telefono1.value = id4;
	
		
	
		//window.location.href = 'dato.php?id=' + cliente2.value + '&id1='+usuarioagregado.value;	
}
function escogerhabita(nuhabi1,tihabi1,vahabi1)
{
	var cliente2 = document.getElementById("nuhabi");
	cliente2.value = nuhabi1;
	
		var usuarioagregado = document.getElementById("tihabi");
	usuarioagregado.value = tihabi1;
	
			var valor1 = document.getElementById("vahabi");
	valor1.value = vahabi1;
}


function validarReserva()
{
		var materiaagregada = document.getElementById("materiaescogida");
		var hora = document.getElementById("horaescogido");
		var duracion = document.getElementById("duracionescogido");
		var fecha = document.getElementById("fecha");
		var fechaescogida = fecha.value;
		var fechaarray = fechaescogida.split('/');
		var fecha_actual = new Date();
		var dia = parseInt(fechaarray[0],10);
		var mes = parseInt(fechaarray[1],10);
		var anio = parseInt(fechaarray[2],10);
		var domingo = new Date(anio,mes-1,dia);
		if(materiaagregada.value=='')
		{
			alert("Debe escoger una materia");
			return false;
		
		}
		if(fecha.value=='')
		{
			alert("Debe escoger la fecha");
			return false;
		
		}
		if(domingo.getDay()==0)
		{
			alert("No se puede reservar este día");
			return false;
		}
		if(dia==parseInt(fecha_actual.getDate()) && mes==parseInt(fecha_actual.getMonth())+1 && anio==parseInt(fecha_actual.getFullYear()))
		{
			alert("Para reservar el Laboratorio debe hacerlo con un día de anticipación.");
			return false;a
		
		}
		if(anio<parseInt(fecha_actual.getFullYear()))
		{
			alert("No se puede reservar en fechas pasadas. 1");
			return false;
		
		}
		
		if(anio==parseInt(fecha_actual.getFullYear())&& mes<parseInt(fecha_actual.getMonth())+1){
				alert("No se puede reservar en fechas pasadas.");
				return false;
		}
		if(anio==parseInt(fecha_actual.getFullYear())&& mes==parseInt(fecha_actual.getMonth())+1&&dia<parseInt(fecha_actual.getDate())){
				alert("No se puede reservar en fechas pasadas.");
				return false;
		}
		if((hora.value=="20:00"||hora.value=="19:30") && duracion.value=="Tres horas"){
		
			alert("El laboratorio solo se puede reservar hasta las 22:00 h.");
			return false;
			}
		return true;

}

function prueba2()
{

	var fecha = document.getElementById("fecha");
	var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
	var lab = sel.options[sel.selectedIndex].value;
	var fechalink = document.getElementById("fechalink");
	fechalink.setAttribute("href","horario.php?height=500&width=800&lab="+lab+"&fecha="+fecha.value);
	


}

