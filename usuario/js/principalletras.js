function sololetras (e) {
            key=e.keycode || e.which;

            teclado=String.fromCharCode(key).toLowerCase();

            letras="a b c d e f g h i g j k l m n ñ o p q r s t u v w x y z";

            especiales="8-37-38-46-164";

            teclado_especial=false;

            for(var i in especiales){

              if(key==especiales[i]){

                teclado_especial=true;break;

              }
            }

            if(letras.indexOf(teclado)==-1 && !teclado_especial){
              
              return false;
            }

             // body...
           }
