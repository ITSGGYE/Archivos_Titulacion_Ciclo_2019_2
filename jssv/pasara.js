function validarfecha(fecha,fecha2)
{
		
		var fecha = fecha;
		var fecha2 = fecha2;
		var fechaescogida = fecha.value;
		var fechaescogida2 = fecha2.value;		
		var fechaarray = fechaescogida.split('/');
		var fechaarray2 = fechaescogida2.split('/');		
		var fecha_actual = new Date();
		var d = parseInt(fechaarray[0],10);
		var m = parseInt(fechaarray[1],10);
		var a = parseInt(fechaarray[2],10);
		var d1 = parseInt(fechaarray2[0],10);
		var m1 = parseInt(fechaarray2[1],10);
		var a1 = parseInt(fechaarray2[2],10);
		var p=0;
		var x=0;

		if(a1<a)
		{
			p=1;
			
			
		}	
		if(p==1)
		{
			alert("La fecha inicial debe ser menor o igual a la final");
			return false;
		}		


		if(a1==a)
		{
			x=0;
			if(m1==m)
			{
				if(d>d1)
				{
					x=1;	
				}
			}
			else
			{
				if(m>m1)
				{
					x=1;	
				}
			}
		}	
		
		if(x==1)
		{
			alert("La fecha inicial debe ser menor o igual a la final");
			return false;
		}	


		return true;

}

function pasar()
{
	


	var id = document.getElementById("codi");
	var id1 = document.getElementById("nombrecli");
	var id2 = document.getElementById("cedula");
	var id3 = document.getElementById("fecha");
	var id4 = document.getElementById("pla2");
	var id5 = document.getElementById("tihabi");
	var id6 = document.getElementById("tn");
	var id7 = document.getElementById("ta");
	var id8 = document.getElementById("tb");
	var id9 = document.getElementById("dias");
	var id10 = document.getElementById("valpa");	
	var id11 = document.getElementById("op");
	var id12 = document.getElementById("fecha2");
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
var lab = "fghgfhgf";
	var fechalink12 = document.getElementById("fechalink2");
	fechalink12.setAttribute("href","huesped.php?height=250&width=400&id="+id.value+"&id1="+id1.value+"&id2="+id2.value+"&id3="+id3.value+"&id4="+id4.value+"&id5="+id5.value+"&id6="+id6.value+"&id7="+id7.value+"&id8="+id8.value+"&id9="+id9.value+"&id10="+id10.value+"&id11="+id11.value+"&id12="+id12.value);



}

function pasa2()
{
	


	var id = document.getElementById("codi");
	var id1 = document.getElementById("nombrecli");
	var id2 = document.getElementById("cedula");
	var id3 = document.getElementById("fecha");
	var id4 = document.getElementById("pla2");
	var id5 = document.getElementById("tihabi");
	var id6 = document.getElementById("tn");
	var id7 = document.getElementById("ta");
	var id8 = document.getElementById("tb");
	var id9 = document.getElementById("dias");
	var id10 = document.getElementById("valpa");	
	var id11 = document.getElementById("op");
	var id12 = document.getElementById("fecha2");
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
var lab = "fghgfhgf";
	var fechalink12 = document.getElementById("fechalink2");
	fechalink12.setAttribute("href","huesped2.php?height=250&width=400&id="+id.value+"&id1="+id1.value+"&id2="+id2.value+"&id3="+id3.value+"&id4="+id4.value+"&id5="+id5.value+"&id6="+id6.value+"&id7="+id7.value+"&id8="+id8.value+"&id9="+id9.value+"&id10="+id10.value+"&id11="+id11.value+"&id12="+id12.value);



}


function pasar1()
{
	

	
	var id = document.getElementById("fecha");
	var id1 = document.getElementById("fecha2");
	validarfecha(id,id1);
	
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
	var fechalink12 = document.getElementById("excel1");
	fechalink12.setAttribute("href","exportar.php?reporte=actividades&id="+id.value+"&id1="+id1.value);



}

function pasar3()
{
	

	
	var id = document.getElementById("fecha");
	var id1 = document.getElementById("fecha2");
	validarfecha(id,id1);
	
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
	var fechalink12 = document.getElementById("excel1");
	fechalink12.setAttribute("href","exportar.php?reporte=tiburon&id="+id.value+"&id1="+id1.value);



}

function pasar4()
{
	

	
	var id = document.getElementById("fecha1");
	var id1 = document.getElementById("fecha3");
	validarfecha(id,id1);
	
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
	var fechalink12 = document.getElementById("excel1");
	fechalink12.setAttribute("href","reporte.php?reporte=listarefe&id="+id.value+"&id1="+id1.value);



}


function pasar967()
{
	

var id = document.getElementById("fecha1");
	var id1 = document.getElementById("fecha1");
	
	
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
	var fechalink12 = document.getElementById("excel1");
	fechalink12.setAttribute("href","reporte.php?reporte=listaasite&id="+id.value+"&id1="+id1.value);


}


