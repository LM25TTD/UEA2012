<?php
include("../../dao/seguranca.php");

$resultado = mysql_query("SELECT a.id_assunto as idast, a.nome_assunto as nast, d.nome_disciplina as ndisc, ar.nome_area as narea FROM tb_disciplina d, tb_area ar, tb_assunto a WHERE a.id_disciplina=d.id_disciplina AND d.id_area = ar.id_area ",$_SG['link']);

$resultadoAreas = mysql_query("SELECT nome_area FROM tb_area",$_SG['link']);

if (getenv("REQUEST_METHOD") == "POST") {
	$disc=$_POST["area"];
	$resultadoDisciplina = mysql_query("SELECT d.nome_disciplina as ndisc FROM tb_disciplina d, tb_area a WHERE d.id_area=a.id_area AND a.nome_area='{$disc}'",$_SG['link']);
}

?>