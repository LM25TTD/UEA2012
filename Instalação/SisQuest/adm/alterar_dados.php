<?php
include("../dao/seguranca.php");
include("../dao/usuarioDao.php");
alterar_cadastro($_REQUEST['input_login'],$_REQUEST['input_nome'],$_REQUEST['input_data'],$_REQUEST['input_tel'],$_REQUEST['input_email'],$_REQUEST['input_rua'],$_REQUEST['input_numero'],$_REQUEST['input_bairro'],$_REQUEST['input_comp'],$_REQUEST['input_cidade'],$_REQUEST['input_estado'],$_REQUEST['input_cep']);


?>