function pasar44()
{
	

	
	var id = document.getElementById("fecha1");
	var id1 = document.getElementById("fecha3");
	validarfecha(id,id1);
	
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
	var fechalink12 = document.getElementById("excel1");
	fechalink12.setAttribute("href","reporte.php?reporte=ingre&id="+id.value+"&id1="+id1.value);



}


function pasar443()
{
	

	
	var id = document.getElementById("fecha1");
	var id1 = document.getElementById("fecha3");
	validarfecha(id,id1);
	
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
	var fechalink12 = document.getElementById("excel1");
	fechalink12.setAttribute("href","reporte.php?reporte=ingre1&id="+id.value+"&id1="+id1.value);



}



function pasar5()
{
	

	
	var id = document.getElementById("fecha");
	var id1 = document.getElementById("fecha2");
	validarfecha(id,id1);
	
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
	var fechalink12 = document.getElementById("excel1");
	fechalink12.setAttribute("href","exportar.php?reporte=infracion&id="+id.value+"&id1="+id1.value);



}

function pasar6()
{
	

	
	var id = document.getElementById("fecha");
	var id1 = document.getElementById("fecha2");
	validarfecha(id,id1);
	
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
	var fechalink12 = document.getElementById("excel1");
	fechalink12.setAttribute("href","exportar.php?reporte=recaudacion1&id="+id.value+"&id1="+id1.value);



}

function pasar7()
{
	

	
	var id = document.getElementById("fecha");
	var id1 = document.getElementById("fecha2");
	validarfecha(id,id1);
	
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
	var fechalink12 = document.getElementById("excel1");
	fechalink12.setAttribute("href","exportar.php?reporte=credencial&id="+id.value+"&id1="+id1.value);



}


function pasar34()
{
	


	var id = document.getElementById("fecha1");
	var id1 = document.getElementById("fecha3");
	var nuha = document.getElementById("pla2");
	
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;

	var fechalink12 = document.getElementById("fechalink24");
	fechalink12.setAttribute("href","graficore.php?height=300&width=350&id="+id.value+"&id1="+id1.value+"&nuha="+nuha.value);



}


function pasar3490()
{
	


	var id = document.getElementById("fecha1");
	
	
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;

	var fechalink12 = document.getElementById("fechalink24");
	fechalink12.setAttribute("href","graficore3.php?height=300&width=350&id="+id.value);



}



function carhabi()
{
	


	var id = document.getElementById("codi");
	var id1 = document.getElementById("nombrecli");
	var id2 = document.getElementById("cedula");
	var id3 = document.getElementById("fecha");
	var id4 = document.getElementById("pla2");
	var id5 = document.getElementById("tihabi");
	var id6 = document.getElementById("tn");
	var id7 = document.getElementById("ta");
	var id8 = document.getElementById("tb");
	var id9 = document.getElementById("dias");
	var id10 = document.getElementById("valpa");	
	var id11 = document.getElementById("op");
	var id12 = document.getElementById("fecha2");
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
var lab = "fghgfhgf";
	var fechalink12 = document.getElementById("dos");
	fechalink12.setAttribute("href","cargahabita.php?height=250&width=400&id="+id.value+"&id1="+id1.value+"&id2="+id2.value+"&id3="+id3.value+"&id4="+id4.value+"&id5="+id5.value+"&id6="+id6.value+"&id7="+id7.value+"&id8="+id8.value+"&id9="+id9.value+"&id10="+id10.value+"&id11="+id11.value+"&id12="+id12.value);



}


function carhabi1()
{
	


	var id = document.getElementById("codi");
	var id1 = document.getElementById("nombrecli");
	var id2 = document.getElementById("cedula");
	var id3 = document.getElementById("fecha");
	var id4 = document.getElementById("pla2");
	var id5 = document.getElementById("tihabi");
	var id6 = document.getElementById("tn");
	var id7 = document.getElementById("ta");
	var id8 = document.getElementById("tb");
	var id9 = document.getElementById("dias");
	var id10 = document.getElementById("valpa");	
	var id11 = document.getElementById("op");
	var id12 = document.getElementById("fecha2");
	//var sel = document.getElementById("labescogido");//document.form1.labescogido.options[0].value;//document.getElementById("labescogido");
//	var lab = sel.options[sel.selectedIndex].value;
var lab = "fghgfhgf";
	var fechalink12 = document.getElementById("dos");
	fechalink12.setAttribute("href","cargahabita1.php?height=250&width=400&id="+id.value+"&id1="+id1.value+"&id2="+id2.value+"&id3="+id3.value+"&id4="+id4.value+"&id5="+id5.value+"&id6="+id6.value+"&id7="+id7.value+"&id8="+id8.value+"&id9="+id9.value+"&id10="+id10.value+"&id11="+id11.value+"&id12="+id12.value);



}