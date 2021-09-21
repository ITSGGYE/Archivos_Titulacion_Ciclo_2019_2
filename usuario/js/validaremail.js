			
			function revisarEmail(elemento){
				if(elemento.value!==''){
					var data = elemento.value;
					var exp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					if(!exp.test(data)){
						elemento.className='error';
					}else{
						elemento.className='input';
					}	
				}
			}
			
			function validar(){
				
				
				var exp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				if(!exp.test(document.getElementById("email").value)){
					datosCorrectos=false;
					error="\n Email Invalido";
				}
				
				
				if(!datosCorrectos){
					alert('Hay Errores En El formulario'+error);
				}
				
				return datosCorrectos;
				
			}
			
			
		