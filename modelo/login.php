<?php 

    try{    

        $conexion = new PDO('mysql:host=localhost; dbname=serviportex', 'root', '');

                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $conexion->exec('SET CHARACTER SET UTF8');

        $sql = "select * from usuarios where Nombre_Usuario = :usu";

        $resultado = $conexion->prepare($sql);

        $usuario = htmlentities(addslashes($_POST['usuario']));
        $password = htmlentities(addslashes($_POST['contra']));

        if($usuario == '' & $password == ''){

            header('location:../index.php');

        }


        $resultado->bindValue(':usu',$usuario);

        $resultado->execute();


        $num_fila= $resultado->rowCount();

        while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){


            if($num_fila != 0 & $registro['perfil'] == 'Administrador')
            {
                if(password_verify($password, $registro['contraseña']))
                {
                    session_start();

                    $_SESSION['usuario'] = $registro['cedula'];

                    header('location:../vista/menu.php');

                }else{
                    header('location:../index.php');
                }

            }elseif($num_fila != 0 & $registro['perfil'] == 'Aspirante')
            {
                if($password == $registro['contraseña'] )
                {
                    session_start();

                    $_SESSION['usuario'] = $registro['cedula'];

                    header('location:../vista/menuAspirante.php');
                }else{
                    header('location:../index.php');
                }

            }

           

                
        }

        if($num_fila == 0){
            header('location:../index.php');
        }

        
        



    }catch(Exception $e){
        die('Error!!' .$e->getMessage() . $e->getLine());
    }

?>