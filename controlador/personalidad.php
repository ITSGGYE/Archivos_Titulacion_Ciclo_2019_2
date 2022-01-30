<?php

        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../index.php');
            
        }

        $cedula = $_SESSION['usuario'];

        $contador = 0;


        switch($_REQUEST['uno']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }


        switch($_REQUEST['dos']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }


        switch($_REQUEST['tres']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }


        switch($_REQUEST['cuatro']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }


        switch($_REQUEST['cinco']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }
        switch($_REQUEST['seis']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }
        switch($_REQUEST['siete']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }
        switch($_REQUEST['ocho']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }
        switch($_REQUEST['nueve']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }

        switch($_REQUEST['diez']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }

        switch($_REQUEST['once']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }

        switch($_REQUEST['doce']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }

        switch($_REQUEST['trece']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }

        switch($_REQUEST['catorce']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }

        switch($_REQUEST['quince']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }

        switch($_REQUEST['dieciseis']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }

        switch($_REQUEST['diecisiete']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }

        switch($_REQUEST['dieciocho']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }

        switch($_REQUEST['diecinueve']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }

        switch($_REQUEST['veinte']){

            case 'Totalmente de acuerdo':

                $contador +=2.5;

            break;

            case 'De acuerdo':

                $contador +=2;

            break;

            case 'Neutro':

                $contador +=1.5;

            break;

            case  'En desacuerdo':

                $contador +=1;

            break;
            case 'Totalmente en desacuerdo':

                $contador +=0.5;

            break;

        }

        //comienso de la conexion y modificar en la base de datos 
        require_once("../modelo/conexion.php");

        $db = new Conectar();

        $sql = $db->conexion();

        $sql->query("UPDATE pruebas SET personalidad = '$contador' WHERE (cedula = '$cedula');");

        header('location:../vista/menuAspirante.php');

  

?>