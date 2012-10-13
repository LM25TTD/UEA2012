<?php
include ("../../dao/seguranca.php");
include ("../../dao/usuarioDao.php");

$resultadoTotal = usuarioConsulta($_SG['link']);

function utilTipoUsuario($tipo){
	switch ($tipo){
		case 1: return "Administrador";
		case 2: return "Professor";
		case 3: return "Aluno";
		default:return null;		
	}
}

function usuarioConsultaEdicaoServico($login,$link){
	return mysql_fetch_array(usuarioConsultaEdicao($login, $link));
}

?>