<?php 
    // Este script envia un correo de aviso para la reserva de capacitaciones
    include('db_login.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'assets/PHPMailer/PHPMailer-master/src/Exception.php';
    require 'assets/PHPMailer/PHPMailer-master/src/PHPMailer.php';
    require 'assets/PHPMailer/PHPMailer-master/src/SMTP.php';
	$connection = mysqli_connect($db_host, $db_username, $db_password);
	if (!$connection)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
    mysqli_select_db($connection,'book');
    $hoy = new DateTime('NOW');
    $primer_dia_mes = new DateTime('first day of this month');
    $intervalo = date_diff($primer_dia_mes,$hoy);
    $diferencia_dias = $intervalo -> format('%d');

    if($diferencia_dias>0 && $diferencia_dias<4){
        // VERIFICA QUE EL USUARIO YA NO SE HAYA REGISTRADO ANTES A ESTA CAPACITACION 
        $query = "select emp.email from empleados emp 
            where emp.email NOT IN (
            select emp.email from 
            empleados emp 
            left join asientos ast 
            on ast.id_empleado = emp.id_user  
            where  MONTH(ast.FECHA_CREACION)=".intval($hoy -> format('m')).") "; 
                                
        $result = mysqli_query($connection,$query);

        while($row = mysqli_fetch_array($result))
        {
            $mail = new PHPMailer(true);

            try {
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Set the encryption mechanism to use - STARTTLS or SMTPS
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;   
                    $mail->Username   = 'book.in.2.0.2.0@gmail.com';                     // SMTP username
                    $mail->Password   = 'Belencita2021';                               // SMTP password
                    $mail->Port       =587;                                    // TCP port to connect to
                    
                    $mail->setFrom('book.in.2.0.2.0@gmail.com', 'Reserva');   
                    $mail->addAddress('karenbelen0201@hotmail.com', 'Belen');
                    
                    $mail->Subject = 'Aviso de registro';
                    $mail->Body    = 'Favor no olvidar registrarse a las capacitaciones, aun se encuentra a tiempo ';
                   
                    $mail->send();

                } catch (Exception $e) {
                    echo "El mensaje no pudo ser enviado. Error de correo: {$mail->ErrorInfo}";
                }        
    }
    };
?>