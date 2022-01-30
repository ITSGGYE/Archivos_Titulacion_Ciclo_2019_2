function escogerMateria(materia)
{
	var materiaagregada1 = document.getElementById("materiaescogida");
	materiaagregada1.value = materia;
}
function escogerProfesor(Profesor,usuario)
{
	var profesoragregado = document.getElementById("profesorescogido");
	profesoragregado.value = Profesor;
	var usuarioagregado = document.getElementById("usuarioescogido");
	usuarioagregado.value = usuario;
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
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
var lab = "fghgfhgf";
	var fechalink12 = document.getElementById("fechalink2");
	fechalink12.setAttribute("href","horario.php?height=500&width=800&lab="+lab.value+"&fecha="+fecha.value);
	


}

