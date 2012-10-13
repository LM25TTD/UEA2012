<?php
/**
 *Gera uma lista de questões com a dificuldade, assunto e quantidade passadas por parâmetro
 */
function gerar_prova($assunto,$dificuldade,$quant)
{
	global $_SG;


	if($dificuldade == 0){
		$sql = "SELECT id_questao,enunciado_questao,alternativa_1,alternativa_2,alternativa_3,alternativa_4,alternativa_5 FROM tb_questao WHERE id_assunto=".$assunto." ORDER BY RAND() LIMIT ".$quant."";
	}
	else{
		$sql = "SELECT id_questao, enunciado_questao,dificuldade,alternativa_1,alternativa_2,alternativa_3,alternativa_4,alternativa_5 FROM tb_questao WHERE id_assunto=".$assunto." AND dificuldade=".$dificuldade." ORDER BY RAND() LIMIT ".$quant."";
	}

	$resultado = mysql_query($sql,$_SG['link']);

	return $resultado;
}

?>