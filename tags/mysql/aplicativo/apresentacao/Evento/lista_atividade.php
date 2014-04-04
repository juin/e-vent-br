<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once(FACHADAS.'FachadaUsuarioNivelAcesso.php');
require_once(FACHADAS.'FachadaEvento.php');
?>
<h1>Atividades de <?php echo FachadaEvento::getInstancia()->selecionaEventoPorCodigo($_POST['cod_evento'])->getNome();?></h1>
<form method="post" action="lista_atividade.php">
<?php 
	$atividades = FachadaEvento::getInstancia()->selecionarListaAtividadePorCodigoEvento($_POST['cod_evento']);
	foreach ($atividades as $atividade){
		echo '<input type="checkbox" name="atv[]" value="'.$atividade[1].'">'.$atividade[0]." | ".$atividade[2].'<br/>';
	}
?>
<input type="hidden" name="cod_evento" value="<?php $_POST['cod_evento'];?>">
<input type="submit" value="Inscrever">
</form>
<?php 
if (isset($_POST['atv'])){
	echo "<h3>Atividades Selecionadas:</h3>";
	foreach ($_POST['atv'] as $atv){
		echo "Atividade: ".$atv."<br/>";
	}
}
?>