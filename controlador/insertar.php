<?php
 $nombre_archivo=$_FILES['archivo']['name'];

 $type_archivo=$_FILES['archivo']['type'];

 $size_archivo=$_FILES['archivo']['size'];

 $ruta_destino=$_SERVER['DOCUMENT_ROOT'] . '/RecursosHumanosTesis/archivos/';


 move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta_destino.$nombre_archivo);


    $cedula =$_POST['cedula'];
    $nombre =$_POST['nombre'];
    $apellido =$_POST['apellido'];
    $fechan =$_POST['fechan'];
    $edad =$_POST['edad'];
    $fechaI =$_POST['fechaI'];
    $direccion =$_POST['direccion'];
    $telefono =$_POST['telefono'];
    $correo =$_POST['correo'];
 

    try{
        $conexion = new PDO('mysql:host=localhost; dbname=serviportex','root','');

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("set character set utf8");

        $sql="insert into aspirante (curriculum,cedula,nombres,apellidos,fecha_nac,edad,fecha_ingre,direccion,telefono,correo)
        value(:cv,:c,:n,:a,:fn,:e,:fi,:d,:t,:co)";

        $resultado = $conexion->prepare($sql);

        $resultado->execute(array(":cv"=>$nombre_archivo,":c"=>$cedula,":n"=>$nombre,":a"=>$apellido,":fn"=>$fechan,":e"=>$edad,":fi"=>$fechaI,":d"=>$direccion,":t"=>$telefono,":co"=>$correo));
       
        

        if($resultado==true){
            

             header("location:../vista/aspirante.php");

        }else{

            
        }

           

            

      

    }catch(Exception $e){

        die ("ERROR! " . $e->GetMessage() . $e->GetLine());

    }


?>