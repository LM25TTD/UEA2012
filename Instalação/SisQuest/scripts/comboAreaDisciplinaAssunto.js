jQuery(document).ready
(
	function() 
	{
		comboDinamico("area", "disciplina","assunto");
		
	}
);

comboDinamico = function(area, disciplina,assunto) {
	
	var area   = document.getElementById(area);
	var disciplina = document.getElementById(disciplina);
	var assunto = document.getElementById(assunto);
	
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
		        $(assunto).load('../../servico/assuntoCarregarCombos.php?tipo=assunto&id_disciplina='+$(this).val());
			}
	    	
    });
	
	$(assunto).change(
		    function() {
		    	if($(this).val() == 0) {
			        alert('Você precisa informar o ASSUNTO!');
			        $(this).focus();
				} else {
			        return true;
				}
		    	
	    })

}