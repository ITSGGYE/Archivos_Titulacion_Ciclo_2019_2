<?php


    require_once('../modelo/menu.php');//creamos la ruta con el archivo de la consulta 

    $menu=new Menu_modelo();//instanciamos la clase que se encuentra en el archivo menu.php  

    $matriz_menu=$menu->get_datosMenu();/* guardamos el valos que nos debuelve la funcion get_datosMenu 
    de la clase Menu_modelo que instanciamos y su valor se guardo en la variable menu*/

    $grafico_menu =$menu->get_graficos();/*Guardamos el valor que nos debuelve la funcion get_graficos(de la clase Menu_modelo que instanciamos y su valr se guardo en la variable menu) */

    $total_registro = $menu->get_total_registro();

    $total = $menu->get_total();



?>