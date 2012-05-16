<?php
include ($_SERVER['DOCUMENT_ROOT']."/SisQuest/dao/seguranca.php");
include ($_SERVER['DOCUMENT_ROOT']."/SisQuest/dao/areaDao.php");

	areaCadastro(trim($_POST['nomeArea']),$_SG['link'],$_SESSION['usuarioLogin']);

?>