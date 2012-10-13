<?php
include("../../dao/seguranca.php");
include("../../dao/assuntoDao.php");

$resultadoTotal=assuntoConsulta($_SG['link']);

function carregarAssuntoEdicaoServico($id,$link){
	return mysql_fetch_array(carregarAssuntoEdicao($id, $link));
}

?>