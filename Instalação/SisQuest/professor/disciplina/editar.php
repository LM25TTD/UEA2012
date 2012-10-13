<?php
include("../../servico/disciplinaConsulta.php");

protegePagina(TIPO_PROFESSOR);

$id = $_GET['id'];
$linha = mysql_fetch_array(disciplinaConsultaEdicaoServico($id, $_SG['link']));
$resultadoAreasEdicao=resultadoAreasConsultaEdicaoServico($linha['id_area'],$_SG['link']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SisQuest</title>
<link rel="stylesheet" href="../../styles.css" type="text/css" charset="utf-8"/>
<!--
sworm, a free CSS web template by spyka Webmaster (www.spyka.net)

Download: http://www.spyka.net/web-templates/sworm/

License: Creative Commons Attribution
//-->
<script language="javascript">
 function verifica(form)
 {
        if (form.area.value==0) 
        {
         alert("Selecione uma área!");
  		 return(false);
        }else{
            if(form.nome.value.length<1){
            	 alert("Nome da Disciplina é um campo obrigatório!");
          		 return(false);
            }
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
            <li><a href="../sobre.php">SOBRE</a></li>
            <li><a href="../meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
    </div>
    <div id="body">
		<div id="content">
			            
            <h3>Editar disciplina</h3>

            <fieldset>
                <legend>Insira os dados</legend>
                <form action="../../servico/disciplinaAtualizar.php" method="post" onsubmit="return (verifica(this))">
                    
                    <input type="hidden" name="idDisciplina" id="idDisciplina" value="<?php echo $id ?>" />
                    
                    
                    <p><label for="name">Área: *</label>
                    
                    <select name="area" id="area" class="textLogin">
                    <option value="<?php echo $linha['id_area'];?>"><?php echo $linha['nome_area'];?></option>
                     
                     <?php while ($linhas= mysql_fetch_array($resultadoAreasEdicao)){?>
                		<option value="<?php echo $linhas['id_area'];?>"><?php echo $linhas['nome_area'];?></option>
                	 <?php } ?>  
                    </select></p>
                    <p><label for="nome">Nome da disciplina: *</label>
                    <input name="nome" id="nome" type="text" value="<?php echo $linha['nome_disciplina'];?>"  class="textLogin" /></p>

                    <p><input name="send" style="margin-left: 150px;" class="formbutton" value="Salvar" type="submit" /><a class="linkOperacao"href="filtro.php">Cancelar e Voltar</a></p>
                </form>
            </fieldset>
            
        </div>
        
        <div class="sidebar">
            <ul>	
               <li>
                    <h3>Itens para Cadastro</h3>
                    <ul class="blocklist">
                        <li><a href="../area/filtro.php">ÁREAS</a></li>
                        <li><a   href="../assunto/filtro.php">ASSUNTOS</a></li>
                        <li><a style="background-color:#23193D;color:#FFFFFF" href="filtro.php">DISCIPLINAS</a></li>
                        <li><a href="../questoes/filtro.php">QUESTÕES</a></li>
                        <li><a href="../usuarios/filtro.php">USUÁRIOS</a></li>
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
