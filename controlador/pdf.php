<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>documeno pdf</title>>
    <link rel="icon" href="../imagenes/logo2.ico">
 
</head>
<body>


    <?php 
    $cv = $_GET['cv'];

    header('content-type:application/pdf');
    readfile('../archivos/'.$cv);


?>


</body>
</html>


