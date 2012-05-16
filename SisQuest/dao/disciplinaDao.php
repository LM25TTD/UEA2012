<?php

function disciplinaCadastro ($nomeArea,$nomeDisciplina,$cadastrante){
	
	if (!$nomeArea){
	
		echo "Nome da area &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../adm/disciplina/filtro.php'>";
	
	}else{
	
		if (!$nomeDisciplina){
	
			echo "Nome da disciplina &eacute; um campo requerido. <br />";
			echo "<meta http-equiv='refresh' content='2;URL=../adm/disciplina/filtro.php'>";
	
		}else{
	
			$sql_nome_check = mysql_query("SELECT COUNT(Id_Disciplina) FROM tb_disciplina WHERE Nome_disciplina='{$nomeDisciplina}'");
	
			$nReg = mysql_fetch_array($sql_nome_check);
	
			$nome_check = $nReg[0];
	
			if ($nome_check > 0){
				echo "Este nome ( <strong>".$nomeDisciplina."</strong> ) j&aacute; est&aacute; sendo utilizado.<br />Por favor utilize outro nome! <br />";
	
				unset($nomeArea);
				unset($nome);
	
	
				echo "<br />";
	
				echo "<meta http-equiv='refresh' content='2;URL=../adm/disciplina/filtro.php'>";
	
	
			}else{
				$sql_getIdArea = mysql_query("SELECT Id_Area FROM tb_area WHERE Nome_area='{$nomeArea}' LIMIT 1");
	
				$getIdArea = mysql_fetch_array($sql_getIdArea);
	
				$idArea = $getIdArea[0];
	
				$sql = mysql_query("INSERT INTO tb_disciplina (nome_disciplina, id_area,cadastrante)
						VALUES('{$nomeDisciplina}','{$idArea}','{$cadastrante}')")
						or die(mysql_error());
	
				echo "<div align='center'><h1>Cadastro realizado com sucesso!</h1></div>";
				echo "<meta http-equiv='refresh' content='2;URL=../adm/disciplina/filtro.php'>";
	
	
	
				if (!$sql){
	
					echo "Ocorreu algum erro ao criar sua conta, por favor entre em contato com o Webmaster.";
					echo "<meta http-equiv='refresh' content='2;URL=../adm/disciplina/filtro.php'>";
	
	}
	
	}
	}
	}
}


?>
