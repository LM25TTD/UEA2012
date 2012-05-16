<?php 
include($_SERVER['DOCUMENT_ROOT']."/SisQuest/servico/disciplinaConsulta.php");
protegePagina();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SisQuest</title>
<link rel="stylesheet" href="../../styles.css" type="text/css" />
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
        	<li class="start"><a href="../principal.php">INÍCIO</a></li>
            <li class="selected"><a href="../cadastros.php">CADASTROS</a></li>
            <li><a href="#">RESOLVER QUESTÕES</a></li>
            <li><a href="#">SOBRE</a></li>
            <li><a href="../meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
    </div>
    <div id="body">
		<div id="content">
        <fieldset>
        <legend>Operações</legend>
        
			<p><a class="linkOperacao"href="cadastro.php">Novo</a>
		  		<a class="linkOperacao" href="#">Excluir</a>
             </p>
            
          </fieldset>
            
            
            <h3>Questões Cadastradas</h3>
			
            <table cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>Enunciado</th>
                    <th>Assunto</th>
                    <th>Área</th>
                    <th>Disciplina</th>
                    
                    
                    
                </tr>
               

            </table>

            <p>&nbsp;</p>
       </div>
        
        <div class="sidebar">
            <ul>	
               <li>
                    <h3>Itens para Cadastro</h3>
                    <ul class="blocklist">
                        <li><a  href="../area/filtro.php">ÁREAS</a></li>
                        <li><a href="../assunto/filtro.php">ASSUNTOS</a></li>
                        <li><a href="../disciplina/filtro.php">DISCIPLINAS</a></li>
                        <li><a style="background-color:#23193D;color:#FFFFFF" href="filtro.php">QUESTÕES</a></li>
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
