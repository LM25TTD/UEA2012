<?php
$total_paginas= $totalConsulta/$num_por_pagina;

$prev = $pagina - 1;
$next = $pagina + 1;

if ($pagina > 1) {
	$prev_link = "<a href=\"{$_SERVER['PHP_SELF']}?pagina=$prev\">Anterior</a>";
} else { // senão não há link para a página anterior
	$prev_link = "Anterior";
}

if ($total_paginas > $pagina) {
	$next_link = "<a href=\"{$_SERVER['PHP_SELF']}?pagina=$next\">Próxima</a>";
} else {
	$next_link = "Próxima";
}

$total_paginas = ceil($total_paginas);
$painel = "";
for ($x=1; $x<=$total_paginas; $x++) {
	if ($x==$pagina) {

		// se estivermos na página corrente, não exibir o link para visualização desta página
		$painel .= " [$x] ";
	} else {
		$painel .= " <a href=\"{$_SERVER['PHP_SELF']}?pagina=$x\">[$x]</a>";
	}
}
// exibir painel na tela
echo "$prev_link | $painel | $next_link";

?>