<?php

function obterAreas($link){
	$resultado = mysql_query("SELECT id_area, nome_area from tb_area",$link);
	return $resultado;
}

function obterDisciplinas($link,$idArea){
	$resultado = mysql_query("SELECT id_disciplina, nome_disciplina from tb_disciplina WHERE Id_Area=".$idArea,$link);
	return $resultado;
}

function obterAssuntos($link,$idDisciplina){
	$resultado = mysql_query("SELECT id_assunto, nome_assunto from tb_assunto WHERE Id_Disciplina=".$idDisciplina,$link);
	return $resultado;
}

?>
