<?php
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

include("../dao/seguranca.php");
include("../dao/assuntoDao.php");

if($_SESSION['tipoUsuario']==1)
	$raiz="adm";
else
	$raiz="professor";


foreach ($_POST['excluir'] as $adeletar)
{
	$k = null;
	$del = assuntoDelete($adeletar, $_SG['link']);
	$k = 1;
}

if(isset($k))
{
	echo "<div align='center'><h3>Assunto(s) excluído(s) com sucesso.</h3></div>";
	echo "<meta http-equiv='refresh' content='3;URL=../{$raiz}/assunto/filtro.php'>";
}else{
	echo "<div align='center'>Ocorreu algum erro, por favor entre em contato com o Webmaster.</div>";
	echo "<meta http-equiv='refresh' content='4;URL=../{$raiz}/assunto/filtro.php'>";
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