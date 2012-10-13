function checkMail(mail){
        var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
        if(typeof(mail) == "string"){
                if(er.test(mail)){ return true; }
        }else if(typeof(mail) == "object"){
                if(er.test(mail.value)){ 
                                        return true; 
                                }
        }else{
                return false;
                }
}

function VerificaData(digData) 
{
        var bissexto = 0;
        var data = digData; 
        var tam = data.length;
        if (tam == 10) 
        {
                var dia = data.substr(0,2);
                var mes = data.substr(3,2);
                var ano = data.substr(6,4);
                if ((ano > 1900)||(ano < 2100))
                {
                        switch (mes) 
                        {
                                case '01':
                                case '03':
                                case '05':
                                case '07':
                                case '08':
                                case '10':
                                case '12':
                                        if  (dia <= 31) 
                                        {
                                                return true;
                                        }
                                        break;
                                
                                case '04':              
                                case '06':
                                case '09':
                                case '11':
                                        if  (dia <= 30) 
                                        {
                                                return true;
                                        }
                                        break;
                                case '02':
                                        if ((ano % 4 == 0) || (ano % 100 == 0) || (ano % 400 == 0)) 
                                        { 
                                                bissexto = 1; 
                                        } 
                                        if ((bissexto == 1) && (dia <= 29)) 
                                        { 
                                                return true;                             
                                        } 
                                        if ((bissexto != 1) && (dia <= 28)) 
                                        { 
                                                return true; 
                                        }                       
                                        break;                                           
                        }
                }
        }       
        return false;
}

function existemItensParaExcluir(){
	var aChk = document.getElementsByName("excluir[]");
    for(var i=0;i<aChk.length;i++){
        if (aChk[i].checked){
           return true;
        } 
    }
	alert("Nenhum Item foi selecionado!");
	return false;
	  
}
