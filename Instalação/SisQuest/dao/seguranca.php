<?php
    const TIPO_ADM = 1; //Constante do que define o Usuario como sendo Administrador
    const TIPO_PROFESSOR = 2; //Constante do que define o Usuario como sendo Professor
    const TIPO_ALUNO = 3; //Constante do que define o Usuario como sendo Aluno
    	
	$_SG['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL?
    $_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?

    $_SG['caseSensitive'] = false;     // Usar case-sensitive? Onde 'tiago' é diferente de 'TIAGO'

    $_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?

    $_SG['servidor'] = 'localhost:3306';    // Servidor MySQL (Modificar caso a instalação não seja padrão)

    /**
     * Usuário MySQL (Modificar caso a instalação não seja padrão). Defina aqui o usuário de acesso ao banco de
     * dados MySql.
     */
    $_SG['usuario'] = 'root';         
   
    
    /**
     * Senha MySQL (Modificar caso a instalação não seja padrão). Defina aqui sua senha de acesso ao banco de 
     * dados MySql.
     */
    $_SG['senha'] = '';                 
    
    
    
    $_SG['banco'] = 'db_leandro_kevin';            // Banco de dados MySQL

    $_SG['paginaLogin'] = "../index.php"; // Página de login

    $_SG['tabela'] = 'tb_usuario';       // Nome da tabela onde os usuários são salvos
    
// Verifica se precisa fazer a conexão com o MySQL
if ($_SG['conectaServidor'] == true) {
	$_SG['link'] = mysql_pconnect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");
	mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");
	mysql_set_charset('utf8',$_SG['link']);
}

// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true) {
	session_start();
}

/**
* Função que valida um usuário e senha
*
* @param string $usuario - O usuário a ser validado
* @param string $senha - A senha a ser validada
*
* @return bool - Se o usuário foi validado ou não (true/false)
*/
function validaUsuario($usuario, $senha) {
	global $_SG;

	$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';

	// Usa a função addslashes para adicionar as aspas
	$nusuario = addslashes($usuario);
	$nsenha = addslashes($senha);

	// Monta uma consulta SQL (query) para procurar um usuário
	$sql = "SELECT Usuario_Login, Nome, TipoUsuario FROM ".$_SG['tabela']." WHERE ".$cS." Usuario_Login = '".$nusuario."' AND ".$cS." Senha = PASSWORD('".$nsenha."') LIMIT 1";
	$query = mysql_query($sql);
	$resultado = mysql_fetch_assoc($query);

	// Verifica se encontrou algum registro
	if (empty($resultado)) {
		// Nenhum registro foi encontrado => o usuário é inválido
		return false;
	} else {
	// O registro foi encontrado => o usuário é valido
		// Definimos dois valores na sessão com os dados do usuário
		$_SESSION['usuarioLogin'] = $resultado['Usuario_Login']; // Pega o valor da coluna 'id do registro encontrado no MySQL
		$_SESSION['usuarioNome'] = $resultado['Nome']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
		$_SESSION['tipoUsuario'] = $resultado['TipoUsuario'];
		// Verifica a opção se sempre validar o login
		if ($_SG['validaSempre'] == true) {
			// Definimos dois valores na sessão com os dados do login
			$_SESSION['usuarioSenha'] = $senha;
		}

	return true;
}
}

/**
* Função que protege uma página contra usuários não logados e que tentem acessar áreas do sistema incompatíveis com seu perfil
*/
function protegePagina($tipoUsuario) {
	global $_SG;
	
	if ($_SESSION['tipoUsuario']!=$tipoUsuario){ //Expulsa o usuário caso este tente acessar uma área incompatível com seu perfil
		expulsaVisitante();
	}

	if (!isset($_SESSION['usuarioLogin']) OR !isset($_SESSION['usuarioNome'])) {
	// Há usuário logado, verifica se precisa validar o login novamente
		if ($_SG['validaSempre'] == true) {
		// Verifica se os dados salvos na sessão batem com os dados do banco de dados
			if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
			// Os dados não batem, manda pra tela de login
				expulsaVisitante();	
			}
		}
	}
}

/**
* Função para expulsar um visitante não logado que queira forçar a entrada digitando o endereço diretamente no navegador
*/
function expulsaVisitante() {
	global $_SG;

	// Remove as variáveis da sessão (caso elas existam)
	unset($_SESSION['usuarioLogin'], $_SESSION['usuarioNome'], $_SESSION['usuarioSenha'], $_SESSION['tipoUsuario']);

	// Manda pra tela de login
	header("Location: ".$_SG['paginaLogin']);
}
?>
