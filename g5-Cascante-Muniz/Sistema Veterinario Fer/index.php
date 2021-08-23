<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="img/ico.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Veterinario FER</title>
</head>
<body>
    
</body>
</html>
<?php


define("ROOT", dirname(__FILE__));

$debug= false;
if($debug){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
}

include "core/autoload.php";

ob_start();
session_start();
Core::$root="";

$lb = new Lb();
$lb->start();

?>
