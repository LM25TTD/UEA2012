<?php
/**
 *Busca e retorna uma questão com assunto e dificuldade passadas por parâmetro
 */
function gerar_questao($assunto,$dificuldade){
	global $_SG;


	// Monta uma query para selecionar uma questao aleatoria
	if($dificuldade == 0){
		$sql = "SELECT id_questao, enunciado_questao,dificuldade,alternativa_correta,alternativa_1,alternativa_2,alternativa_3,alternativa_4,alternativa_5 FROM tb_questao WHERE id_assunto=".$assunto." ORDER BY RAND() LIMIT 1";
	}
	else{
		$sql = "SELECT id_questao, enunciado_questao,dificuldade,alternativa_correta,alternativa_1,alternativa_2,alternativa_3,alternativa_4,alternativa_5 FROM tb_questao WHERE id_assunto=".$assunto." AND dificuldade=".$dificuldade." ORDER BY RAND() LIMIT 1";
	}
	$resultado = mysql_query($sql,$_SG['link']);

	$linha = mysql_fetch_array($resultado);
	return $linha;

}

/**
 *Verifica se uma questão está correta de acordo com a resposta do usuário
 */
function validar_questao($id_questao,$alt_escolhida)
{
	global $_SG;

	$sql = "SELECT id_questao, alternativa_correta FROM tb_questao WHERE id_questao=".$id_questao;
	$resultado = mysql_query($sql,$_SG['link']);

	$linha = mysql_fetch_array($resultado);
	if($linha['alternativa_correta'] == $alt_escolhida){
		return true;
	}
	else{
		return false;
	}
}

/**
 *Retorna questões de acordo com o número da página para fazer a paginação na tela de filtro
 */
function questaoConsulta($inicial,$numreg,$link){

	$resultado = mysql_query("SELECT q.id_questao as idquest, q.enunciado_questao as enunc, a.nome_assunto as nast, d.nome_disciplina as ndisc, ar.nome_area as narea FROM tb_disciplina d, tb_area ar, tb_assunto a, tb_questao q WHERE q.id_assunto=a.id_assunto and a.id_disciplina=d.id_disciplina AND d.id_area = ar.id_area LIMIT $inicial,$numreg" ,$link);
	return $resultado;
}

/**
 *Retorna todas as questões para montar a tela de filtro
 */
function questaoConsultaContador($link){

	$resultado = mysql_query("SELECT q.id_questao as idquest, q.enunciado_questao as enunc, a.nome_assunto as nast, d.nome_disciplina as ndisc, ar.nome_area as narea FROM tb_disciplina d, tb_area ar, tb_assunto a, tb_questao q WHERE q.id_assunto=a.id_assunto and a.id_disciplina=d.id_disciplina AND d.id_area = ar.id_area",$link);
	return $resultado;
}

/**
 *Carrega uma questão com id passado por parâmetro na tela de edição
 */
