function mascaraData(evento){  
    
   var campo, valor, i, tam, caracter, mascara;  
   var bksp = 8;
   var key_0 = 48;
   var key_9 = 57;
   
   mascara = "99/99/9999";
	
   if(document.all){  // Internet Explorer
		tecla = evento.keyCode; 
   }else if(document.getElementById){ // Nestcape
  		tecla = evento.which;
   }
   
   if (document.all) // Internet Explorer  
	      campo = evento.srcElement;  
	   else // Nestcape, Mozzila  
	       campo= evento.target;
   
   if ( tecla == bksp || (tecla >= key_0 && tecla <= key_9)){
		   valor = campo.value;  
		   tam = valor.length;  
		     
		   for(i=0;i<mascara.length;i++){  
		      caracter = mascara.charAt(i);  
		      if(caracter!="9")
		         if(i<tam & caracter!=valor.charAt(i))  
		            campo.value = valor.substring(0,i) + caracter + valor.substring(i,tam);  
		                 
		}
	}else{	
		return false;
	}
}

function mascaraTelefone(evento){  
    
	   var campo, valor, i, tam, caracter, mascara;  
	   var bksp = 8;
	   var key_0 = 48;
	   var key_9 = 57;
	   
	   mascara = "(99)9999-9999";
		
	   if(document.all){  // Internet Explorer
			tecla = evento.keyCode; 
	   }else if(document.getElementById){ // Nestcape
	  		tecla = evento.which;
	   }
	   
	   if (document.all) // Internet Explorer  
		      campo = evento.srcElement;  
		   else // Nestcape, Mozzila  
		       campo= evento.target;
	   
	   if ( tecla == bksp || (tecla >= key_0 && tecla <= key_9)){
			   valor = campo.value;  
			   tam = valor.length;  
			     
			   for(i=0;i<mascara.length;i++){  
			      caracter = mascara.charAt(i);  
			      if(caracter!="9")
			         if(i<tam & caracter!=valor.charAt(i))  
			            campo.value = valor.substring(0,i) + caracter + valor.substring(i,tam);  
			                 
			}
		}else{	
			return false;
		}
	}

function somenteNumeros(numero) {

	if(document.all){ // Internet Explorer
		tecla = numero.keyCode;
	}
	else if(document.getElementById){ // Nestcape/FireFox
		tecla = numero.which;
	}
		
	//tecla==8 é para permitir o backspace funcionar para apagar
	if ( (tecla >= 48 && tecla <= 57) || tecla == 8 || tecla == 0 ) {
		return true;
	}
	else {
		return false;
	}
}

function mascaraCep(evento){  
    
	   var campo, valor, i, tam, caracter, mascara;  
	   var bksp = 8;
	   var key_0 = 48;
	   var key_9 = 57;
	   
	   mascara = "99999-999";
		
	   if(document.all){  // Internet Explorer
			tecla = evento.keyCode; 
	   }else if(document.getElementById){ // Nestcape
	  		tecla = evento.which;
	   }
	   
	   if (document.all) // Internet Explorer  
		      campo = evento.srcElement;  
		   else // Nestcape, Mozzila  
		       campo= evento.target;
	   
	   if ( tecla == bksp || (tecla >= key_0 && tecla <= key_9)){
			   valor = campo.value;  
			   tam = valor.length;  
			     
			   for(i=0;i<mascara.length;i++){  
			      caracter = mascara.charAt(i);  
			      if(caracter!="9")
			         if(i<tam & caracter!=valor.charAt(i))  
			            campo.value = valor.substring(0,i) + caracter + valor.substring(i,tam);  
			                 
			}
		}else{	
			return false;
		}
	}
