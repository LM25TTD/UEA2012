<?php
include("../dao/seguranca.php");
include("../dao/usuarioDao.php");
protegePagina(TIPO_PROFESSOR);
$resultado_linha = visualizar_cadastro();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SisQuest</title>
<link rel="stylesheet" href="../styles.css" type="text/css" />
<script type="text/javascript" src="../scripts/mascaras.js"></script>
<script type="text/javascript" src="../scripts/confirmarEnviar.js"></script>
<!--
sworm, a free CSS web template by spyka Webmaster (www.spyka.net)

Download: http://www.spyka.net/web-templates/sworm/

License: Creative Commons Attribution
//-->
<script language="javascript">
 function verifica(form)
 {
        if (form.senhaatual.value.length<1) 
        {
         alert("Senha Atual é um campo obrigatório!");
  		 return(false);
        }else{
        	if (form.novasenha.value.length<1) 
            {
             alert("Nova Senha é um campo obrigatório!");
      		 return(false);
            }else{
            	if (form.confsenha.value.length<1) 
                {
                 alert("Você deve confirmar sua senha!");
          		 return(false);
                }else{
                	if(form.novasenha.value != form.confsenha.value){
                		 	alert("Nova senha e confirmação não coincidem");
                		 	return(false);
                	}
                }
            }
        }
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
        	<li><a href="principal.php">INÍCIO</a></li>
        	<li><a href="cadastros.php">CADASTROS</a></li>
        	<li><a href="resolver_questoes.php">RESOLVER QUESTÕES</a></li>
            <li><a href="sobre.php">SOBRE</a></li>
            <li class="start selected"><a href="meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
        
    </div>
    <div id="body">
	  <div id="content">
		    
            <h3>Alterar Senha</h3>
				<fieldset>
                	<legend>Insira os dados</legend>           
           	    	<form action="../servico/alterarSenha.php" name="dados" method="post" onSubmit="return (verifica(this))">
               			<input type="hidden" name="login" id="login" value="<?php echo $resultado_linha['Usuario_Login']?>" />
               			  						
  						<p><label for="nome">Senha Atual: *</label>		
      					<input type="password" class="textLogin" name="senhaatual" id="senhaatual"/></p>
  
  						<p>&nbsp</p>
  
  						<p><label for="nome">Nova Senha: *</label>		
      					<input type="password" class="textLogin" name="novasenha" id="novasenha"/></p>
  	
  						<p><label for="nome">Confirme Nova Senha: *</label>		
      					<input type="password" class="textLogin" name="confsenha" id="confsenha"/></p>
  
					  
  
  <p>&nbsp;</p>
 
  <p><input type="submit" style="margin-left: 150px;" class="formbutton" name="button_alterar" id="button_alterar" value="Confirmar" /><a class="linkOperacao" href="principal.php">Cancelar e Voltar</a></p>
  
               </form>
            </fieldset>
           
            
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
