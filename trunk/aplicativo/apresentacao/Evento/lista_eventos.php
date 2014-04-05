<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once(FACHADAS.'FachadaUsuarioNivelAcesso.php');
require_once(FACHADAS.'FachadaEvento.php');
?>
<form method="post" action="lista_atividade.php">
	<?php 
		$eventos = FachadaEvento::getInstancia()->listarEventos();
		foreach ($eventos as $evento){
			echo '<input type="radio" name="cod_evento" value="'.$evento->getCodEvento().'">'.$evento->getSigla().'-'.$evento->getNome().'<br/>';
		}
	?>
	<input type="submit" value="Inscrever">
</form>
<?php 

?>