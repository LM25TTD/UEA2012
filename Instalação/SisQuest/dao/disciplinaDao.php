<?php
/**
 *Efetua o cadastro de disciplinas novas
 */
function disciplinaCadastro ($idArea,$nomeDisciplina,$cadastrante){
	if($_SESSION['tipoUsuario']==1)
		$raiz="adm";
	else
		$raiz="professor";

	if ($idArea==0){

		echo "Nome da area &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/disciplina/filtro.php'>";

	}else{

		if (!$nomeDisciplina){

			echo "Nome da disciplina &eacute; um campo requerido. <br />";
			echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/disciplina/filtro.php'>";

		}else{

			$sql_nome_check = mysql_query("SELECT COUNT(Id_Disciplina) FROM tb_disciplina WHERE Nome_disciplina='{$nomeDisciplina}'");

			$nReg = mysql_fetch_array($sql_nome_check);

			$nome_check = $nReg[0];

			if ($nome_check > 0){
				echo "Este nome ( <strong>".$nomeDisciplina."</strong> ) j&aacute; est&aacute; sendo utilizado.<br />Por favor utilize outro nome! <br />";

				unset($nomeArea);
				unset($nome);


				echo "<br />";

				echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/disciplina/filtro.php'>";


			}else{

				$sql = mysql_query("INSERT INTO tb_disciplina (nome_disciplina, id_area,cadastrante)
						VALUES('{$nomeDisciplina}','{$idArea}','{$cadastrante}')")
						or die(mysql_error());

				echo "<div align='center'><h3>Cadastro realizado com sucesso!</h3></div>";
				echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/disciplina/filtro.php'>";



				if (!$sql){

					echo "Ocorreu algum erro ao criar sua conta, por favor entre em contato com o Webmaster.";
					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/disciplina/filtro.php'>";

				}

			}
		}
	}
}

/**
 *Efetua a atualização de uma disciplina editada
 */
function disciplinaAtualizar ($idArea,$id_disciplina,$nomeDisciplina,$cadastrante,$link){
	if($_SESSION['tipoUsuario']==1)
		$raiz="adm";
	else
		$raiz="professor";

	if ($idArea==0){

		echo "Nome da area &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/disciplina/filtro.php'>";

	}else{

		if (!$nomeDisciplina){

			echo "Nome da disciplina &eacute; um campo requerido. <br />";
			echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/disciplina/filtro.php'>";

		}else{

			$sql_nome_check = mysql_query("SELECT COUNT(Id_Disciplina) FROM tb_disciplina WHERE Nome_disciplina='{$nomeDisciplina}' and id_disciplina<>{$id_disciplina}",$link);

			$nReg = mysql_fetch_array($sql_nome_check);

			$nome_check = $nReg[0];

			if ($nome_check > 0){
				echo "Este nome ( <strong>".$nomeDisciplina."</strong> ) j&aacute; est&aacute; sendo utilizado.<br />Por favor utilize outro nome! <br />";

				unset($nomeArea);
				unset($nome);


				echo "<br />";

				echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/disciplina/filtro.php'>";


			}else{

				$sql = mysql_query("UPDATE tb_disciplina SET nome_disciplina ='{$nomeDisciplina}', id_area = {$idArea}, cadastrante='{$cadastrante}'
				WHERE id_disciplina={$id_disciplina}",$link)
				or die(mysql_error());

				echo "<div align='center'><h3>Disciplina modificada com sucesso!</h3></div>";
				echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/disciplina/filtro.php'>";



				if (!$sql){

					echo "Ocorreu algum erro ao criar sua conta, por favor entre em contato com o Webmaster.";
					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/disciplina/filtro.php'>";

				}

			}
		}
	}
}



/**
 *Obtem todas as disciplinas para montar a tela de filtro
 */
function disciplinaConsulta($link){
	$resultado = mysql_query("SELECT d.id_disciplina as iddisc, d.nome_disciplina as ndisc, a.nome_area as narea FROM tb_disciplina d, tb_area a WHERE d.id_area = a.id_area",$link);
	return $resultado;
}

/**
 *Obtem as disciplinas limitadas ao número da pagina para construir a paginação na tela de filto
 */
function disciplinaConsultaFiltro($liminf,$limsup,$link){
	$resultado = mysql_query("SELECT d.id_disciplina as iddisc, d.nome_disciplina as ndisc, a.nome_area as narea FROM tb_disciplina d, tb_area a WHERE d.id_area = a.id_area LIMIT $liminf,$limsup",$link);
	return $resultado;
}

/**
 *Carrega as áreas no combobox de áreas
 */
function resultadoAreasConsulta($link){
	$resultado = mysql_query("SELECT id_area,nome_area FROM tb_area",$link);
	return $resultado;
}

/**
 *Carrega as áreas no combobox de áreas na edição
 */
function resultadoAreasConsultaEdicao($idArea,$link){
	$resultado = mysql_query("SELECT id_area,nome_area FROM tb_area where id_area<>{$idArea}",$link);
	return $resultado;
}

/**
 *Remove uma disciplina com id passado por parâmetro
 */
function disciplinaDelete($adeletar,$link){
	return mysql_query("DELETE FROM tb_disciplina WHERE id_disciplina = ".$adeletar,$link) or die(mysql_error());
}

/**
 *Carrega a disciplina com id passado por parametro para a tela de edição
 */
function disciplinaConsultaEdicao($id,$link){
	$resultado = mysql_query("SELECT a.id_area as id_area, a.nome_area as nome_area, d.nome_disciplina as nome_disciplina from tb_disciplina d, tb_area a where d.id_area = a.id_area and id_disciplina={$id}",$link);
	return $resultado;
}


?>
