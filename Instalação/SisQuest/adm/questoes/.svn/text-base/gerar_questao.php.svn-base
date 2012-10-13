<?php 
include("../../dao/seguranca.php");
include("../../dao/questaoDao.php");
protegePagina(TIPO_ADM);
$resultado_linha = gerar_questao($_REQUEST['assunto'],$_REQUEST['dificuldade']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../../scripts/validarFormGerarQuestao.js"></script>
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
            <li><a href="../cadastros.php">CADASTROS</a></li>
        	<li class="selected"><a href="../resolver_questoes.php">RESOLVER QUESTÕES</a></li>
            <li><a href="../sobreAdm.php">SOBRE</a></li>
            <li><a href="../meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
    </div>
    <div id="body">
		<div id="content">
			            
            <h3>Questão Individual</h3>

            <fieldset>
                <legend>Responda a questão:</legend>
                <form action="confirmar_questao.php?id_questao=<?php echo $resultado_linha['id_questao'];?>" method="post" name="dados" onSubmit="return enviardados();">
                  <p id="gerarQuestaoEnunciado">
                    <strong><?php echo $resultado_linha['enunciado_questao'];?>
                    
                  </strong></p>
                    
                    <p>
                      <label for="alt1" id="gerarQuestao1">
                        <input type = "radio" name ="altSelect" value= "1"/>
                      A) </label>
                      <?php echo $resultado_linha['alternativa_1'];?>
                      
                    </p>
                    
                     <p><label for="alt2" id="gerarQuestao1"><input type = "radio" name ="altSelect" value= "2" 
/> 
                       B) </label>
                       <?php echo $resultado_linha['alternativa_2'];?>
                  </p>
                     <p><label for="alt3" id="gerarQuestao1"><input type = "radio" name ="altSelect" value= "3" 
/> 
                     C) </label>
                       <?php echo $resultado_linha['alternativa_3'];?>
                    </p>
                    <p><label for="alt4" id="gerarQuestao1"><input type = "radio" name ="altSelect" value= "4" 
/> 
                    D) </label>
                      <?php echo $resultado_linha['alternativa_4'];?>
                    </p>
                    <p><label for="alt5" id="gerarQuestao1"><input type = "radio" name ="altSelect" value= "5" 
/> 
                    E) </label>
                      <?php echo $resultado_linha['alternativa_5'];?>
                    </p>
                  <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Confirmar" type="submit" /><a class="linkOperacao"href="resolucao_individual.php">Cancelar e Voltar</a></p>
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
