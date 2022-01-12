
<?php 
	
	/**
	 * Metodo CRUD DEL SISTEMA 
	 */
	class metodos
	{
		
		// ############### METODOS REGISTRAR ###########################

		//METODO REGISTRAR GRADO
		//ENVIAMOS UN PARAMETRO DATOS PARA RECIBIR LOS DATOS QUE SERAN REGISTRADO

		public function registrogrado($datos)
		{

		$obj = new conexion();
		$co = $obj->conectar();

		$sql = "INSERT INTO grado(codigo, nombre_grado, nivel, numeros_alumnos, observacion) VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]')";

		return $result = mysqli_query($co, $sql);
		
		}

		//METODO REGISTRAR MATERIA
		//ENVIAMOS UN PARAMETRO DATOS PARA RECIBIR LOS DATOS QUE SERAN REGISTRADO
		public function registromateria($datos)
		{

		$obj = new conexion();
		$co = $obj->conectar();

		$sql = "INSERT INTO materia(codigo, jornada, nomb_materia, grado_id) VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]')";

		return $result = mysqli_query($co, $sql);
		
		}

		//METODO REGISTRAR DOCENTE
		//ENVIAMOS UN PARAMETRO DATOS PARA RECIBIR LOS DATOS QUE SERAN REGISTRADO
		public function registrodocente($datos)
		{

		$obj = new conexion();
		$co = $obj->conectar();

		$sql = "INSERT INTO docente(cedula, nombres, apellidos, telefono, celular, nacionalidad, sangre, genero, fech_nacimiento, edad, etnia, domicilio, correo, discapacidad, nivel_edu, especialidad, correo_edu, turno, observacion) VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]', '$datos[6]', '$datos[7]', '$datos[8]', '$datos[9]', '$datos[10]', '$datos[11]', '$datos[12]', '$datos[13]', '$datos[14]', '$datos[15]', '$datos[16]', '$datos[17]', '$datos[18]')";

		return $result = mysqli_query($co, $sql);
		
		}


		//METODO REGISTRAR ALUMNO
		//ENVIAMOS UN PARAMETRO DATOS PARA RECIBIR LOS DATOS QUE SERAN REGISTRADO
		public function registroalumno($datos)
		{

		$obj = new conexion();
		$co = $obj->conectar();

		$sql = "INSERT INTO alumno(cedula, nombres, apellidos, telefono, celular, nacionalidad, sangre, genero, fech_nacimiento, edad, etnia, domicilio, correo, discapacidad, estado, nivel, procedencia, correo_edu, codigo_matricula, fech_matricula, fech_admision, periodoI, periodoF, jornada, grado_id) VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]', '$datos[6]', '$datos[7]', '$datos[8]', '$datos[9]', '$datos[10]', '$datos[11]', '$datos[12]', '$datos[13]', '$datos[14]', '$datos[15]', '$datos[16]', '$datos[17]', '$datos[18]', '$datos[19]', '$datos[20]', '$datos[21]', '$datos[22]', '$datos[23]', '$datos[24]')";

		return $result = mysqli_query($co, $sql);
		
		}


		//METODO REGISTRAR NOTA
		//ENVIAMOS UN PARAMETRO DATOS PARA RECIBIR LOS DATOS QUE SERAN REGISTRADO
		public function registronota($datos)
		{

		$obj = new conexion();
		$co = $obj->conectar();


		$sql = "INSERT INTO notas(nota_uno, nota_dos, nota_tres, promedio, nivel, quimestre, materia_id, alumno_id1, grado_id) VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]', '$datos[6]', '$datos[7]', '$datos[8]');";

		return $result = mysqli_query($co, $sql);
		
		}

		//######################## METODO ACTUALIZAR #############################################################


		//METODO ATUCALIZAR GRADO
		//ENVIAMOS UN PARAMETRO DATOS PARA RECIBIR LOS DATOS QUE SERAN ACTUALIZADO
		public function actualizargrado($datos)
		{

		$obj = new conexion();
		$co = $obj->conectar();

		$sql = "UPDATE grado SET codigo='$datos[0]', nombre_grado='$datos[1]', nivel='$datos[2]', numeros_alumnos='$datos[3]', observacion='$datos[4]' WHERE id='$datos[5]'";

		return $result = mysqli_query($co, $sql);
		
		}

		//METODO ATUCALIZAR MATERIA
		//ENVIAMOS UN PARAMETRO DATOS PARA RECIBIR LOS DATOS QUE SERAN ACTUALIZADO
		public function actualizarmateria($datos)
		{

		$obj = new conexion();
		$co = $obj->conectar();

		$sql = "UPDATE materia SET codigo='$datos[0]', jornada='$datos[1]', nomb_materia='$datos[2]', grado_id='$datos[3]' WHERE id='$datos[4]'";

		return $result = mysqli_query($co, $sql);
		
		}

		//METODO ATUCALIZAR DOCENTE
		//ENVIAMOS UN PARAMETRO DATOS PARA RECIBIR LOS DATOS QUE SERAN ACTUALIZADO
		public function actualizardocente($datos)
		{

		$obj = new conexion();
		$co = $obj->conectar();


		$sql = "UPDATE docente SET cedula='$datos[0]', nombres='$datos[1]', apellidos='$datos[2]', telefono='$datos[3]', celular='$datos[4]', nacionalidad='$datos[5]', sangre='$datos[6]', genero='$datos[7]', fech_nacimiento='$datos[8]', edad='$datos[9]', etnia='$datos[10]', domicilio='$datos[11]', correo='$datos[12]', discapacidad='$datos[13]', nivel_edu='$datos[14]', especialidad='$datos[15]', correo_edu='$datos[16]', turno='$datos[17]', observacion='$datos[18]' WHERE id='$datos[19]'";

		return $result = mysqli_query($co, $sql);
		
		}

		//METODO ATUCALIZAR ALUMNO
		//ENVIAMOS UN PARAMETRO DATOS PARA RECIBIR LOS DATOS QUE SERAN ACTUALIZADO
		public function actualizaralumno($datos)
		{

		$obj = new conexion();
		$co = $obj->conectar();


		$sql = "UPDATE alumno SET cedula='$datos[0]', nombres='$datos[1]', apellidos='$datos[2]', telefono='$datos[3]', celular='$datos[4]', nacionalidad='$datos[5]', sangre='$datos[6]', genero='$datos[7]', fech_nacimiento='$datos[8]', edad='$datos[9]', etnia='$datos[10]', domicilio='$datos[11]', correo='$datos[12]', discapacidad='$datos[13]', estado='$datos[14]', nivel='$datos[15]', procedencia='$datos[16]', correo_edu='$datos[17]', codigo_matricula='$datos[18]', fech_matricula='$datos[19]', fech_admision='$datos[20]', periodoI='$datos[21]', periodoF='$datos[22]', jornada='$datos[23]', grado_id='$datos[24]' WHERE id='$datos[25]'";

		return $result = mysqli_query($co, $sql);
		
		}

		//METODO ATUCALIZAR NOTA
		//ENVIAMOS UN PARAMETRO DATOS PARA RECIBIR LOS DATOS QUE SERAN ACTUALIZADO
		public function actualizarnota($datos)
		{

		$obj = new conexion();
		$co = $obj->conectar();

		$sql = "UPDATE notas SET nota_uno='$datos[0]', nota_dos='$datos[1]', nota_tres='$datos[2]', promedio='$datos[3]' WHERE id='$datos[4]'";

		return $result = mysqli_query($co, $sql);
		
		}

		//########################### METODO ELIMINAR ######################################################

		//METODO ELIMINAR GRADO
		//ENVIAMOS UN PARAMETRO ID PARA RECIBIR IDENTIFIAR EL ID DE QUE DATOS QUEREMOS ELIMINAR
		public function eliminargrado($id)
		{

		$obj = new conexion();
		$co = $obj->conectar();

		$sql = "DELETE FROM grado WHERE id='$id'";

		return $result = mysqli_query($co, $sql);
		
		}

		//METODO ELIMINAR MATERIA
		//ENVIAMOS UN PARAMETRO ID PARA RECIBIR IDENTIFIAR EL ID DE QUE DATOS QUEREMOS ELIMINAR

		public function eliminarmateria($id)
		{

		$obj = new conexion();
		$co = $obj->conectar();

		$sql = "DELETE FROM materia WHERE id='$id'";

		return $result = mysqli_query($co, $sql);
		
		}

		//METODO ELIMINAR DOCENTE
		//ENVIAMOS UN PARAMETRO ID PARA RECIBIR IDENTIFIAR EL ID DE QUE DATOS QUEREMOS ELIMINAR
		public function eliminardocente($id)
		{

		$obj = new conexion();
		$co = $obj->conectar();

		$sql = "DELETE FROM docente WHERE id='$id'";

		return $result = mysqli_query($co, $sql);
		
		}

		//METODO ELIMINAR ALUMNO
		//ENVIAMOS UN PARAMETRO ID PARA RECIBIR IDENTIFIAR EL ID DE QUE DATOS QUEREMOS ELIMINAR
		public function eliminaralumno($id)
		{

		$obj = new conexion();
		$co = $obj->conectar();

		$sql = "DELETE FROM alumno WHERE id='$id'";

		return $result = mysqli_query($co, $sql);
		
		}

		//METODO ELIMINAR NOTA
		//ENVIAMOS UN PARAMETRO ID PARA RECIBIR IDENTIFIAR EL ID DE QUE DATOS QUEREMOS ELIMINAR
		public function eliminarnota($id)
		{

		$obj = new conexion();
		$co = $obj->conectar();

		$sql = "DELETE FROM notas WHERE id='$id'";

		return $result = mysqli_query($co, $sql);
		
		}

		//##################### METODO MOSTRAR ####################################

		//ESTA FUNCION NOS PERMITIRA MOSTRAR LOS DATOS RESPONDIENTE DE LAS OPCION DE CADA REGISTRO O ACTUALIZADO
		//SE ENVIA UN PARAMETRO SQL PARA REALIZA LA EJECUCION DEL QUERY DE LO QUE QUEREMOS MOSTRAR
		public function mostrar($sql){
			$co = new conexion;
			$con = $co->conectar();


			$result = mysqli_query($con, $sql);

			return mysqli_fetch_all($result, MYSQLI_ASSOC);
		}
				
	}
?>