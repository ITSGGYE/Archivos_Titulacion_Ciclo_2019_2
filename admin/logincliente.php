<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      header("location:home.php");  
 }  
 
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesion</title>
  
  
     
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
 

 <div class="container">


      <div id="login">

        <form method="post">

          <fieldset class="clearfix">

            <p><span class="fontawesome-user"></span><input type="text"  name="user" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p>  
            <p><span class="fontawesome-lock"></span><input type="password" name="pass"  value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p>  
            <p><input type="submit" name="sub" href="reservation.php" value="inicio" ></p>

          </fieldset>
        </form>
<br>
<br>
<div class="bottom">  <h3><a href="../register.php">crear una cuenta</a></h3></div>

       

      </div>  

    </div>
    <div class="bottom">  <h3><a href="../index.php">volver a inicio</a></h3></div>
  
</body>
</html>

<?php
   include('db.php');
  
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     $myusername = mysqli_real_escape_string($con,$_POST['user']);
     $mypassword = mysqli_real_escape_string($con,$_POST['pass']);  
     $sql = "SELECT id_user FROM user WHERE usuario = '$myusername' and pasword = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
     
      if($count == 1) {
         
         $_SESSION['user'] = $myusername;
         
         header("location: home.php");
      }else {
         echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
      }
   }
?>
