<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once(FACHADAS.'FachadaUsuarioNivelAcesso.php');
require_once(FACHADAS.'FachadaEvento.php');
?>
<form method="post" action="lista_atividade.php">
	<?php 
		$eventos = FachadaEvento::getInstancia()->getListaEventos();
		foreach ($eventos as $evento){
			//print_r($evento);
			//echo $evento[0]." | ".$evento[1]." | ".$evento[2]."<br/>";
			//echo '<input type="radio" name="cod_evento" value="'.$evento[0].'">'.$evento[2].'-'.$evento[1].'<br/>';
		}
	?>
	<input type="submit" value="Inscrever">
</form>
<?php 

?>