<?php
include("seguranca.php");
if (getenv("REQUEST_METHOD") == 'POST') 
{
  $usuario = $_POST['user'];
  $senha = $_POST['password'];
  if (validaUsuario($usuario, $senha) == true) {
      if ($_SESSION['tipoUsuario']=='1')//tipo Administrador
        header("Location: ../adm/principal.php");
      if ($_SESSION['tipoUsuario']=='2')// tipo Professor
        header("Location: ../professor/principal.php");
      if ($_SESSION['tipoUsuario']=='3')// tipo Aluno
        header("Location: ../aluno/principal.php");
    } else {
         echo "<div align='center'><h1>Usu&aacute;rio e/ou senha inv&aacute;lido(s)!</h1></div>";
         echo "<meta http-equiv='refresh' content='2;URL=../index.php'>";
         //expulsaVisitante();

    }
}


?>
