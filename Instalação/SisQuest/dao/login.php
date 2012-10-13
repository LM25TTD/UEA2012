<?php
include("seguranca.php");

echo "
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<title>SisQuest</title>
<link rel=\"stylesheet\" href=\"../styles.css\" type=\"text/css\" />
</head>
<body>
<div id=\"container\">
<div id=\"header\">
<h1><a href=\"/\">SisQuest</a></h1>
<h2>Soluções práticas em aprendizado</h2>
<div class=\"clear\"></div>
</div>
<div id=\"nav\">

</div>
<div id=\"body\">
<div id=\"content\">

";

/**
 *Verifica se existe o usuario com esta senha e seta na sessão o tipo deste
 */
if (getenv("REQUEST_METHOD") == 'POST')
{
	$usuario = $_POST['user'];
	$senha = $_POST['password'];
	if (validaUsuario($usuario, $senha) == true) {
		if ($_SESSION['tipoUsuario']==TIPO_ADM)//tipo Administrador
			header("Location: ../adm/principal.php");
		if ($_SESSION['tipoUsuario']==TIPO_PROFESSOR)// tipo Professor
			header("Location: ../professor/principal.php");
		if ($_SESSION['tipoUsuario']==TIPO_ALUNO)// tipo Aluno
			header("Location: ../aluno/principal.php");
	} else {
		echo "<div align='center'><h1>Usu&aacute;rio e/ou senha inv&aacute;lido(s)!</h1></div> <br/><br/>";
		echo "<meta http-equiv='refresh' content='2;URL=../index.php'>";

	}
}

echo "
</div>
<div class=\"clear\"></div>
</div>
<div id=\"footer\">

<div class=\"footer-bottom\">
<p>&copy; SisQuest 2012. Design by <a href=\"http://www.spyka.net\">Free CSS Templates</a> | <a href=\"http://www.justfreetemplates.com\">Free Web Templates</a></p>
</div>
</div>
</div>
</body>
</html>

";

?>
