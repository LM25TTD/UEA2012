<?php
include("../../dao/seguranca.php");
include("../../dao/questaoDao.php");
protegePagina(TIPO_PROFESSOR);
$resultado_linha = buscar_questao($_REQUEST['id_questao']);
$acertou = validar_questao($_REQUEST['id_questao'], $_REQUEST['altSelect']);
registraQuestaoResolvida($_REQUEST['id_questao'],$_SESSION['usuarioLogin'],$acertou);

$alt1 = "";
$alt2 = "";
$alt3 = "";
$alt4 = "";
$alt5 = "";

if(!$acertou){
	switch ($_REQUEST['altSelect']){
		case 1:
			$alt1 = "gerarQuestaoVermelho";
			break;
		case 2:
			$alt2 = "gerarQuestaoVermelho";
			break;
		case 3:
			$alt3 = "gerarQuestaoVermelho";
			break;
		case 4:
			$alt4 = "gerarQuestaoVermelho";
			break;
		case 5:
			$alt5 = "gerarQuestaoVermelho";
			break;
	}
}
switch ($resultado_linha['alternativa_correta']){
	case 1:
		$alt1 = "gerarQuestaoVerde";
		break;
	case 2:
		$alt2 = "gerarQuestaoVerde";
		break;
	case 3:
		$alt3 = "gerarQuestaoVerde";
		break;
	case 4:
		$alt4 = "gerarQuestaoVerde";
		break;
	case 5:
		$alt5 = "gerarQuestaoVerde";
		break;
}

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
            <li><a href="../cadastros.php">CADASTROS</a></li>
        	<li class="selected"><a href="../resolver_questoes.php">RESOLVER QUESTÕES</a></li>
            <li><a href="../sobre.php">SOBRE</a></li>
            <li><a href="../meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
    </div>
    <div id="body">
		<div id="content">
			            
            <h3>Questão Individual</h3>

            <fieldset>
                <legend>Responda a questão:</legend>
                <form action="gerar_questao.php?assunto=<?php echo $resultado_linha['id_assunto'];?>&dificuldade=<?php echo $resultado_linha['dificuldade'];?>" method="post">
                  <p id="gerarQuestaoEnunciado">
                    <strong><?php echo $resultado_linha['enunciado_questao'];?>
                    
                  </strong></p>
                    
                    <p id="<?php echo $alt1;?>">
                      
                       <label for="alt1" id="gerarQuestao1">
                        <input type = "radio" name ="altSelect" value= "1" <?php if($_REQUEST['altSelect']==1)echo "checked";?>/>
                      A) </label>
                       <?php 
                      echo $resultado_linha['alternativa_1'];?>
                      
                    </p>
                    
                     <p id="<?php echo $alt2;?>"><label for="alt2" id="gerarQuestao1"><input type = "radio" name ="altSelect" value= "2"  <?php if($_REQUEST['altSelect']==2)echo "checked";?>
/> 
                       B) </label>
                       <?php echo $resultado_linha['alternativa_2'];?>
                  </p>
                     <p id="<?php echo $alt3;?>"><label for="alt3" id="gerarQuestao1"><input type = "radio" name ="altSelect" value= "3"  <?php if($_REQUEST['altSelect']==3)echo "checked";?>
/> 
                     C) </label>
                       <?php echo $resultado_linha['alternativa_3'];?>
                    </p>
                    <p id="<?php echo $alt4;?>"><label for="alt4" id="gerarQuestao1"><input type = "radio" name ="altSelect" value= "5"  <?php if($_REQUEST['altSelect']==4)echo "checked";?>
/> 
                    D) </label>
                      <?php echo $resultado_linha['alternativa_4'];?>
                    </p>
                    <p id="<?php echo $alt5;?>"><label for="alt5" id="gerarQuestao1"><input type = "radio" name ="altSelect" value= "5"  <?php if($_REQUEST['altSelect']==5)echo "checked";?>
/> 
                    E) </label>
                      <?php echo $resultado_linha['alternativa_5'];?>
                    </p>
                    <strong><p id="<?php if($acertou){echo ("gerarQuestaoVerde");}else{echo ("gerarQuestaoVermelho");}?>"><?php if($acertou){ echo ("Resposta Correta!!"); }else{ echo ("Resposta Incorreta!!");} ?></p></strong>
                  <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Nova Questão" type="submit" /><a class="linkOperacao"href="resolucao_individual.php">Voltar ao menu</a></p>
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
