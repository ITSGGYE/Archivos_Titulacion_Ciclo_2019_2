<!DOCTYPE html>
<html>
<head>
  <head>
   <title>Consultorio Odontologico</title>
   <link rel="stylesheet" href="css/registrar.css">
 </head>
 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
 </script>
 </script>
 <script type="text/javascript" src="js/validaremail.js"></script>
 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
 <script type="text/javascript" src="js/vision.js"></script>
 <link rel="icon" href="../imagen/logooo.png" type="image" >
</head>
<body style="background: url(img/tu.jpg) no-repeat;
background-attachment: fixed;
background-size: cover;">
<form action="registro.php" method="post" style="border: 5px; border-color:#43B8A1" onsubmit="return validar()">
  <BR> 
  <div><img src="img/logooo.png"></div>
  <h2 >Registrate</h2>
  <br>
  <input type="text"  name="cedula" placeholder="&#128272;  Ingrese cedula  " maxlength="10" required="" title="Cedula" onKeyPress="return SoloNumeros(event);">
  <label style="font-size:10px;position: absolute; top: 21% ;right: 58%;">Recomienda su cedula</label>
  <br><br><br>
  <input type="text"  name="nombre" placeholder="&#128272; Ingrese Primer Nombre y dos Apellido" title="Primer Nombre y dos Apellido" required autofocus onkeypress="return soloLetras(event);">
  <label style="font-size:10px;position: absolute; top: 31% ;right: 58%;">Recomienda  nombres</label>
  <br><br><br>
  <input type="text"  name="telefono" placeholder="&#128272;  Ingrese telefono " title="Telefono" maxlength="10" onKeyPress="return SoloNumeros(event);">
  <label style="font-size:10px;position: absolute; top: 40% ;right: 55%;">Recomienda su telefono</label><br><br><br>
  
  <input type="text" class="input" placeholder="Email*" id="email" name="correo" title="Correo Electronico" onblur="revisar(this); revisarEmail(this)" onkeyup="revisar(this); revisarEmail(this)" autocomplete="off" required>
  <label style="font-size:10px;position: absolute; top: 49% ;right: 58%;">Recomienda su correo</label>
  <br><br>
  <div class="input-group">
    <input class="Contraseña" type="password"  name="contrasena" placeholder="&#128272; Contraseña" title="Contraseña" required autofocus>
    <span  id="show-hide-passwd" action="hide" class="input-group-addon glyphicon glyphicon glyphicon-eye-open"></span>
  </div>
  <br>
  <input type="password" name="rpass" placeholder="&#128272; REPITA CONTRASENA" required autofocus>
  <br> <br> 
  <input type="date" name="fecha"  title="Fecha Nacimiento"    required >
  <label style="font-size:10px;position: absolute; top: 74% ;right: 64%;"> Fecha  nacimiento</label>
  <br>    <br>  
  <select style="margin: -50px 40px; width: 80%;" name="genero" class="form-control" required title="Genero"  >
    <option ></option>
    <option  value="Masculino">Masculino</option>
    <option  value="Femenino">Femenino</option>
  </select>
  <label  style="font-size:10px;position: absolute; top: 81% ;right:61%;">Recomienda  genero</label>
  <br><br>
  <br>
  <br><br>
  <br><br>
  <button type="submit" name="submit" >REGISTRAR</button>
  <p>¿Ya te has registrado?<a href="login.php">Iniciar Sesion</a></p> 
  
</center>
</form>

</div>
<script >
  
//Se utiliza para que el campo de texto solo acepte numeros
function SoloNumeros(evt){
 if(window.event){//asignamos el valor de la tecla a keynum
  keynum = evt.keyCode; //IE
}
else{
  keynum = evt.which; //FF
} 
 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
 if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
  return true;
}
else{ 
  alert('Tecla de texto no aceptada');
  return false;
}
}
</script>
<script >//Se utiliza para que el campo de texto solo acepte letras
function soloLetras(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.
    tecla_especial = false
    for(var i in especiales) {
      if(key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial){
      alert('Tecla numerica no aceptada');
      return false;
    }
  }</script>
</body>
</html> 