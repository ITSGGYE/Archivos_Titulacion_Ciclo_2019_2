<?php
	session_start();
	include('db_login.php');
	$connection = new mysqli($db_host, $db_username, $db_password);
	// echo $connection;
 
	if (!$connection)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
	mysqli_select_db($connection,'book');
	// revisa si existe un usuario loggeado
    if (isset($_SESSION['user_id']) && $_SESSION['user_id']!=null) {
        header("location: bookin.php");
	}
	
?>
<!DOCTYPE HTML>

<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bookin</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
	      body {
	        padding-top: 40px;
	        padding-bottom: 40px;
			background-color: #f5f5f5;
			background-image: url('assets/images/pc.jpg');
	      }
		  .field-icon {
			float: right;
			margin-left: -25px;
			margin-top: 10px;
			margin-right: 10px;
			position: relative;
			z-index: 2;
			}

			.container{
			padding-top:50px;
			margin: auto;
			}

	      .form-signin {
	        max-width: 300px;
	        padding: 19px 29px 29px;
	        margin: 0 auto 20px;
	        background-color: #fff;
	        border: 1px solid #e5e5e5;
	        -webkit-border-radius: 5px;
	           -moz-border-radius: 5px;
	                border-radius: 5px;
	        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
	                box-shadow: 0 1px 2px rgba(0,0,0,.05);
	      }
	      .form-signin .form-signin-heading,
	      .form-signin .checkbox {
	        margin-bottom: 10px;
	      }
	      .form-signin input[type="text"],
	      .form-signin input[type="password"] {
	        font-size: 16px;
	        height: auto;
	        margin-bottom: 15px;
	        padding: 7px 9px;
	      }

	    </style>
	</HEAD>

	<BODY>
	
	<div class="container">
			<?php
					// check for a successful form post
					if (isset($_GET['e'])) echo "<div class=\"alert alert-error\">".$_GET['e']."</div>";
			?> 
	<!-- formulario que revisa el login  -->
      <form class="form-signin" action="actions/login.php" method="POST">
	  	<center>
		<image src='assets/images/labovida.jpg' style="width:100px;height:100px;">
        <h2 class="form-signin-heading">Favor ingrese a su sesión.</h2>
        <input type="text" class="input-block-level" name="userid" pattern="[A-z ]{3,}" title="Favor ingrese un username valido (Debe contener tres caracteres minimo)" placeholder="User ID" required>
        <div class="col-md-6">
		<input id="password-field" type="password" class="input-block-level" name="password" placeholder="Password" required>
		</div>
		<input type="hidden"  value="signin">
		<button type="submit" class="btn btn-info" name="save">  
			<i class="icon-ok icon-white"></i> Ingresar
		</button>
		<button type="reset" class="btn">
			<i class="icon-trash icon-black"></i> Borrar
		</button>
		</center>
      </form>

    </div>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</BODY>
	
</HTML>