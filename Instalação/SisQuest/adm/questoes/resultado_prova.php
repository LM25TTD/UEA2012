<?php
include("../../dao/seguranca.php");
protegePagina(TIPO_ADM);

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
			            
            <h3>Prova <?php echo $_SESSION['quant_questoes'];?> Questões</h3>

            <fieldset>
                <legend>Resultado da Prova:</legend>
                
          	<form action="#" method="post" name="dados" onSubmit="return enviardados();">
                  <p id="gerarQuestaoEnunciado">
                    <strong>Parabéns! Visualize seu resultado:                 
              </strong></p>
                    
                    <p>&nbsp;</p>
                    
                     <p> <strong>
                       <label for="acertadas" id="totalCorretas">
                       Total de questões corretas: </label>
                     </strong>                       <?php echo $_SESSION['pontos_obtidos'];?>
                  </p>
                     <p><strong>
                       <label for="erradas" id="totalIncorretas">                     Total de questões incorretas: </label>
                     </strong>
                       <?php $erradas = $_SESSION['quant_questoes'] - $_SESSION['pontos_obtidos']; echo $erradas;?>
                    </p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                  <p><a class="linkOperacao"href="../resolver_questoes.php">Voltar ao Menu</a></p>
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
<?php 

$i=0;
for($i=1;$i<=$_SESSION['quant_questoes'];$i++) {
	$questao="questao".$i;
	unset($_SESSION[$questao]);
}
unset($_SESSION['quant_questoes']);
unset($_SESSION['questaoRespondendo']) ;
unset($_SESSION['pontos_obtidos']);

?>