<?php
include ("../dao/seguranca.php");
include ("../dao/disciplinaDao.php");

disciplinaCadastro ($_POST['area'],trim($_POST['nome']),$_SESSION['usuarioLogin']);

?>