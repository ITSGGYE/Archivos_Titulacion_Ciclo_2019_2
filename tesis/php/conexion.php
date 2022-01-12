<?php 
	/**
	 * conexion a la base de datos 
	 */
	class conexion
	{
		// CREAMOS VARIABLE PRIVADAS PARA QUE NO PUEDAN ACCEDER A ELLAS
		private $servidor="localhost";
		private $usuario="root";
		private $password="root";
		private $base_datos="BD_prueba";

		// POR MEDIO DE ESTA FUNCION PUBLICAPODREMOS LLAMAR LA EJECUCION EN TODO NUESTRO SISTEMA CUANDO SEA NECESARIO
		public function conectar()
		{
			$cone = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->base_datos);

			return $cone; // RETORNAMOS UN VALOR QUE NOS DARIA UN 1 O 0
		}
	}
 ?>