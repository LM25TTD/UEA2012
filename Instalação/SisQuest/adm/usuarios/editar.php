<?php
include("../../servico/usuarioConsulta.php");
protegePagina(TIPO_ADM);

$login = $_GET['login'];
$linha = usuarioConsultaEdicaoServico($login,$_SG['link']);

function verificaTipoUsuario($tipo,$resultadoConsulta){
	if ($tipo==$resultadoConsulta){
		return "checked=\"checked\"";
	}
	return "";
}

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
			            
            <h3>Editar usuário</h3>

            <fieldset>
                <legend>Insira os dados</legend>
                <form action="../../servico/usuarioAtualizar.php" method="post" onsubmit="return (verifica(this))">
                    <input type="hidden" name="login" id="login" value="<?php echo $linha['Usuario_Login']?>" />
                                                       
                    <p><label for="nome">Nome: *</label>
                    <input name="nome" id="nome" type="text" value="<?php echo $linha['Nome']?>" class="textLogin" /></p>
                    <p><label for="login">Login: *</label>
                    <strong><?php echo $linha['Usuario_Login']?></strong><a style="margin-left: 150px" href="alterarSenha.php?login=<?php echo $linha['Usuario_Login']?>">Alterar Senha</a> </p>
                                        
              <p><label for="datanasc">Data de Nascimento: *</label>
                    <input name="datanasc" id="datanasc" type="text" value="<?php echo $linha["DATE_FORMAT( Data_Nascimento,  '%d/%m/%Y' )"]?>" onkeypress="return mascaraData(event);" maxlength="10" /></p> 
   			<p><label for="telefone">Telefone: *</label>
                    <input name="telefone" id="telefone" type="text" value="<?php echo $linha['Telefone']?>" onkeypress="return mascaraTelefone(event);" maxlength="13"/></p>       
             <p><label for="email">E-mail: *</label>
                    <input name="email" id="email" value="<?php echo $linha['Email']?>" type="text" /></p>              
             <p><label for="rua">Rua: *</label>
                    <input name="rua" id="rua" value="<?php echo $linha['Rua']?>" type="text" class="textLogin" /></p>        
                    
                    
   					<p><label for="numero">Número da casa: *</label>
                    <input name="numero" id="numero" type="text" value="<?php echo $linha['Numero']?>" onkeypress="return somenteNumeros(event);"/></p>                  
                   <p><label for="bairro">Bairro: *</label>
                    <input name="bairro" id="bairro" type="text" value="<?php echo $linha['Bairro']?>" class="textLogin" /></p>      
                    <p><label for="complemento">Complemento: </label>
                    <input name="complemento" id="complemento" value="<?php echo $linha['Complemento']?>" type="text" class="textLogin" /></p>           		
                    <p><label for="cidade">Cidade: *</label>
                     <input name="cidade" id="cidade" value="<?php echo $linha['Cidade']?>" type="text" class="textLogin" /></p>      
                <p><label for="estado">Estado: *</label>
                    <input name="estado" id="estado" value="<?php echo $linha['Estado']?>" type="text" /></p>   
                 <p><label for="cep">CEP: *</label>
                    <input name="cep" id="cep" type="text" value="<?php echo $linha['Cep']?>" onkeypress="return mascaraCep(event);" maxlength="9"/></p>        
                 

                    <p><label for="tipousuario">Tipo de Usuário: *</label>
                <input type = "radio" name ="tipousuario" value= "1" <?php echo verificaTipoUsuario(1, $linha['TipoUsuario'])?>/>Administrador
                <input type = "radio" name ="tipousuario" value= "2" <?php echo verificaTipoUsuario(2, $linha['TipoUsuario'])?>/>Professor
                <input type = "radio" name ="tipousuario" value= "3" <?php echo verificaTipoUsuario(3, $linha['TipoUsuario'])?>/>Aluno
                
</p>


                    <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Salvar" type="submit" /><a class="linkOperacao"href="filtro.php">Cancelar e Voltar</a></p>
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
