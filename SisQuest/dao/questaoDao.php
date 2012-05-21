<?php

function gerar_questao($assunto,$dificuldade){
	global $_SG;

	
	// Monta uma query para selecionar uma questao aleatoria
	$sql = "SELECT id_questao, enunciado_questao,dificuldade,alternativa_correta,alternativa_1,alternativa_2,alternativa_3,alternativa_4,alternativa_5 FROM tb_questao WHERE id_assunto=".$assunto." ORDER BY RAND() LIMIT 1";
	$resultado = mysql_query($sql,$_SG['link']);
	
	$linha = mysql_fetch_array($resultado);
	return $linha;
	
}
?>
