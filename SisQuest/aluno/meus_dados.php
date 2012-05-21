<?php
include("../dao/seguranca.php");
include("../dao/usuarioDao.php");
protegePagina();
$resulado_linha = visualizar_cadastro();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SisQuest</title>
<link rel="stylesheet" href="../styles.css" type="text/css" />
<!--
sworm, a free CSS web template by spyka Webmaster (www.spyka.net)

Download: http://www.spyka.net/web-templates/sworm/

License: Creative Commons Attribution
//-->
</head>
<body>
<div id="container">
	<div id="header">
    	<h1><a href="/">SisQuest</a></h1>
        <h2>SoluÃ§Ãµes prÃ¡ticas em aprendizado</h2>
        <div class="clear"></div>
    </div>
    <div id="nav">
    	<ul>
        	<li><a href="principal.php">INÃ�CIO</a></li>
        	<li><a href="#">RESOLVER QUESTÃ•ES</a></li>
            <li><a href="#">SOBRE</a></li>
            <li class="start selected"><a href="meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
        
    </div>
    <div id="body">
	  <div id="content">
		    
            <h3>Meus Dados</h3>
				<fieldset>
                	<legend>Insira os dados</legend>           
           	    	<form action="alterar_dados.php" method="post">
               			<p><label for="login">Login: *</label>
                   		<input type="text" name="input_login" id="input_login"  value="<?php echo $resulado_linha['Usuario_Login']?>" /></p>
  						
  						<p><label for="nome">Nome: *</label>		
      					<input type="text" class="textLogin" name="input_nome" id="input_nome"  value="<?php echo $resulado_linha['Nome']?>" /></p>
  
					    <p><label for="datanasc">Data de Nascimento: *</label>
      					<input type="text" name="input_data" id="input_data"  value="<?php echo $resulado_linha["DATE_FORMAT( Data_Nascimento,  '%d/%m/%Y' )"]?>" /></p>
  
    					<p><label for="telefone">Telefone: *</label>
    					<input type="text" name="input_tel" id="input_tel"  value="<?php echo $resulado_linha['Telefone']?>" /></p>
  
     					<p><label for="email">E-mail: *</label>
     					<input type="text" name="input_email" id="input_email"  value="<?php echo $resulado_linha['Email']?>" /></p>
    
      					<p><label for="rua">Rua: *</label>
      					<input type="text"  class="textLogin" name="input_rua" id="input_rua"  value="<?php echo $resulado_linha['Rua']?>" /></p>
    
    					<p><label for="numero">NÃºmero da casa: *</label>
      					<input type="text" name="input_numero" id="input_numero" value="<?php echo $resulado_linha['Numero']?>" /></p>
      
      					<p><label for="bairro">Bairro: *</label>
      					<input type="text" class="textLogin" name="input_bairro" id="input_bairro"  value="<?php echo $resulado_linha['Bairro']?>" /></p>
  
      					<p><label for="complemento">Complemento: </label>
      					<input type="text" class="textLogin" name="input_comp" id="input_comp" value="<?php echo $resulado_linha['Complemento']?>" /></p>
    
    					<p><label for="estado">Cidade: *</label>
    					<input type="text"  class="textLogin" name="input_cidade" id="input_cidade" value="<?php echo $resulado_linha['Cidade']?>" /></p>
  
     	 				<p><label for="estado">Estado: *</label>
     	 				<input type="text" name="input_estado" id="input_estado" value="<?php echo $resulado_linha['Estado']?>" /></p>
 
      					<p><label for="cep">CEP: *</label>
      					<input type="text" name="input_cep" id="input_cep"  value="<?php echo $resulado_linha['Cep']?>" /></p>
  
  <p><label for="tipousuario">Tipo de UsuÃ¡rio: *</label>
        <?php  switch($resulado_linha['TipoUsuario']){
	case 1:
	echo ('<input type = "radio" name ="tipousuario" value= "1" checked="true"/>Administrador');
	break;
	case 2:
	echo ('<input type = "radio" name ="tipousuario" value= "2" checked="true"/>Professor');
	break;
	case 3:
	echo ('<input type = "radio" name ="tipousuario" value= "3" checked="true"/>Aluno');
	break;
}?>
  </p>
 
  <p><input type="submit" style="margin-left: 150px;" class="formbutton" name="button_alterar" id="button_alterar" value="Alterar Dados" /></p>
  
               </form>
            </fieldset>
           
            
        </div>
		<div class="clear"></div>
    </div>
    <div id="footer">
       
        <div class="footer-bottom">
            <p>&copy; YourSite 2010. Design by <a href="http://www.spyka.net">Free CSS Templates</a> | <a href="http://www.justfreetemplates.com">Free Web Templates</a></p>
         </div>
    </div>
</div>
</body>
</html>
