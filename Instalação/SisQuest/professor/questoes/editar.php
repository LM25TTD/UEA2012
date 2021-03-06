<?php 
include("../../servico/questaoConsulta.php");
protegePagina(TIPO_PROFESSOR);
$id = $_GET['id'];
$linha = carregaQuestaoEdicaoServico($id, $_SG['link']);

function verificaAltCorreta($alternativa,$resultadoConsulta){
	if ($alternativa==$resultadoConsulta){
		return "checked=\"checked\"";
	}
	return "";
}

function verificaDificuldade($nivel,$resultadoConsulta){
	if ($nivel==$resultadoConsulta){
		return "checked=\"checked\"";
	}
	return "";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../../scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../scripts/comboAreaDisciplinaAssuntoEditar.js"></script>
<title>SisQuest</title>
<link rel="stylesheet" href="../../styles.css" type="text/css" />
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
        	if (form.disciplina.value==0) 
            {
             alert("Selecione uma disciplina!");
      		 return(false);
            }else{
            	if (form.assunto.value==0) 
                {
                 alert("Selecione um assunto!");
          		 return(false);
                }else{
                	if(form.enunciado.value.length<1){
            		 	alert("Enunciado é um campo obrigatório!");
          		 		return(false);
            		}else{
            			if(form.alt1.value.length<1){
                		 	alert("Alternativa 1 é um campo obrigatório!");
              		 		return(false);
                		}else{
                			if(form.alt2.value.length<1){
                    		 	alert("Alternativa 2 é um campo obrigatório!");
                  		 		return(false);
                    		}else{
                    			if(form.alt3.value.length<1){
                        		 	alert("Alternativa 3 é um campo obrigatório!");
                      		 		return(false);
                        		}else{
                        			if(form.alt4.value.length<1){
                            		 	alert("Alternativa 4 é um campo obrigatório!");
                          		 		return(false);
                            		}else{
                            			if(form.alt5.value.length<1){
                                		 	alert("Alternativa 5 é um campo obrigatório!");
                              		 		return(false);
                                		}				
                        		}		
                    		}		
							
                		}

                    }
                }

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
            <li><a href="../sobre.php">SOBRE</a></li>
            <li><a href="../meus_dados.php">MEUS DADOS</a></li>
        <li class="end"><a href="../../dao/logout.php?opt=logout">SAIR</a></li>
        </ul>
    </div>
    <div id="body">
		<div id="content">
			            
            <h3>Editar questão</h3>

            <fieldset>
                <legend>Insira os dados</legend>
                <form action="../../servico/questaoAtualizar.php" method="post" onsubmit="return (verifica(this))">
                    <input type="hidden" name="idQuestao" id="idQuestao" value="<?php echo $id ?>" />
                    
                    <p><label for="area">Área: *</label>
                    <select name="area" id="area" class="textLogin">
                      <option value="<?php echo $linha['idarea'];?>"><?php echo $linha['narea'];?></option>
                    </select></p>
                    
                    <p><label for="disciplina">Disciplina: *</label>
                    <select name="disciplina" id="disciplina" class="textLogin">
                   		<option value="<?php echo $linha['iddisc'];?>"><?php echo $linha['ndisc'];?></option> 
                    </select></p>
                    
                    <p><label for="assunto">Assunto: *</label>
                    <select name="assunto" id="assunto" class="textLogin">
                        <option value="<?php echo $linha['idast'];?>"><?php echo $linha['nast'];?></option>            
                    </select></p>
                    
                    <p><label for="enunciado">Enunciado: *</label>
                    <input name="enunciado" id="enunciado"  value="<?php echo $linha['enunc'];?>" type="text" class="textLogin" /></p>
                    
                    <p><label for="alt1">Alternativa 1: *</label>
                    <input name="alt1" id="alt1" value="<?php echo $linha['alt1'];?>" type="text" class="textLogin" /></p>
                    
                     <p><label for="alt2">Alternativa 2: *</label>
                    <input name="alt2" id="alt2" value="<?php echo $linha['alt2'];?>" type="text" class="textLogin" /></p>
                     <p><label for="alt3">Alternativa 3: *</label>
                    <input name="alt3" id="alt3" value="<?php echo $linha['alt3'];?>" type="text" class="textLogin" /></p>
                    <p><label for="alt4">Alternativa 4: *</label>
                    <input name="alt4" id="alt4" value="<?php echo $linha['alt4'];?>" type="text" class="textLogin" /></p>
                    <p><label for="alt5">Alternativa 5: *</label>
                    <input name="alt5" id="alt5" value="<?php echo $linha['alt5'];?>" type="text" class="textLogin" /></p>
                    <p>
                <label for="altCorreta">Alternativa correta: *</label>
                <input type = "radio" name ="altCorreta" value= "1" <?php echo verificaAltCorreta(1, $linha['altcorreta'])?>/>1
                <input type = "radio" name ="altCorreta" value= "2" <?php echo verificaAltCorreta(2, $linha['altcorreta']) ?>/>2
                <input type = "radio" name ="altCorreta" value= "3" <?php echo verificaAltCorreta(3, $linha['altcorreta']) ?>/>3
                <input type = "radio" name ="altCorreta" value= "4" <?php echo verificaAltCorreta(4, $linha['altcorreta']) ?>/>4
                <input type = "radio" name ="altCorreta" value= "5" <?php echo verificaAltCorreta(5, $linha['altcorreta']) ?>/>5
</p>

                    <p><label for="dificuldade">Nível de dificuldade: *</label>
                <input type = "radio" name ="dificuldade" value= "1"  <?php echo verificaDificuldade(1, $linha['dificuldade']) ?>/>1
                <input type = "radio" name ="dificuldade" value= "2" <?php echo verificaDificuldade(2, $linha['dificuldade']) ?>/>2
                 <input type = "radio" name ="dificuldade" value= "3" <?php echo verificaDificuldade(3, $linha['dificuldade']) ?>/>3
                 <input type = "radio" name ="dificuldade" value= "4" <?php echo verificaDificuldade(4, $linha['dificuldade']) ?>/>4
                <input type = "radio" name ="dificuldade" value= "5" <?php echo verificaDificuldade(5, $linha['dificuldade']) ?>/>5
</p>


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
                        <li><a    href="../assunto/filtro.php">ASSUNTOS</a></li>
                        <li><a href="../disciplina/filtro.php">DISCIPLINAS</a></li>
                        <li><a style="background-color:#23193D;color:#FFFFFF" href="filtro.php">QUESTÕES</a></li>
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
