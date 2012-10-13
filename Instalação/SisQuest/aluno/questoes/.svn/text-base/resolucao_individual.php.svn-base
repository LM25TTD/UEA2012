<?php 
include("../../dao/seguranca.php");
protegePagina(TIPO_ALUNO);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../../scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../scripts/comboAreaDisciplinaAssunto.js"></script>
<script type="text/javascript" src="../../scripts/validarFormResolucaoIndividual.js"></script>
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
            <li class="selected"><a href="../resolver_questoes.php">RESOLVER QUESTÕES</a></li>
            <li><a href="../sobre.php">SOBRE</a></li>
            <li><a href="../meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
    </div>
    <div id="body">
		<div id="content">
			            
            <h3>Resolução Individual</h3>

            <fieldset>
                <legend>Selecione as opções:</legend>
                <form action="gerar_questao.php" method="get" name="dados" onSubmit="return enviardados();">
                    <p><label for="area">Área: *</label>
                    <select name="area" id="area" class="textLogin">
                      
                    </select></p>
                    
                    <p><label for="disciplina">Disciplina: *</label>
                    <select name="discipina" id="disciplina" class="textLogin"></select></p>
                    <p><label for="assunto">Assunto: *</label>
                    <select name="assunto" id="assunto" class="textLogin">
                                    
                    </select></p>
                    <p><label for="dificuldade">Nível de dificuldade: *</label>
                <input type = "radio" name ="dificuldade" value= "1" />1
                <input type = "radio" name ="dificuldade" value= "2" 
/>2
                 <input type = "radio" name ="dificuldade" value= "3" 
/>3
                 <input type = "radio" name ="dificuldade" value= "4" 
/>4
                <input type = "radio" name ="dificuldade" value= "5" 
/>5
				<input type = "radio" name ="dificuldade" value= "0" checked="checked"/>Aleatorio
</p>


                    <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Resolver" type="submit" /><a class="linkOperacao"href="../resolucao_questoes.php">Cancelar e Voltar</a></p>
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
