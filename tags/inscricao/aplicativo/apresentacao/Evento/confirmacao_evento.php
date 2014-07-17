<?php
	require_once(dirname(__FILE__).'/../../config.php');
	require_once (FACHADAS.'FachadaEvento.php');
	
	echo "<h1>Listagem de Atividades Selecionadas</h1>";
	echo "<h3>Evento: ".
		 FachadaEvento::getInstancia()->listarEventoPorCodigo($_POST['cod_evento'])->getNome();
	echo "</h3><br/>";
	echo "<b>Atividades Selecionadas:</b><br>";
	foreach ($_POST['atv'] as $atv){
		echo FachadaEvento::
			 getInstancia()->
			 	listarAtividadePorCodigo
			 	(FachadaEvento::getInstancia()->
			 		listarAgendaPorCodigo($atv[0])->getCodAtividade())->getNome()."<br/>";
	}
?>
<form action="lista_atividades.php" method="get">
	<input type="hidden" value="<?php echo $_POST['cod_evento'];?>" name="cod_evento" />
	<input type="submit" value="Retornar" />
</form>
<form action="efetua_pagamento.php" method="post">
	
	<?php
		$valor_total_inscricao = 0;
		foreach ($_POST['atv'] as $atv){
			echo '<input type="hidden" value="'.$atv[0].'" name="atv[]" />';
			//$valor_total_inscricao = $valor_total_inscricao + 
			//FachadaEvento::getInstancia()->listarAtividadePorCodigo(
				//FachadaEvento::getInstancia()->listarAgendaPorCodigo(
					//$atv[0])->getCodAtividade())->getValor();
		}
	?>
	<input type="hidden" value="<?php echo $_POST['cod_evento'];?>" name="cod_evento" />
	<input type="submit" value="Avancar" />
</form>