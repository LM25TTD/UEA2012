<?php
include ("../../dao/seguranca.php");
include ("../../dao/areaDao.php");

	areaCadastro(trim($_POST['nomeArea']),$_SG['link'],$_SESSION['usuarioLogin']);

?>