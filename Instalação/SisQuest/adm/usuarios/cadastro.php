<?php
include("../../servico/usuarioConsulta.php");
protegePagina(TIPO_ADM);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SisQuest</title>
<link rel="stylesheet" href="../../styles.css" type="text/css" />
<script type="text/javascript" src="../../scripts/mascaras.js"></script>
<script type="text/javascript" src="../../scripts/check.js"></script>

<!--
sworm, a free CSS web template by spyka Webmaster (www.spyka.net)

Download: http://www.spyka.net/web-templates/sworm/

License: Creative Commons Attribution
//-->
<script language="javascript">
 function verifica(form)
 {
        if (form.nome.value.length<1) 
        {
         alert("Nome é um campo obrigatório!");
  		 return(false);
        }else{
        	if (form.login.value.length<1) 
            {
             alert("Login é um campo obrigatório!");
      		 return(false);
            }else{
            	if (form.senha.value.length<1) 
                {
                 alert("Senha é um campo obrigatório!");
          		 return(false);
                }else{
                	if((form.datanasc.value.length<1)||(!VerificaData(form.datanasc.value))){
                		 	alert("Data de Nascimento em branco ou inválida!");
              		 		return(false);
                		}else{
                			if(form.telefone.value.length<1){
                    		 	alert("Telefone é um campo obrigatório!");
                  		 		return(false);
                    		}else{
                    			if((form.email.value.length<1)||!checkMail(form.email.value)){
                        		 	alert("Email em branco ou inválido!");
                      		 		return(false);
                        		}else{
                        			if(form.rua.value.length<1){
                            		 	alert("Rua é um campo obrigatório!");
                          		 		return(false);
                            		}else{
                            			if(form.numero.value.length<1){
                                		 	alert("Numero da Casa é um campo obrigatório!");
                              		 		return(false);
                                		}else{
                                			if(form.bairro.value.length<1){
                                    		 	alert("Bairro é um campo obrigatório!");
                                  		 		return(false);
                                    		}else{
                                    			if(form.cidade.value.length<1){
                                        		 	alert("Cidade é um campo obrigatório!");
                                      		 		return(false);
                                        		
                                    		}else{
                                    			if(form.estado.value.length<1){
                                        		 	alert("Estado é um campo obrigatório!");
                                      		 		return(false);
                                        		}else{
                                        			if(form.cep.value.length<1){
                                            		 	alert("CEP é um campo obrigatório!");
                                          		 		return(false);
                                            		}	
                                    		}		
                                		
                                	}					
                        		}		
                    		}		
					

                    }
                }

             }
        	}
        }
            }
        }
        return(true);  
 }
</script>
</head>
<body>
<div id="container">
	<div id="header">
    	<h1><a href="/">SisQuest</a></h1>
        <h2>Soluções práticas em aprendizado</h2>
        <div class="clear"></div>
    </div>
    <div id="nav">
    	<ul>
        	<li class="start"><a href="../principal.php">INÍCIO</a></li>
            <li class="selected"><a href="../cadastros.php">CADASTROS</a></li>
            <li><a href="../resolver_questoes.php">RESOLVER QUESTÕES</a></li>
            <li><a href="../sobreAdm.php">SOBRE</a></li>
            <li><a href="../meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
    </div>
    <div id="body">
		<div id="content">
			            
            <h3>Cadastro de usuários</h3>

            <fieldset>
                <legend>Insira os dados</legend>
                <form action="../../servico/usuarioCadastro.php" method="post" onsubmit="return (verifica(this))">
                    
                                       
                    <p><label for="nome">Nome: *</label>
                    <input name="nome" id="nome" type="text" class="textLogin" /></p>
                    <p><label for="login">Login: *</label>
                    <input name="login" id="login" type="text" class="textLogin" /></p>
                    <p><label for="senha">Senha: *</label>
                    <input name="senha" id="senha" type="password" /></p>
                    
              <p><label for="datanasc">Data de Nascimento: *</label>
                    <input name="datanasc" id="datanasc" type="text" onkeypress="return mascaraData(event);" maxlength="10" /></p> 
   			<p><label for="telefone">Telefone: *</label>
                    <input name="telefone" id="telefone" type="text" onkeypress="return mascaraTelefone(event);" maxlength="13"/></p>       
             <p><label for="email">E-mail: *</label>
                    <input name="email" id="email" type="text" /></p>              
             <p><label for="rua">Rua: *</label>
                    <input name="rua" id="rua" type="text" class="textLogin" /></p>        
                    
                    
   					<p><label for="numero">Número da casa: *</label>
                    <input name="numero" id="numero" type="text" onkeypress="return somenteNumeros(event);"/></p>                  
                   <p><label for="bairro">Bairro: *</label>
                    <input name="bairro" id="bairro" type="text" class="textLogin" /></p>      
                    <p><label for="complemento">Complemento: </label>
                    <input name="complemento" id="complemento" type="text" class="textLogin" /></p>           		
                    <p><label for="cidade">Cidade: *</label>
                     <input name="cidade" id="cidade" type="text" class="textLogin" /></p>      
                <p><label for="estado">Estado: *</label>
                    <input name="estado" id="estado" type="text" /></p>   
                 <p><label for="cep">CEP: *</label>
                    <input name="cep" id="cep" type="text" onkeypress="return mascaraCep(event);" maxlength="9"/></p>        
                 

                    <p><label for="tipousuario">Tipo de Usuário: *</label>
                <input type = "radio" name ="tipousuario" value= "1" checked="true"/>Administrador
                <input type = "radio" name ="tipousuario" value= "2" 
/>Professor
                <input type = "radio" name ="tipousuario" value= "3" 
/>Aluno
                
</p>

                    <p>* Campos Obrigatórios</p>

                    <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Cadastrar" type="submit" /><a class="linkOperacao"href="filtro.php">Cancelar e Voltar</a></p>
                </form>
            </fieldset>
            
        </div>
        
        <div class="sidebar">
            <ul>	
               <li>
                    <h3>Itens para Cadastro</h3>
                    <ul class="blocklist">
                        <li><a href="../area/filtro.php">ÁREAS</a></li>
                        <li><a    href="../assunto/filtro.php">ASSUNTOS</a></li>
                        <li><a href="../disciplina/filtro.php">DISCIPLINAS</a></li>
                        <li><a href="../questoes/filtro.php">QUESTÕES</a></li>
                        <li><a style="background-color:#23193D;color:#FFFFFF"href="filtro.php">USUÁRIOS</a></li>
                    </ul>
                </li>
                
                
                
          </ul>  
        </div>
    	<div class="clear"></div>
    </div>
    <div id="footer">
        <div class="footer-bottom">
            <p>&copy; SisQuest 2012. Design by <a href="http://www.spyka.net">Free CSS Templates</a> | <a href="http://www.justfreetemplates.com">Free Web Templates</a></p>
         </div>
    </div>
</div>
</body>
</html>
