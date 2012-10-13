jQuery(document).ready
(
	function() 
	{
		comboDinamico("area", "disciplina");
		
	}
);

comboDinamico = function(area, disciplina) {
	
	var area   = document.getElementById(area);
	var disciplina = document.getElementById(disciplina);
	
	$(area).load('../../servico/assuntoCarregarCombos.php?tipo=area');

	$(area).change(
		function() {
			if($(this).val() == 0) {
				alert('Você precisa informar uma ÁREA!');
				$(this).focus();
			} else {
				$(disciplina).load('../../servico/assuntoCarregarCombos.php?tipo=disciplina&idarea='+$(this).val());
			}
		}
	);
	
	$(disciplina).change(
	    function() {
	    	if($(this).val() == 0) {
		        alert('Você precisa informar a DISCIPLINA!');
		        $(this).focus();
			} else {
		        return true;
			}
    });

}