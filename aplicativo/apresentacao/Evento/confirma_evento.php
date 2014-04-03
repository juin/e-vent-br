<?php
	require_once(dirname(__FILE__).'/../../config.php');
	require_once (FACHADAS.'FachadaEvento.php');
	
	echo "<h1>Listagem de Atividades Selecionadas</h1>";
	echo "<h3>Evento: ".
		 FachadaEvento::getInstancia()->selecionaEventoPorCodigo($_POST['cod_evento'])->getNome();
	echo "</h3><br/>";
	foreach ($_POST['atv'] as $atv){
		echo "Atividade : ".FachadaEvento::getInstancia()->selecionaAtividadePorCodigo($atv[0])."<br/>";
	}
?>
