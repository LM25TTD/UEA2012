<?php 
include("../../servico/assuntoConsulta.php");
protegePagina(TIPO_ADM);
$id = $_GET['id'];
$linha=carregarAssuntoEdicaoServico($id, $_SG['link']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../../scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../scripts/comboAssuntoEditar.js"></script>

<title>SisQuest</title>
<link rel="stylesheet" href="../../styles.css" type="text/css" />

<script language="javascript">
   
 function verifica(form)
 {
        if (form.area.value==0) 
        {
         alert("Selecione uma área!");
  		 return(false);
        }else{
        	if (form.disciplina.value==0) 
            {
             alert("Selecione uma disciplina!");
      		 return(false);
            }else{
             	if(form.nome.value.length<1){
            		 alert("Nome do Assunto é um campo obrigatório!");
          		 	return(false);
            	}
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
            <li><a href="../sobreAdm.php">SOBRE</a></li>
            <li><a href="../meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
    </div>
    <div id="body">
		<div id="content">
			            
            <h3>Editar assunto</h3>

            <fieldset>
                <legend>Insira os dados</legend>
                <form action="../../servico/assuntoAtualizar.php" method="post" onsubmit="return (verifica(this))">
                    <input type="hidden" name="idAssunto" id="idAssunto" value="<?php echo $id ?>" />
                    
                    
                    <p><label for="area">Área: *</label>                    
                    <select name="area" id="area" class="textLogin">
                    	<option value="<?php echo $linha['id_area'];?>"><?php echo $linha['nome_area'];?></option>
                    </select></p>
                    
                    <p><label for="disciplina">Disciplina: *</label>
                    
                    <select name="disciplina" id="disciplina" class="textLogin">
                    	<option value="<?php echo $linha['id_disciplina'];?>"><?php echo $linha['nome_disciplina'];?></option>
                    </select></p>
                    
                    <p><label for="nome">Nome do assunto: *</label>
                    <input name="nome" id="nome" value="<?php echo $linha['nome_assunto'];?>" type="text" class="textLogin" /></p>

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
                        <li><a style="background-color:#23193D;color:#FFFFFF"   href="filtro.php">ASSUNTOS</a></li>
                        <li><a href="../disciplina/filtro.php">DISCIPLINAS</a></li>
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
