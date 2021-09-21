function solonumero (e) {
            key=e.keycode || e.which;

            teclado=String.fromCharCode(key);

            letras="1234567890";

            especiales="8-37-38-46";

            teclado_especial=false;

            for(var i in especiales){

              if(key==especiales[i]){

                teclado_especial=true;

              }
            }

            if(letras.indexOf(teclado)==-1 && !teclado_especial){
              
              return false;
            }

             // body...
           }
