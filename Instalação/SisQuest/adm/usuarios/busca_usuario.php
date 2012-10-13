<?php
include("../../dao/seguranca.php");
include("../../dao/usuarioDao.php");
protegePagina(TIPO_ADM);
$resulado_linha = usuarioBusca(trim($_POST['s']), $_SG['link']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SisQuest</title>
<link rel="stylesheet" href="../../styles.css" type="text/css" />
<script type="text/javascript" src="../../scripts/mascaras.js"></script>
<script type="text/javascript" src="../../scripts/confirmarEnviar.js"></script>
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
        <h2>Soluções práticas em aprendizado</h2>
        <div class="clear"></div>
    </div>
    <div id="nav">
    	<ul>
        	<li><a href="../principal.php">INÍCIO</a></li>
        	<li><a href="../cadastros.php">CADASTROS</a></li>
        	<li><a href="../resolver_questoes.php">RESOLVER QUESTÕES</a></li>
            <li><a href="../sobreAdm.php">SOBRE</a></li>
            <li class="start"><a href="../meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
        
    </div>
    <div id="body">
	  <div id="content">
		    
		    <?php if (isset($resulado_linha['Usuario_Login'])){ ?>
            <h3>Dados do Usuário</h3>
				<fieldset>
               			<p><label for="login">Login: </label>
                   		<strong><?php echo $resulado_linha['Usuario_Login']?></strong></p>
  						
  						<p><label for="nome">Nome: </label>		
      					<strong><?php echo $resulado_linha['Nome']?></strong> </p>
  
					    <p><label for="datanasc">Data de Nascimento: </label>
      					<strong><?php echo $resulado_linha["DATE_FORMAT( Data_Nascimento,  '%d/%m/%Y' )"]?></strong></p>
  
    					<p><label for="telefone">Telefone: </label>
    					<strong><?php echo $resulado_linha['Telefone']?></strong></p>
  
     					<p><label for="email">E-mail: </label>
     					<strong><?php echo $resulado_linha['Email']?></strong></p>
    
      					<p><label for="rua">Rua: </label>
      					<strong><?php echo $resulado_linha['Rua']?></strong></p>
    
    					<p><label for="numero">Número da casa: </label>
      					<strong><?php echo $resulado_linha['Numero']?></strong></p>
      
      					<p><label for="bairro">Bairro: </label>
      					<strong><?php echo $resulado_linha['Bairro']?></strong></p>
  
      					<p><label for="complemento">Complemento: </label>
      					<strong><?php if($resulado_linha['Complemento']!=null) echo $resulado_linha['Complemento']; else echo "--";?></strong></p>
    
    					<p><label for="estado">Cidade: </label>
    					<strong><?php echo $resulado_linha['Cidade']?></strong></p>
  
     	 				<p><label for="estado">Estado: </label>
     	 				<strong><?php echo $resulado_linha['Estado']?></strong></p>
 
      					<p><label for="cep">CEP: </label>
      					<strong><?php echo $resulado_linha['Cep']?></strong></p>
  
  <p><label for="tipousuario">Tipo de Usuário: *</label>
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
  			</fieldset>
  		    <?php }else{ ?>
  
  
  			<div align='center'><h3>Usuário não Encontrado!</h3></div>
  
  
  

  		    
  		    
  		    <?php }?>
  		    
  		    <br/><br/>
  			<form>
 			<p><a class="linkOperacao"href="editar.php?login=<?php echo $resulado_linha['Usuario_Login']?>">Editar</a><input class="formbutton" style="margin-left: 150px;" onclick="location.href='javascript:history.back();' " type='button' value="Voltar"/> </p>
            </form>
            
            
            
           
            
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
