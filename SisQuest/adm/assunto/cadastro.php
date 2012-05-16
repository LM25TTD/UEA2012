<?php 
include($_SERVER['DOCUMENT_ROOT']."/SisQuest/dao/seguranca.php");
protegePagina();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../../scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../scripts/comboAssunto.js"></script>

<title>SisQuest</title>
<link rel="stylesheet" href="../../styles.css" type="text/css" />

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
            <li><a href="#">RESOLVER QUESTÕES</a></li>
            <li><a href="#">SOBRE</a></li>
            <li><a href="index.html">MEUS DADOS</a></li>
        <li class="end"><a href="../../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
    </div>
    <div id="body">
		<div id="content">
			            
            <h3>Cadastro de assuntos</h3>

            <fieldset>
                <legend>Insira os dados</legend>
                <form action="" method="post">
                    
                    <p><label for="area">Área: *</label>                    
                    <select name="area" id="area" class="textLogin">
                    </select></p>
                    
                    <p><label for="disciplina">Disciplina: *</label>
                    
                    <select name="disciplina" id="disciplina" class="textLogin">
                    	<option value="0">--Primeiro selecione a área--</option> 
                    </select></p>
                    
                    <p><label for="nome">Nome do assunto: *</label>
                    <input name="nome" id="nome" value="" type="text" class="textLogin" /></p>

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
                        <li><a style="background-color:#23193D;color:#FFFFFF"   href="filtro.php">ASSUNTOS</a></li>
                        <li><a href="../disciplina/filtro.php">DISCIPLINAS</a></li>
                        <li><a href="../questoes/filtro.php">QUESTÕES</a></li>
                        <li><a href="../usuarios/filtro.php">USUÁRIOS</a></li>
                    </ul>
                </li>
                
                
                
          </ul>  
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
