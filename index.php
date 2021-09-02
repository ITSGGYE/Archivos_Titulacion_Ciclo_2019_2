<?php


require_once 'model/ConnectDb.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$controller = 'login';



// Todo esta lógica hara el papel de un FrontController

//Obtenemos el nombre del controlador
//Si el nombre del controllador no se especifica en el request se direcciona 
//al controller Login que es el controller por defecto
if(!isset($_REQUEST['c']))
{

    require_once "controller/$controller.controller.php";

    $controller = ucwords($controller) . 'Controller';

    $controller = new $controller;

    $controller->Login();    

}

else

{

    // Obtenemos el controlador que queremos cargar

    $controller = strtolower($_REQUEST['c']);

    //Obtenemos la accion del controlador
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

        

    // Instanciamos el controlador

    require_once "controller/$controller.controller.php";

    $controller = ucwords($controller) . 'Controller';

    $controller = new $controller;
  

    // Llama la accion del controlador

    call_user_func( array( $controller, $accion ) );

}

?>