function questaoConsultaEdicao($id,$link){

	$resultado = mysql_query("SELECT q.id_questao as idquest, q.enunciado_questao as enunc, q.dificuldade as dificuldade, q.alternativa_correta as altcorreta, q.alternativa_1 as alt1, q.alternativa_2 as alt2, q.alternativa_3 as alt3, q.alternativa_4 as alt4, q.alternativa_5 as alt5,
			a.nome_assunto as nast, a.id_assunto as idast, d.nome_disciplina as ndisc, d.id_disciplina as iddisc, ar.nome_area as narea, ar.id_area as idarea
			FROM tb_disciplina d, tb_area ar, tb_assunto a, tb_questao q
			WHERE q.id_assunto=a.id_assunto and a.id_disciplina=d.id_disciplina AND d.id_area = ar.id_area AND q.id_questao={$id}" ,$link);
	return $resultado;
}

/**
 *Remove uma questão com id passado por parâmetro
 */
function questaoDelete($adeletar,$link){
	return mysql_query("DELETE FROM tb_questao WHERE id_questao = ".$adeletar,$link) or die(mysql_error());
}

/**
 *Valida e adiciona uma nova questão na base de dados
 */
function questaoCadastro($idArea,$idDisciplina,$idAssunto,$enunciado,$alt1,$alt2,$alt3,$alt4,$alt5,$altCorreta,$dificuldade,$cadastrante,$link){
	if($_SESSION['tipoUsuario']==1)
		$raiz="adm";
	else
		$raiz="professor";
	if ($idArea==0){

		echo "Nome da area &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";

	}else{

		if ($idDisciplina==0){

			echo "Nome da disciplina &eacute; um campo requerido. <br />";
			echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";

		}else{

			if ($idAssunto==0){

				echo "Nome do assunto &eacute; um campo requerido. <br />";
				echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";

			}else{

				if(!$enunciado || !$alt1 || !$alt2 || !$alt3 || !$alt4 || !$alt5 || !$dificuldade || !$altCorreta){
					echo "<div align='center'><h1>Preencha os campos obrigatórios.</h1></div> <br />";
					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";
					return;
				}



				$sql_nome_check = mysql_query("SELECT COUNT(id_questao) FROM tb_questao WHERE enunciado_questao='{$enunciado}'");

				$nReg = mysql_fetch_array($sql_nome_check);

				$nome_check = $nReg[0];

				if ($nome_check > 0){
					echo "Este enunciado ( <strong>".$enunciado."</strong> ) j&aacute; est&aacute; sendo utilizado.<br />Por favor utilize outro! <br />";

					unset($enunciado);



					echo "<br />";

					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";


				}else{

					$sql = mysql_query("INSERT INTO tb_questao (id_assunto, enunciado_questao,dificuldade,alternativa_correta,alternativa_1,alternativa_2,alternativa_3,alternativa_4,alternativa_5,cadastrante)
							VALUES('{$idAssunto}','{$enunciado}','{$dificuldade}','{$altCorreta}','{$alt1}','{$alt2}','{$alt3}','{$alt4}','{$alt5}','{$cadastrante}')")
							or die(mysql_error());

					echo "<div align='center'><h3>Cadastro realizado com sucesso!</h3></div>";
					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";



					if (!$sql){

						echo "Ocorreu algum erro, por favor entre em contato com o Webmaster.";
						echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";

					}

				}
			}
		}
	}

}

/**
 *Atualiza uma questão editada
 */
function questaoAtualizar($id,$idArea,$idDisciplina,$idAssunto,$enunciado,$alt1,$alt2,$alt3,$alt4,$alt5,$altCorreta,$dificuldade,$cadastrante,$link){
	if($_SESSION['tipoUsuario']==1)
		$raiz="adm";
	else
		$raiz="professor";
	if ($idArea==0){

		echo "Nome da area &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";

	}else{

		if ($idDisciplina==0){

			echo "Nome da disciplina &eacute; um campo requerido. <br />";
			echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";

		}else{

			if ($idAssunto==0){

				echo "Nome do assunto &eacute; um campo requerido. <br />";
				echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";

			}else{

				if(!$enunciado || !$alt1 || !$alt2 || !$alt3 || !$alt4 || !$alt5 || !$dificuldade || !$altCorreta){
					echo "<div align='center'><h1>Preencha os campos obrigatórios.</h1></div> <br />";
					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";
					return;
				}



				$sql_nome_check = mysql_query("SELECT COUNT(id_questao) FROM tb_questao WHERE enunciado_questao='{$enunciado}' and id_questao<>{$id}");

				$nReg = mysql_fetch_array($sql_nome_check);

				$nome_check = $nReg[0];

				if ($nome_check > 0){
					echo "Este enunciado ( <strong>".$enunciado."</strong> ) j&aacute; est&aacute; sendo utilizado.<br />Por favor utilize outro! <br />";

					unset($enunciado);



					echo "<br />";

					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";


				}else{

					$sql = mysql_query("UPDATE tb_questao SET id_assunto={$idAssunto}, enunciado_questao='{$enunciado}',dificuldade={$dificuldade},alternativa_correta={$altCorreta},alternativa_1='{$alt1}',alternativa_2='{$alt2}',alternativa_3='{$alt3}',alternativa_4='{$alt4}',alternativa_5='{$alt5}',cadastrante='{$cadastrante}'
					WHERE id_questao={$id}",$link)
					or die(mysql_error());

					echo "<div align='center'><h3>Questão atualizada com sucesso!</h3></div>";
					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";



					if (!$sql){

						echo "Ocorreu algum erro, por favor entre em contato com o Webmaster.";
						echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/questoes/filtro.php'>";

					}

				}
			}
		}
	}

}

/**
 *Retorna a questão correspondente ao id passado por parâmetro
 */
function buscar_questao($id_questao)
{
	global $_SG;

	$sql = "SELECT id_questao,enunciado_questao,alternativa_correta,alternativa_1,alternativa_2,alternativa_3,alternativa_4,alternativa_5,id_assunto,dificuldade FROM tb_questao WHERE id_questao=".$id_questao;
	$resultado = mysql_query($sql,$_SG['link']);
	$linha = mysql_fetch_array($resultado);
	return $linha;
}

/**
 *Registra a resolução de uma questão na base de dados
 */
function registraQuestaoResolvida($id_questao,$loginUsuario,$acertou){
	global $_SG;

	if($acertou){
		$acertouValue = 1;
	}else{
		$acertouValue = 0;
	}
	$sql = "INSERT INTO `db_leandro_kevin`.`tb_resolucao` (`Id_Resolucao`, `Cadastrante`, `Id_Questao`, `DataRealizacao`, `Acertou`) VALUES (NULL, '".$loginUsuario."', '".$id_questao."', NOW(), ".$acertouValue.")";
	$resultado = mysql_query($sql,$_SG['link']);

}
?>
