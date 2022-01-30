<?php

    class Modelo
    {
        //atributos
        public $conexion ;
        public $alerta;

        //acciones o metodos


        public function Insertar($cedula,$nombre,$apellido,$perfil,$usuario,$contraseña)
        {
            include_once('conexion.php');

            $this->conexion = new Conectar();

            $this->conexion = $this->conexion->conexion();


            $this->conexion->query("insert into usuarios(cedula,nombre,apellido,perfil,Nombre_Usuario,contraseña)
            value('$cedula','$nombre','$apellido','$perfil','$usuario','$contraseña')");

            
        }
    }

?>