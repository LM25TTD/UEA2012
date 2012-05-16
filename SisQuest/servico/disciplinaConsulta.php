<?php
include("../../dao/seguranca.php");


$resultado = mysql_query("SELECT d.id_disciplina as iddisc, d.nome_disciplina as ndisc, a.nome_area as narea FROM tb_disciplina d, tb_area a WHERE d.id_area = a.id_area",$_SG['link']);

$resultadoAreas = mysql_query("SELECT nome_area FROM tb_area",$_SG['link']);


?>