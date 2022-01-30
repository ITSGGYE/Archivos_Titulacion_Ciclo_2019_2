<?php
    class Menu_modelo{//------creamos la clase haciendo referencia que pertenece a modelo 

        private $db;//-----una variable privada donde almacenaremos la conexion que rescatemos del archivo conexion.php

        private $menu;/*variable privada menu que usamos para convertir en array y guaradar los datos de la consulta  */

        private $grafico;/*variable privada grafico que usamos para convertir en array y guaradar los datos de la consulta  */

        private $total_registro;

        public function __construct(){ //-----creamos el constructor de la clase que lo usamos para conectarcon la bd

            require_once ('../modelo/conexion.php');//traemos todo el codigo del archivo conexion.php 

            $this->db=Conectar::conexion();/*Guardamos en la variable $db lo que traemos de la clase Conectar y lo 
            que se encuentre dentro de la funcion conexion() en resumen dise esta variable va a contener la 
            clase Conectar y asu ves la funcion conexion() */

            $this->menu=array();//convertimos la variable en un array para guardar lo que saquemos de la base dedatos

            $this->grafico=array();

            
        }

        //-------------esta funcion se encarga de hacer la consulta con la base de datos y sacar los datos
        public function get_datosMenu(){

            $consulta=$this->db->query('select 
            *
            from aspirante a
            join puntaje p
            on a.cedula = p.cedula order by nota DESC limit 0,5;');//hacemos la consulta usando la basriable db conde guardamos la conexion


            while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){

                $this->menu[]=$fila;//lo que hacemos es pasar el contenido del array fila al array menu 

            }

            return $this->menu;//devolbemos la variable menu con todos los datos de la consulta 

        } 

        public function get_graficos(){

            $sql=$this->db->query('select nombres,nota from puntaje where nota >=60 ;');/*hacemos la consulta con un where en el campo nota para que solo nos debuelva los aspirantes con puntaje mayor de 50  */

            while($fila=$sql->fetch(PDO::FETCH_ASSOC)){/*guardamos el contenido de el recorrido de la base de datos y se lo pasamos a la variable $fila */

                $this->grafico[]=$fila;//lo que hacemos es pasar el contenido del array fila al array grafico

            }

            return $this->grafico;
        }

        public function get_total_registro(){

            $sql ="select * from aspirante;";
            $resultado = $this->db->prepare($sql);
            $resultado->execute(array());
            $numero = $resultado->rowCount();

            
            return $numero;

        }

        public function get_total(){

            $sql ="select * from puntaje;";
            $resultado = $this->db->prepare($sql);
            $resultado->execute(array());
            $numero = $resultado->rowCount();

            
            return $numero;

        }

        
        

    }




?>