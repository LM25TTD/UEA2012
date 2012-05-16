<?php
include ($_SERVER['DOCUMENT_ROOT']."/SisQuest/dao/seguranca.php");
include ($_SERVER['DOCUMENT_ROOT']."/SisQuest/dao/disciplinaDao.php");

disciplinaCadastro ($_POST['area'],trim($_POST['nome']),$_SESSION['usuarioLogin']);

?>