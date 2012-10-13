<?php
/**
 *Obtem todas as áreas para carregar o combobox de áreas
 */
function obterAreas($link){
	$resultado = mysql_query("SELECT id_area, nome_area from tb_area",$link);
	return $resultado;
}

/**
 *Obtem todas as disciplinas para carregar o combobox de disciplinas
 */
function obterDisciplinas($link,$idArea){
	$resultado = mysql_query("SELECT id_disciplina, nome_disciplina from tb_disciplina WHERE Id_Area=".$idArea,$link);
	return $resultado;
}

/**
 *Obtem todas os assuntos para carregar o combobox de assuntos
 */
function obterAssuntos($link,$idDisciplina){
	$resultado = mysql_query("SELECT id_assunto, nome_assunto from tb_assunto WHERE Id_Disciplina=".$idDisciplina,$link);
	return $resultado;
}

/**
 *Obtem todas os assuntos para montar a tela de filto
 */
function assuntoConsulta($link){

	$resultado = mysql_query("SELECT a.id_assunto as idast, a.nome_assunto as nast, d.nome_disciplina as ndisc, ar.nome_area as narea FROM tb_disciplina d, tb_area ar, tb_assunto a WHERE a.id_disciplina=d.id_disciplina AND d.id_area = ar.id_area ",$link);
	return $resultado;
}

/**
 *Obtem os assuntos limitando o número à pagina atual para montar a paginação da tela de filto
 */
function assuntoConsultaFiltro($liminf,$limsup,$link){

	$resultado = mysql_query("SELECT a.id_assunto as idast, a.nome_assunto as nast, d.nome_disciplina as ndisc, ar.nome_area as narea FROM tb_disciplina d, tb_area ar, tb_assunto a WHERE a.id_disciplina=d.id_disciplina AND d.id_area = ar.id_area LIMIT $liminf,$limsup",$link);
	return $resultado;
}


/**
 *Carrega um assunto com id passado por parametro para edição na tela
 */
function carregarAssuntoEdicao($id,$link){

	$resultado = mysql_query("SELECT a.nome_assunto as nome_assunto, d.nome_disciplina as nome_disciplina, d.id_disciplina as id_disciplina, ar.nome_area as nome_area, ar.id_area as id_area FROM tb_disciplina d, tb_area ar, tb_assunto a WHERE a.id_disciplina=d.id_disciplina AND d.id_area = ar.id_area AND a.id_assunto={$id}",$link);
	return $resultado;
}

/**
 *Efetua o cadastro de um assunto
 */
function assuntoCadastro($idArea,$idDisciplina,$nomeAssunto,$cadastrante,$link){
	if($_SESSION['tipoUsuario']==1)
		$raiz="adm";
	else
		$raiz="professor";

	if ($idArea==0){

		echo "Nome da area &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/assunto/filtro.php'>";

	}else{

		if ($idDisciplina==0){

			echo "Nome da disciplina &eacute; um campo requerido. <br />";
			echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/assunto/filtro.php'>";

		}else{

			if (!$nomeAssunto){

				echo "Nome do assunto &eacute; um campo requerido. <br />";
				echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/assunto/filtro.php'>";

			}else{



				$sql_nome_check = mysql_query("SELECT COUNT(Id_Assunto) FROM tb_assunto WHERE nome_assunto='{$nomeAssunto}'");

				$nReg = mysql_fetch_array($sql_nome_check);

				$nome_check = $nReg[0];

				if ($nome_check > 0){
					echo "Este nome ( <strong>".$nomeAssunto."</strong> ) j&aacute; est&aacute; sendo utilizado.<br />Por favor utilize outro nome! <br />";

					unset($nomeAssunto);
						


					echo "<br />";

					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/assunto/filtro.php'>";


				}else{

					$sql = mysql_query("INSERT INTO tb_assunto (id_disciplina,nome_assunto,cadastrante)
							VALUES('{$idDisciplina}','{$nomeAssunto}','{$cadastrante}')",$link)
							or die(mysql_error());

					echo "<div align='center'><h3>Cadastro realizado com sucesso!</h3></div>";
					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/assunto/filtro.php'>";



					if (!$sql){

						echo "Ocorreu algum erro, por favor entre em contato com o Webmaster.";
						echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/assunto/filtro.php'>";

					}

				}
			}
		}
	}

}

/**
 *Efetua a atualização de um assunto
 */
function assuntoAtualizar($idAssunto,$idArea,$idDisciplina,$nomeAssunto,$cadastrante,$link){
	if($_SESSION['tipoUsuario']==1)
		$raiz="adm";
	else
		$raiz="professor";

	if ($idArea==0){

		echo "Nome da area &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/assunto/filtro.php'>";

	}else{

		if ($idDisciplina==0){

			echo "Nome da disciplina &eacute; um campo requerido. <br />";
			echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/assunto/filtro.php'>";

		}else{

			if (!$nomeAssunto){

				echo "Nome do assunto &eacute; um campo requerido. <br />";
				echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/assunto/filtro.php'>";

			}else{



				$sql_nome_check = mysql_query("SELECT COUNT(Id_Assunto) FROM tb_assunto WHERE nome_assunto='{$nomeAssunto}' and id_assunto<>{$idAssunto}");

				$nReg = mysql_fetch_array($sql_nome_check);

				$nome_check = $nReg[0];

				if ($nome_check > 0){
					echo "Este nome ( <strong>".$nomeAssunto."</strong> ) j&aacute; est&aacute; sendo utilizado.<br />Por favor utilize outro nome! <br />";

					unset($nomeAssunto);
						


					echo "<br />";

					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/assunto/filtro.php'>";


				}else{

					$sql = mysql_query("UPDATE tb_assunto SET id_disciplina={$idDisciplina}, nome_assunto='{$nomeAssunto}', cadastrante='{$cadastrante}'
					WHERE id_assunto={$idAssunto}",$link)
					or die(mysql_error());

					echo "<div align='center'><h3>Assunto modificado com sucesso!</h3></div>";
					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/assunto/filtro.php'>";



					if (!$sql){

						echo "Ocorreu algum erro, por favor entre em contato com o Webmaster.";
						echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/assunto/filtro.php'>";

					}

				}
			}
		}
	}
}

/**
 *Remove um assunto com Id passado por parâmetro
 */
function assuntoDelete($adeletar,$link){
	return mysql_query("DELETE FROM tb_assunto WHERE id_assunto = ".$adeletar,$link) or die(mysql_error());
}

?>
