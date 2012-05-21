<?php

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
?>