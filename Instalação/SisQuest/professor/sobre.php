<?php
include("../dao/seguranca.php");
protegePagina(TIPO_PROFESSOR);
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
        <h2>Soluções práticas em aprendizado</h2>
        <div class="clear"></div>
    </div>
    <div id="nav">
    	<ul>
        	<li class="start"><a href="principal.php">INÍCIO</a></li>
            <li><a href="cadastros.php">CADASTROS</a></li>
            <li><a href="resolver_questoes.php">RESOLVER QUESTÕES</a></li>
            <li class="selected"><a href="sobre.php">SOBRE</a></li>
            <li><a href="meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
        
    </div>
    <div id="body">
	  <div id="content">
		    
            <h3>Sobre o SisQuest</h3>
           
           	 <blockquote>
           	   <p>O sistema de aprendizado SisQuest foi desenvolvido em âmbito acadêmico como parte da avaliação na disciplina de Banco de Dados II na Universidade do Estado do Amazonas, curso de Engenharia da Computação, além disso pode ser utilizado livremente como auxiliar em seus estudos.</p>
           	   <p>&nbsp; </p>
           	   <p>Envolvidos no Projeto:</p>
           	   <p>	- Leandro Maurício Araújo Bentes: Acadêmico do curso de Engenharia da Computação</p>
           	   <p>Email: <a href="mailto:lm25ttd@gmail.com">lm25ttd@gmail.com</a></p>
           	   <p>&nbsp;</p>
           	   <p>- Kevin Gustavo Montero Quispe: Acadêmico do curso de Engenharia da Computação</p>
           	   <p>Email: <a href="mailto:kevingmq@gmail.com">kevingmq@gmail.com</a></p>
               
               
        </blockquote>
           
            
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
