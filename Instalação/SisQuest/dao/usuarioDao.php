<?php
/**
 *Retorna os dados do usuário logado para utilização na seção Meus Dados
 */
function visualizar_cadastro(){
	global $_SG;

	$tab_usuario = "tb_usuario";
	$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
	$login = addslashes($_SESSION['usuarioLogin']);
	// Monta uma consulta SQL (query) para procurar o usuário
	$sql = "SELECT Usuario_Login, Nome, DATE_FORMAT( Data_Nascimento,  '%d/%m/%Y' ), Telefone, Email, Rua, Numero, Bairro, Complemento, Cidade, Estado, Cep, TipoUsuario FROM ".$tab_usuario." WHERE ".$cS." Usuario_Login = '".$login."' LIMIT 1";
	$resultado = mysql_query($sql,$_SG['link']);
	$linha = mysql_fetch_array($resultado);
	return $linha;
}

/**
 *Persiste as modificações da edição de um usuário
 */
function alterar_cadastro($login,$nome,$data,$tel,$email,$rua,$numero,$bairro,$comp,$cidade,$estado,$cep){
	global $_SG;

	$tab_usuario = "tb_usuario";
	$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
	// Monta uma query para atualizar os dados
	$sql = "UPDATE ".$tab_usuario." SET Usuario_Login='".$login."', Nome='".$nome."', Data_Nascimento=STR_TO_DATE('".$data."','%d/%m/%Y'), Telefone='".$tel."', Email='".$email."', Rua='".$rua."', Numero='".$numero."', Bairro='".$bairro."', Complemento='".$comp."', Cidade='".$cidade."', Estado='".$estado."', Cep='".$cep."' WHERE Usuario_Login='".$login."'";

	if (!mysql_query($sql,$_SG['link']))
	{
		die('Error: ' . mysql_error());
	}

	header("Location: meus_dados.php");

}

/**
 *Busca e retorna todos os usuários para a tela de filto
 */
function usuarioConsulta($link){
	$resultado = mysql_query("SELECT usuario_login, nome, tipousuario from tb_usuario",$link);
	return $resultado;
}

/**
 *Busca e retorna os usuários de acordo com a página para montar a paginação na tela de filtro
 */
function usuarioConsultaFiltro($liminf,$limsup,$link){
	$resultado = mysql_query("SELECT usuario_login, nome, tipousuario from tb_usuario LIMIT $liminf,$limsup",$link);
	return $resultado;
}

/**
 *Carrega um usuário para edição
 */
function usuarioConsultaEdicao($login,$link){
	$resultado = mysql_query("SELECT Usuario_Login, Nome, DATE_FORMAT( Data_Nascimento,  '%d/%m/%Y' ), Telefone, Email, Rua, Numero, Bairro, Complemento, Cidade, Estado, Cep, TipoUsuario from tb_usuario where usuario_login='{$login}' LIMIT 1",$link);
	return $resultado;
}

/**
 *Busca e retorna um usuário de acordo com o nome
 */
function usuarioBusca($nome, $link){
	$resultado = mysql_query("SELECT Usuario_Login, Nome, DATE_FORMAT( Data_Nascimento,  '%d/%m/%Y' ), Telefone, Email, Rua, Numero, Bairro, Complemento, Cidade, Estado, Cep, TipoUsuario from tb_usuario where nome like '%{$nome}%' LIMIT 1",$link);
	return mysql_fetch_array($resultado);
}

/**
 *Remove um usuário com o id passado por parâmetro
 */
function usuarioDelete($adeletar,$link){
	return mysql_query("DELETE FROM tb_usuario WHERE usuario_login = '".$adeletar."'",$link) or die(mysql_error());
}

/**
 *Valida e cadastra um novo usuário
 */
