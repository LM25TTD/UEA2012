<?php 
include("../../servico/disciplinaConsulta.php");
protegePagina();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../../scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../scripts/comboAreaDisciplinaAssunto.js"></script>
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
			            
            <h3>Cadastro de questões</h3>

            <fieldset>
                <legend>Insira os dados</legend>
                <form action="#" method="get">
                    <p><label for="area">Área: *</label>
                    <select name="area" id="area" class="textLogin">
                      
                    </select></p>
                    
                    <p><label for="disciplina">Disciplina: *</label>
                    <select name="discipina" id="disciplina" class="textLogin"></select></p>
                    <p><label for="assunto">Assunto: *</label>
                    <select name="assunto" id="assunto" class="textLogin">
                                    
                    </select></p>
                    
                    <p><label for="enunciado">Enunciado: *</label>
                    <input name="enunciado" id="enunciado"  type="text" class="textLogin" /></p>
                    
                    <p><label for="alt1">Alternativa 1: *</label>
                    <input name="alt1" id="alt1"  type="text" class="textLogin" /></p>
                    
                     <p><label for="alt2">Alternativa 2: *</label>
                    <input name="alt2" id="alt2"  type="text" class="textLogin" /></p>
                     <p><label for="alt3">Alternativa 3: *</label>
                    <input name="alt3" id="alt3"  type="text" class="textLogin" /></p>
                    <p><label for="alt4">Alternativa 4: *</label>
                    <input name="alt4" id="alt4"  type="text" class="textLogin" /></p>
                    <p><label for="alt5">Alternativa 5: *</label>
                    <input name="alt5" id="alt5"  type="text" class="textLogin" /></p>
                    <p>
                <label for="altCorreta">Alternativa correta: *</label>
                <input type = "radio" name ="altCorreta" value= "1" 
checked/>1
                <input type = "radio" name ="altCorreta" value= "2" 
/>2
                <input type = "radio" name ="altCorreta" value= "3" 
/>3
               <input type = "radio" name ="altCorreta" value= "4" 
/>4
                <input type = "radio" name ="altCorreta" value= "5" 
/>5
</p>

                    <p><label for="dificuldade">Nível de dificuldade: *</label>
                <input type = "radio" name ="dificuldade" value= "1" 
checked/>1
                <input type = "radio" name ="dificuldade" value= "2" 
/>2
                 <input type = "radio" name ="dificuldade" value= "3" 
/>3
                 <input type = "radio" name ="dificuldade" value= "4" 
/>4
                <input type = "radio" name ="dificuldade" value= "5" 
/>5
</p>


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
