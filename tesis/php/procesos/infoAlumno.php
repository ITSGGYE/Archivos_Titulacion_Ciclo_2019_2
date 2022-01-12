<?php 

	require_once "../conexion.php";

	$selgrado = $_POST['selG'];
	$selnivel = $_POST['selN'];
	$selmateria = $_POST['selM'];
	$selquimestre = $_POST['selQ'];


if ($selgrado == "seleccionar" || $selnivel == "seleccionar" || $selmateria == "seleccionar" || $selquimestre == "seleccionar") {
	echo "<span style='color: red; text-align: center; font-size: 24px'>SELECCIONE LAS OPCIONES CORRESPONDIENTES</span>";
}
else{
	$con = new conexion;
	$obj=$con->conectar();

	$sql = "SELECT id, nombres, apellidos FROM alumno WHERE grado_id='$selgrado'"; 
	$res = mysqli_query($obj, $sql);

	$table="";

	$table .='<table id="tabla">';
	$table .='<tr>';
	$table .='<th id="th_n">Alumno</th>';
	$table .='<th id="td_n">Nota 1</th>';
	$table .='<th id="td_n">Nota 2</th>';
	$table .='<th id="td_n">Nota 3</th>';
	$table .='<th id="td_n">Promedio</th>';
	$table .='<th id="td_n">Registrar</th>';
	$table .='</tr>';



	while ($row = $res->fetch_assoc()) {
		$i=$row['id'];

		$table .= '<tr id="tr_rem">';
		$table .= '<td id="th_n">'.$row['nombres'].' '.$row['apellidos'].'</td>';
		$table .= '<td id="td_n"><input type="number"  id="txt_nota1'.$i.'" value="0" onfocusout="sumPromedio('.$i.')" min="1" max="999" style="text-align: center;"></td>';
		$table .= '<td id="td_n"><input type="number"  id="txt_nota2'.$i.'" value="0" onfocusout="sumPromedio('.$i.')" min="1" max="999" style="text-align: center;"></td>';
		$table .= '<td id="td_n"><input type="number"  id="txt_nota3'.$i.'" value="0" onfocusout="sumPromedio('.$i.')" min="1" max="999" style="text-align: center;"></td>';
		$table .= '<td id="td_n"><input type="number"  id="txt_promedio'.$i.'" value="0" onfocusout="sumPromedio('.$i.')" readonly min="1" max="999" style="text-align: center;"></td>';
		$table .='<td id="td_n"><input type="button" id="btn_nota" onclick="Nota('.$i.')" title="Registrar nota"></td>';
		$table .= '</tr>';
	}

	$table .='</table>';


	echo $table;

}
 ?>