<?php
include("../dao/seguranca.php");
include("../dao/provaDao.php");

//$_REQUEST['area'],$_REQUEST['disciplina'],$_REQUEST['assunto'],$_REQUEST['dificuldade']


$prova = gerar_prova($_REQUEST['assunto'],$_REQUEST['dificuldade'],$_REQUEST['quant']);

$_SESSION['quantRequerida'] = $_REQUEST['quant'] ;
$_SESSION['quant_questoes'] = mysql_num_rows($prova);
$_SESSION['questaoRespondendo'] = 1;
$_SESSION['pontos_obtidos'] = 0;
$i=0;
while ($linha = mysql_fetch_array($prova)) {
	$i++;
	$str_i = "questao".$i;
	$_SESSION[$str_i] = $linha;
}

if($_REQUEST['user'] == "adm"){
	header("Location: ../adm/questoes/gerar_prova.php");
	//echo var_dump($prova5);
}

if($_REQUEST['user'] == "aluno"){
		header("Location: ../aluno/questoes/gerar_prova.php");
}

if($_REQUEST['user'] == "prof"){
	header("Location: ../professor/questoes/gerar_prova.php");
}
?>