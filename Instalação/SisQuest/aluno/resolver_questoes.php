<?php
include("../dao/seguranca.php");
protegePagina(TIPO_ALUNO);
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
            <li class="selected"><a href="resolver_questoes.php">RESOLVER QUESTÕES</a></li>
            <li><a href="sobre.php">SOBRE</a></li>
            <li><a href="meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
    </div>
    <div id="body">
		<div id="content">
			<h3>Resolver Questões</h3>
           
           	 <blockquote>
             <p>Aqui você pode resolver as questões disponiveis no sistema. Utilize o menu lateral para para definir o modo de resolução de questões. Você pode ter a opção de realizar questões individualmente ou realizar uma prova de 5,10 ou 20 questões.</p>
             <p></p>
             </blockquote>
           
            
        </div>
        
        <div class="sidebar">
            <ul>	
               <li>
                    <h3>Modo de Resolução</h3>
                    <ul class="blocklist">
                        <li><a href="./questoes/resolucao_individual.php">RESOLUÇÃO INDIVIDUAL</a></li>
                        <li><a href="./questoes/resolucao.php?quant=5">PROVA 5 QUESTÕES</a></li>
                        <li><a href="./questoes/resolucao.php?quant=10">PROVA 10 QUESTÕES</a></li>
                        <li><a href="./questoes/resolucao.php?quant=20">PROVA 20 QUESTÕES</a></li>
                        
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
