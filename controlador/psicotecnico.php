<?php
        session_start();

        if(!isset($_SESSION['usuario'])){

            header('location:../index.php');
            
        }

        $cedula = $_SESSION['usuario'];

        $contador = 0;


        if($_REQUEST['preguntauno']=='C'){


            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['dos']=='Método'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['tres']=='Separar'){

            $contador +=2.5;

        }else{

            $contador+=1;  

        }if($_REQUEST['cuatro']=='Anemómetro'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['cinco']=='Pésimo'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['seis']=='- d – a – c – b – e'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['siete']=='ACEHLQ'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['ocho']=='2'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['nueve']=='396, 369, 354, 345, 321, 312'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['diez']=='A'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['once']=='U'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['doce']=='-, +'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['trece']=='Diligencia'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['catorce']=='Sobrina'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['quince']=='42 años'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['diesiseis']=='Guillotina – Soga'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['diesisiete']=='Nomina'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['diecinieve']=='Andrógeno'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['veinte']=='D'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }if($_REQUEST['veintiuno']=='C'){

            $contador +=2.5;

        }else{

            $contador+=1;

        }


        //comienso de la conexion y insertar a la base de datos 
        require_once("../modelo/conexion.php");

        $db = new Conectar();

        $sql = $db->conexion();

        $sql->query("insert into pruebas(cedula,psicotecnico)value('$cedula','$contador')");

        header('location:../vista/menuAspirante.php');


    ?>