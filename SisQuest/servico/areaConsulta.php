<?php
include ($_SERVER['DOCUMENT_ROOT']."/SisQuest/dao/seguranca.php");
include ($_SERVER['DOCUMENT_ROOT']."/SisQuest/dao/areaDao.php");

$resultado = areaConsulta($_SG['link']);

?>