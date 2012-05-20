<?php
include ("../dao/seguranca.php");
include ("../dao/assuntoDao.php");

switch ( $_GET['tipo'] ) {
	case 'area' :
		$resultado = obterAreas($_SG['link']);
		$retorno = null;
		$retorno= sprintf('<option value="%s">Escolha uma área</option>',0);
		$retorno .= sprintf('<option value="%s">- - - - - - - - - - - - -</option>',0);
		
		while($linha = mysql_fetch_array($resultado)){
			$retorno .= sprintf('<option value="%s">%s</option>',$linha['id_area'],$linha['nome_area']);
		}
		print $retorno;
		
		break;
	case 'disciplina':
		$resultado = obterDisciplinas($_SG['link'], $_GET['idarea']);
		
		$retorno = null;
		$retorno= sprintf('<option value="%s">Escolha uma disciplina</option>',0);
		$retorno .= sprintf('<option value="%s">- - - - - - - - - - - - -</option>',0);
		
		while($linha = mysql_fetch_array($resultado)){
			$retorno .= sprintf('<option value="%s">%s</option>',$linha['id_disciplina'],$linha['nome_disciplina']);
		}
		print $retorno;
		
		break;
}
return null;
?>