<?php

function visualizar_cadastro(){
global $_SG;
	
	$msg[0] = "Conexão com o banco falhou!";
	$msg[1] = "Não foi possível selecionar o banco de dados!";
	$tab_usuario = "tb_usuario";
	$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
	$conexao = mysql_pconnect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die($msg[0]);
	mysql_select_db($_SG['banco'],$conexao) or die($msg[1]);
	
	
	// Usa a função addslashes para escapar as aspas
	$login = addslashes($_SESSION['usuarioLogin']);
	
	
	// Monta uma consulta SQL (query) para procurar o usuário
	$sql = "SELECT Usuario_Login, Nome, Data_Nascimento, Telefone, Email, Rua, Numero, Bairro, Complemento, Cidade, Estado, Cep, TipoUsuario FROM ".$tab_usuario." WHERE ".$cS." Usuario_Login = '".$login."' LIMIT 1";
	$resultado = mysql_query($sql);
	$linha = mysql_fetch_array($resultado);
	return $linha;
}

function alterar_cadastro($login,$nome,$data,$tel,$email,$rua,$numero,$bairro,$comp,$cidade,$estado,$cep){
	global $_SG;
	
	$msg[0] = "Conexão com o banco falhou!";
 	$msg[1] = "Não foi possível selecionar o banco de dados!";
 	$tab_usuario = "tb_usuario";
 	$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
 	
 	
	$conexao = mysql_pconnect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die($msg[0]);
 	mysql_select_db($_SG['banco'],$conexao) or die($msg[1]);


// Usa a função addslashes para escapar as aspas
//$login = addslashes($_SESSION['usuarioLogin']);


 	// Monta uma consulta SQL (query) para procurar o usuário
 
$sql = "UPDATE ".$tab_usuario." SET Usuario_Login='".$login."', Nome='".$nome."', Data_Nascimento='".$data."', Telefone='".$tel."', Email='".$email."', Rua='".$rua."', Numero='".$numero."', Bairro='".$bairro."', Complemento='".$comp."', Cidade='".$cidade."', Estado='".$estado."', Cep='".$cep."' WHERE Usuario_Login='".$login."'";

if (!mysql_query($sql))
{
	die('Error: ' . mysql_error());
}
header("Location: meus_dados.php");


}
?>