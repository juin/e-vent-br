<?php
require_once('../../fachada/FachadaUsuarioNivelAcesso.php');
require_once('../../fachada/FachadaEvento.php');

?>
<form method="post" action="lista_atividade.php">
	<?php 
		$eventos = FachadaEvento::getInstancia()->getListaEventos();
		foreach ($eventos as $evento){
			echo '<input type="radio" name="cod_evento" value="'.$evento[0].'">'.$evento[2].'-'.$evento[1];
		}
	?>
	<input type="submit" value="Inscrever">
</form>
<?php 

?>