function usuarioCadastro($nome,$login,$senha,$datanasc,$telefone,$email,$rua,$numero,$bairro,$complemento,$cidade,$estado,$cep,$tipousuario,$cadastrante,$link){

	if (!$nome){

		echo "Nome &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";

	}else{

		if (!$login){

			echo "Login &eacute; um campo requerido. <br />";
			echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";

		}else{

			if (!$senha){

				echo "Senha &eacute; um campo requerido. <br />";
				echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";

			}else{

				if(!$datanasc || !$telefone || !$email || !$rua || !$numero || !$bairro || !$cidade || !$estado || !$cep){
					echo "<div align='center'><h1>Preencha os campos obrigatórios.</h1></div> <br />";
					echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";
					return;
				}



				$sql_nome_check = mysql_query("SELECT COUNT(usuario_login) FROM tb_usuario WHERE usuario_login='{$login}'");

				$nReg = mysql_fetch_array($sql_nome_check);

				$nome_check = $nReg[0];

				if ($nome_check > 0){
					echo "Este login ( <strong>".$enunciado."</strong> ) j&aacute; est&aacute; sendo utilizado.<br />Por favor utilize outro! <br />";

					unset($enunciado);



					echo "<br />";

					echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";


				}else{

					$sql = mysql_query("INSERT INTO tb_usuario (usuario_login, senha,nome,data_nascimento,telefone,email,rua,numero,bairro,complemento,cidade,estado,cep,tipousuario,cadastrante)
							VALUES('{$login}',PASSWORD('{$senha}'),'{$nome}',STR_TO_DATE('{$datanasc}','%d/%m/%Y'),'{$telefone}','{$email}','{$rua}','{$numero}','{$bairro}','{$complemento}','{$cidade}','{$estado}','{$cep}','{$tipousuario}','{$cadastrante}')",$link)
							or die(mysql_error());

					echo "<div align='center'><h3>Cadastro realizado com sucesso!</h3></div>";
					echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";



					if (!$sql){

						echo "Ocorreu algum erro, por favor entre em contato com o Webmaster.";
						echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";

					}

				}
			}
		}
	}

}

/**
 *Persiste as modificações do usuário
 */
function usuarioAtualizar($nome,$login,$datanasc,$telefone,$email,$rua,$numero,$bairro,$complemento,$cidade,$estado,$cep,$tipousuario,$cadastrante,$link){

	if (!$nome){

		echo "Nome &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";

	}else{

		if (!$login){

			echo "Login &eacute; um campo requerido. <br />";
			echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";

		}else{
			if(!$datanasc || !$telefone || !$email || !$rua || !$numero || !$bairro || !$cidade || !$estado || !$cep){
				echo "<div align='center'><h1>Preencha os campos obrigatórios.</h1></div> <br />";
				echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";
				return;
			}



			$sql_nome_check = mysql_query("SELECT COUNT(usuario_login) FROM tb_usuario WHERE usuario_login='{$login}'");

			$nReg = mysql_fetch_array($sql_nome_check);

			$nome_check = $nReg[0];

			if ($nome_check > 1){
				echo "Este login ( <strong>".$enunciado."</strong> ) j&aacute; est&aacute; sendo utilizado.<br />Por favor utilize outro! <br />";

				unset($enunciado);



				echo "<br />";

				echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";


			}else{

				$sql = mysql_query("UPDATE tb_usuario SET nome='{$nome}',data_nascimento=STR_TO_DATE('{$datanasc}','%d/%m/%Y'),telefone='{$telefone}',email='{$email}',rua='{$rua}',numero='{$numero}',bairro='{$bairro}',complemento='{$complemento}',cidade='{$cidade}',estado='{$estado}',cep='{$cep}',tipousuario={$tipousuario},cadastrante='{$cadastrante}'
				WHERE usuario_login='{$login}'",$link)
				or die(mysql_error());

				echo "<div align='center'><h3>Informações de usuário modificadas com sucesso!</h3></div>";
				echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";



				if (!$sql){

					echo "Ocorreu algum erro, por favor entre em contato com o Webmaster.";
					echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";

				}

			}
		}
	}

}

/**
 *Altera a senha do usuário quando feita pelo Administrador
 */
function usuarioAlterarSenhaAdm($login,$novasenha,$link){


	if (!$novasenha){

		echo "Nova Senha &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";
			
	}else{


		$sql = mysql_query("UPDATE tb_usuario SET senha=PASSWORD('{$novasenha}')
		WHERE usuario_login='{$login}'",$link)
		or die(mysql_error());

		echo "<div align='center'><h3>Senha alterada com sucesso!</h3></div>";
		echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";



		if (!$sql){

			echo "Ocorreu algum erro, por favor entre em contato com o Webmaster.";
			echo "<meta http-equiv='refresh' content='2;URL=../adm/usuarios/filtro.php'>";

		}


	}
		

}

/**
 *Altera a senha do usuário quando feita pelo próprio
 */
function usuarioAlterarSenha($login,$senhaatual,$novasenha,$link){


	if($_SESSION['tipoUsuario']==1){//Verifica o tipo de usuário para fazer o redirecionamento para a página correta
		$raiz="adm";
	}
	else{
		if($_SESSION['tipoUsuario']==2){
			$raiz="professor";
		}else{
			$raiz="aluno";
		}
	}


	if (!$senhaatual){

		echo "Senha Atual &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/principal.php'>";

	}else{

		if (!$novasenha){

			echo "Nova Senha &eacute; um campo requerido. <br />";
			echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/principal.php'>";

		}else{
				

			$sql_nome_check = mysql_query("SELECT * FROM tb_usuario WHERE usuario_login='{$login}' AND senha=PASSWORD('{$senhaatual}')",$link);

			$nReg = mysql_num_rows($sql_nome_check);

				

			if ($nReg < 1){
				echo "<h3> Senha Atual está incorreta! </h3><br />";

				unset($senhaatual);
				unset($novasenha);

				echo "<br />";

				echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/principal.php'>";


			}else{

				$sql = mysql_query("UPDATE tb_usuario SET senha=PASSWORD('{$novasenha}')
				WHERE usuario_login='{$login}'",$link)
				or die(mysql_error());

				echo "<div align='center'><h3>Senha alterada com sucesso!</h3></div>";
				echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/principal.php'>";



				if (!$sql){

					echo "Ocorreu algum erro, por favor entre em contato com o Webmaster.";
					echo "<meta http-equiv='refresh' content='2;URL=../{$raiz}/principal.php'>";

				}

			}
		}
	}

}



?>