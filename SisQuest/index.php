<?php
include("./dao/seguranca.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SisQuest</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
<!--
sworm, a free CSS web template by spyka Webmaster (www.spyka.net)

Download: http://www.spyka.net/web-templates/sworm/

License: Creative Commons Attribution
//-->
</head>
<body>
<div id="container">
	<div id="header">
    	<h1><a href="/">SisQuest</a></h1>
        <h2>Solucoes praticas de aprendizado</h2>
        <div class="clear"></div>
    </div>
	<div id="body">
		<div id="divLogin">
			<fieldset>
			<legend>Informe seus dados para acesso</legend>
              <form action="./dao/login.php" method="post">
                    <p>
                    <label for="name">Usuario:</label>
                    <input name="user" id="user" value="" type="text" class="textLogin"/></p>
                    <p>
                    <label for="email">Senha:</label>
                    <input name="password" id="pwd" value="" type="password" class="textLogin"/></p>

                    
                    <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Entrar" type="submit" /> <a style="float:right" href="#">Equeceu sua senha?</a></p>
                    
                
                
                
                </form>
            </fieldset>
            
        </div>
		<div class="clear"></div>
    </div>
    <div id="footer">
       
        <div class="footer-bottom">
            <p>&copy; YourSite 2010. Design by <a href="http://www.spyka.net">Free CSS Templates</a> | <a href="http://www.justfreetemplates.com">Free Web Templates</a></p>
         </div>
    </div>
</div>
</body>
</html>
