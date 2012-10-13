<?php
include("../../servico/usuarioConsulta.php");
protegePagina(TIPO_ADM);

$num_por_pagina = 10;

if (isset($_GET['pagina'])){
	$pagina = $_GET['pagina'];
}

if (!isset($pagina)) {
	$pagina=1;
}
$primeiro_registro = ($pagina*$num_por_pagina) - $num_por_pagina;
$resultado = usuarioConsultaFiltro($primeiro_registro,$num_por_pagina,$_SG['link']);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SisQuest</title>
<link rel="stylesheet" href="../../styles.css" type="text/css" />
<script type="text/javascript" src="../../scripts/check.js"></script>

<!--
sworm, a free CSS web template by spyka Webmaster (www.spyka.net)

Download: http://www.spyka.net/web-templates/sworm/

License: Creative Commons Attribution
//-->

<script language="javascript">
 function verifica(form)
 {
        if (form.s.value.length<1) 
        {
         alert("Digite o Nome do usuário para pesquisar!");
  		 return(false);
        }
        return(true);  
 }
</script>
</head>
<body>
<div id="container">
	<div id="header">
    	<h1><a href="/">SisQuest</a></h1>
        <h2>Soluções práticas em aprendizado</h2>
        <div class="clear"></div>
    </div>
    <div id="nav">
    	<ul>
        	<li class="start"><a href="../principal.php">INÍCIO</a></li>
            <li class="selected"><a href="../cadastros.php">CADASTROS</a></li>
            <li><a href="../resolver_questoes.php">RESOLVER QUESTÕES</a></li>
            <li><a href="../sobreAdm.php">SOBRE</a></li>
            <li><a href="../meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
    </div>
    <div id="body">
		<div id="content">
				
        <fieldset>
        <legend>Operações</legend>
        <form action="../../servico/usuarioDelete.php" method="post" onsubmit="return (existemItensParaExcluir())">
        
			<p>
				<input class="formbutton" style="margin-left: 150px;" onclick="location.href='cadastro.php' " type='button' value="Novo"/> 
				<input class="formbutton" style="margin-left: 100px;" type="submit" name="exlcuir" value="Excluir Selecionados" onClick="return confirm('Deseja mesmo excluir esse(s) item(ns)?')"/>
             </p>
             <p>* Para editar um usuário clique sobre o login dele</p>
            
          
            
            
            <h3>Usuários Cadastrados</h3>
            
            <?php 
            	$totalConsulta=mysql_num_rows($resultadoTotal);
               	include '../../paginacao.php';
               	echo "<br/><br/>";
             ?>
			
            <table cellspacing="0">
                <tr>
                    <th width="25%">Login</th>
                    <th width="55%">Nome</th>
                    <th width="20%">Tipo</th>
                    <th></th>
                </tr>
               
               <?php while ($linhas= mysql_fetch_array($resultado)){?>
                	<tr>
                		<td><a href="editar.php?login=<?php echo $linhas['usuario_login'];?>"><?php echo $linhas['usuario_login'];?></a></td>
                		<td><?php echo $linhas['nome'];?></td>
                		<td><?php echo utilTipoUsuario($linhas['tipousuario']);?></td>
                		<td><?php echo "<input name=\"excluir[]\" type=\"checkbox\" id=\"".$linhas['usuario_login']."\" value=\"".$linhas['usuario_login']."\">"; ?></td>
                   	</tr>                	
               <?php } ?>

            </table>
            </form>
			</fieldset>
            <p>&nbsp;</p>
       </div>
        
        <div class="sidebar">
            <ul>	
               <li>
                    <h3>Itens para Cadastro</h3>
                    <ul class="blocklist">
                        <li><a  href="../area/filtro.php">ÁREAS</a></li>
                        <li><a href="../assunto/filtro.php">ASSUNTOS</a></li>
                        <li><a href="../disciplina/filtro.php">DISCIPLINAS</a></li>
                        <li><a href="../questoes/filtro.php">QUESTÕES</a></li>
                        <li><a style="background-color:#23193D;color:#FFFFFF"href="filtro.php">USUÁRIOS</a></li>
                    </ul>
                </li>
                
                 <li>
                	<h3>Buscar Usuário</h3>
                    <ul>
                    	<li>
                            <form method="post" class="searchform" action="busca_usuario.php" onsubmit="return (verifica(this))" >
                                <p>Nome:</p>
                                <p>
                                    <input type="text" size="12" id="s" name="s" class="s" />
                                    <input type="submit" class="searchsubmit formbutton" value="Buscar" />
                                </p>
                            </form>	
						</li>
					</ul>
                </li>
                
                
                
            </ul> 
        </div>
    	<div class="clear"></div>
    </div>
    <div id="footer">
        
        <div class="footer-bottom">
            <p>&copy; SisQuest 2012. Design by <a href="http://www.spyka.net">Free CSS Templates</a> | <a href="http://www.justfreetemplates.com">Free Web Templates</a></p>
         </div>
    </div>
</div>
</body>
</html>
