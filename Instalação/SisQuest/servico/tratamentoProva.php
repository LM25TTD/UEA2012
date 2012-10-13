<?php
include("../dao/seguranca.php");
include("../dao/questaoDao.php");
$acertou = validar_questao($_REQUEST['id_questao'], $_REQUEST['altSelect']);
registraQuestaoResolvida($_REQUEST['id_questao'],$_SESSION['usuarioLogin'],$acertou);
if($acertou)
{
	$_SESSION['pontos_obtidos']++;
}

if( $_SESSION['quant_questoes'] == $_SESSION['questaoRespondendo'])
{
	
	if($_REQUEST['user'] == "adm"){
		header("Location: ../adm/questoes/resultado_prova.php");
	
	}
	
	if($_REQUEST['user'] == "aluno"){
		header("Location: ../aluno/questoes/resultado_prova.php");
	}
	
	if($_REQUEST['user'] == "prof"){
		header("Location: ../professor/questoes/resultado_prova.php");
	}
}
else{
$_SESSION['questaoRespondendo']++;


	if($_REQUEST['user'] == "adm"){
		header("Location: ../adm/questoes/gerar_prova.php");
	
	}

	if($_REQUEST['user'] == "aluno"){
		header("Location: ../aluno/questoes/gerar_prova.php");
	}

	if($_REQUEST['user'] == "prof"){
		header("Location: ../professor/questoes/gerar_prova.php");
	}
}
?>