<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once(FACHADAS.'FachadaUsuarioNivelAcesso.php');
require_once(FACHADAS.'FachadaEvento.php');
?>
<h1>Atividades de <?php echo FachadaEvento::getInstancia()->listarEventoPorCodigo($_POST['cod_evento'])->getNome();?></h1>
<form method="post" action="confirma_evento.php">
	<?php 
		$atividades = FachadaEvento::getInstancia()->listarAtividadesPorCodigoEvento($_POST['cod_evento']);
		foreach ($atividades as $atividade){
			echo '<input type="checkbox" name="atv[]" value="'.$atividade->getCodAtividade().'">'.$atividade->getNome()." | ".$atividade->getVagas().'<br/>';
		}
	?>
	<input type="hidden" name="cod_evento" value="<?php echo $_POST['cod_evento'];?>">
	<input type="submit" value="Inscrever">
</form>