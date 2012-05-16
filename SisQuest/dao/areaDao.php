<?php

function areaConsulta($link){
	$resultado = mysql_query("SELECT id_area, nome_area from tb_area",$link);
	return $resultado;
}

function areaCadastro($nomeArea,$link,$cadastrante){
	if (!$nomeArea){
	
		echo "Nome da area &eacute; um campo requerido. <br />";
		echo "<meta http-equiv='refresh' content='2;URL=../adm/area/filtro.php'>";
	
	}else{
	
		$sql_nome_check = mysql_query("SELECT COUNT(Id_Area) FROM tb_area WHERE Nome_Area='{$nomeArea}'",$link);
	
		$nReg = mysql_fetch_array($sql_nome_check);
	
		$nome_check = $nReg[0];
	
		if ($nome_check > 0){
			echo "Este nome ( <strong>".$nomeArea."</strong> ) j&aacute; est&aacute; sendo utilizado.<br />Por favor utilize outro nome! <br />";
	
			unset($nomeArea);
	
			echo "<br />";
			echo "<meta http-equiv='refresh' content='2;URL=../adm/area/filtro.php'>";
	
		}else{
			$sql = mysql_query("INSERT INTO tb_area (nome_area,cadastrante)
					VALUES('{$nomeArea}','{$cadastrante}')",$link)
					or die(mysql_error());
	
			echo "<div align='center'><h1>Cadastro realizado com sucesso!</h1></div>";
			echo "<meta http-equiv='refresh' content='2;URL=../adm/area/filtro.php'>";
				
				
	
			if (!$sql){
	
				echo "Ocorreu algum erro, por favor entre em contato com o Webmaster.";
				echo "<meta http-equiv='refresh' content='2;URL=../adm/area/filtro.php'>";
	
			}
	
		}
	
	}
}

?>
