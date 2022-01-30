<?php //require_once "validacion.php";
require_once "abrebase.php";



			
     
?>


<!DOCTYPE html>
<!-- saved from url=(0036)https://cec-iaen.formax.edu.ec/login -->
<html lang="es-419"><!--<![endif]--><head dir="ltr"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">




  
      <title>
       Inicio de sesion | Sistema Cuentas por cobrar
      </title>
  

  <link rel="icon" type="image/x-icon" href="dibujo/ico.png">

  
  

    <link href="estilos/esti.css" rel="stylesheet" type="text/css">
	 <link href="estilos/esti1.css" rel="stylesheet" type="text/css">
	  <link href="estilos/esti2.css" rel="stylesheet" type="text/css">

 <link href="estilos/esti3.css" rel="stylesheet" type="text/css">

  
   


  <meta name="path_prefix" content="">
  <meta name="google-site-verification" content="_mipQ4AtZQDNmbtOkwehQDOgCxUUV2fb_C0b6wbiRHY">

 <link href="estilos/esti3.css" rel="stylesheet" type="text/css">
  <script>
function sf(ID){
document.getElementById(ID).focus();
}
</script> 
<script type="text/javascript">
function trim(cadena)
{
var retorno=cadena.replace(/^\s+/g,"");
retorno=retorno.replace(/\s+$/g,"");
return retorno;
}

		function validar(){
		var decripcion11 = document.getElementById("cuenta");
		
			
		 if (trim(decripcion11.value) == "") {
         alert('Digite Alias de Usuario');
		 document.forma.cuenta.focus();
		 return false;
        }
		
	
  
  var decripcion11s = document.getElementById("clave");
		
			
		 if (trim(decripcion11s.value) == "") {
         alert('Digite contarseña de Usuario');
		 document.forma.clave.focus();
		 return false;
        }
		




	
					
			


		
		document.forma.action = 'buscausuario.php';
		return true;


	
			
			
		}
		
	
	 
 
 
 
 


	</script>
  
<!-- End of formax Zendesk Widget script -->

</head>

<body class="ltr view-login lang_es-419 js" onLoad="sf('cuenta');">
  <div class="window-wrap" dir="ltr">
   





  <header class="global " aria-label="Global Navigation">
    <nav>
    <h1 class="logo">
        <img src="dibujo/lo1.png" width="191" height="53" alt="FormaX">       </h1>


    <ol class="left nav-global">
      
      
          <li class="nav-global-04">
            <a class="cta cta-register" href="#">GESTIÓN ADMINISTRATIVA DE CUENTAS POR COBRAR</a>
          </li>
    </ol>

   
  </nav>
</header>

  


  <header>
    <h1 class="title">
      <span class="title-super">Por favor Ingrese su usuario y su clave </span>
      <span class="title-sub">para iniciar sesion </span>    </h1>
  </header>


<section class="login container">
  <section role="main" class="content">
    
<form name="forma" action="" method="POST"  onSubmit="return validar();">
     

     

      <div class="group group-form group-form-requiredinformation">
        
        <ol class="list-input">
          <li class="field required text" id="field-email">
            <label for="email">Usuario</label>
            <input name="cuenta" type="text" id="cuenta"  style="height:29px;width:273px;margin-left: 0px"   maxlength="15" > 
            
          </li>
          <li class="field required password" id="field-password">
            <label for="password">Contraseña</label>
			  <input name="clave" type="password" id="clave"  style="height:29px;width:273px;margin-left: 0px"   maxlength="15" > 
			
          
           
          </li>
        </ol>
      </div>

      


      <div style="text-align:center" class="form-actions">
        <button name="submit" type="submit" id="submit"  aria-disabled="false">Iniciar sesión  </button>
      </div>
    </form>


  </section>

  <aside role="complementary">



    

<div class="cta cta-help">
  <h3></h3>
  
</div>


  </aside>
  </section>


      
    </div>

    
      
  
  
      





<div class="wrapper wrapper-footer">
  <!-- Footer -->
    <footer id="footer">
    <!--<div class="inline">
      <ul>
        <li><a id="about" href="/about">Acerca de</a></li>
        <li><a id="faq" href="/faq">Preguntas Frecuentes</a></li>
      </ul>
    </div>-->
    <div class="inline_second">
      <ul class="icons">
        
        <li class="nav-global-01"><a href="#">Si olvido su datos de acceso</a></li>
        <li class="nav-global-01"><a href="#">Contactarse con el Administrador del sistema</a></li>
        <li class="nav-global-01"><a href="#">Derechos Reservados</a></li>
      </ul>
    </div>
    </footer>
</div>

    

  </div>

    


  
 </body></html>