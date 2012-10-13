<?php
/**
 *Função que carrega o Id e o Nome de todas as Áreas cadastradas no BD
 */
function areaConsulta($link){
	$resultado = mysql_query("SELECT id_area, nome_area from tb_area",$link);
	return $resultado;
}

/**
 *Função que carrega o Id e o Nome de todas as Áreas cadastradas no BD limitando a paginação
 */
function areaConsultaFiltro($liminf,$limsup,$link){
	$resultado = mysql_query("SELECT id_area, nome_area from tb_area LIMIT $liminf,$limsup",$link);
	return $resultado;
}

/**
 *Função responsável pelo cadastro de novas áreas na base de dados
 */
function areaCadastro($nomeArea,$link,$cadastrante){
	
	if($_SESSION['tipoUsuario']==1)//Verifica o tipo de usuário para fazer o redirecionamento para a página correta
		$raiz="adm";
	else
		$raiz="professor";
	
	if (!$nomeArea){//Validação para evitar que o valor do nome da área seja inserido em branco
	
		echo "Nome da area &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/area/filtro.php'>";
	
	}else{
	
		//Verifica se já existe área com o mesmo nome na base de dados
		$sql_nome_check = mysql_query("SELECT COUNT(Id_Area) FROM tb_area WHERE Nome_Area='{$nomeArea}'",$link);
	
		$nReg = mysql_fetch_array($sql_nome_check);
	
		$nome_check = $nReg[0];
	
		if ($nome_check > 0){
			echo "Este nome ( <strong>".$nomeArea."</strong> ) j&aacute; est&aacute; sendo utilizado.<br />Por favor utilize outro nome! <br />";
	
			unset($nomeArea);
	
			echo "<br />";
			echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/area/filtro.php'>";
	
		}else{
			$sql = mysql_query("INSERT INTO tb_area (nome_area,cadastrante)
					VALUES('{$nomeArea}','{$cadastrante}')",$link)
					or die(mysql_error());
	
			echo "<div align='center'><h3>Cadastro realizado com sucesso!</h3></div>";
			echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/area/filtro.php'>";
				
				
	
			if (!$sql){
	
				echo "Ocorreu algum erro, por favor entre em contato com o Webmaster.";
				echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/area/filtro.php'>";
	
			}
	
		}
	
	}
}

/**
 *Função responsável por apagar a área com o id passado como parâmetro
 */
function areaDelete($adeletar,$link){
	return mysql_query("DELETE FROM tb_area WHERE id_area = ".$adeletar,$link) or die(mysql_error());
}

/**
 *Função retorna a área com o id passado como parâmetro para edição na tela
 */
function areaConsultaEdicao($id,$link){
	$resultado = mysql_query("SELECT nome_area from tb_area where id_area={$id}",$link);
	return $resultado;
}


/**
 *Função que efetua a atualização de uma área
 */
function areaAtualizar($idArea,$nomeArea,$link,$cadastrante){

	if($_SESSION['tipoUsuario']==1)//Verifica o tipo de usuário para fazer o redirecionamento para a página correta
		$raiz="adm";
	else
		$raiz="professor";

	if (!$nomeArea){//Validação para evitar que o valor do nome da área seja inserido em branco

		echo "Nome da area &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/area/filtro.php'>";

	}else{

		//Verifica se já existe área com o mesmo nome na base de dados
		$sql_nome_check = mysql_query("SELECT COUNT(Id_Area) FROM tb_area WHERE Nome_Area='{$nomeArea}' and id_area<>{$idArea}",$link);

		$nReg = mysql_fetch_array($sql_nome_check);

		$nome_check = $nReg[0];

		if ($nome_check > 0){
			echo "Este nome ( <strong>".$nomeArea."</strong> ) j&aacute; est&aacute; sendo utilizado.<br />Por favor utilize outro nome! <br />";

			unset($nomeArea);

			echo "<br />";
			echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/area/filtro.php'>";

		}else{
			$sql = mysql_query("UPDATE tb_area SET nome_area='{$nomeArea}' , cadastrante='{$cadastrante}'
					WHERE id_area={$idArea}",$link)
					or die(mysql_error());

			echo "<div align='center'><h3>Área modificada com sucesso!</h3></div>";
			echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/area/filtro.php'>";



			if (!$sql){

				echo "Ocorreu algum erro, por favor entre em contato com o Webmaster.";
				echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/area/filtro.php'>";

			}

		}

	}
}





?>
