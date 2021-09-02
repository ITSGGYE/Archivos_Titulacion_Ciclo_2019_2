 $("#frmAcceso").on('submit',function(e)
{
   e.preventDefault();
   acceso=$("#acceso").val();
   clave=$("#clave").val();

   $.post("../ajax/persona.php?op=verificar",
       {"acceso":acceso,"clave":clave},
       function(data)
   {
       if (data!="null")
       {
           $(location).attr("href","escritorio.php");            
       }
       else
       {
        swal(" ", "Usuario y/o Password incorrectos", "error");   
       }
   });
})
