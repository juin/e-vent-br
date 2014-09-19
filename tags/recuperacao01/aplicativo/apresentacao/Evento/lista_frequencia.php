<?php
	require_once(dirname(__FILE__).'../../../config.php');
	require_once(dirname(__FILE__).'../../../utilidades.php');
	require_once (FACHADAS.'FachadaEvento.php');
	
	
	$cod_atividade_agenda = $_GET['id'];
	
	$inscritos = FachadaEvento::getInstancia()->listarParticipantesPorAtividade($cod_atividade_agenda);
	
	$atividade_agenda = FachadaEvento::getInstancia()->listarAgendaPorCodigo($cod_atividade_agenda);
	$cod_atividade = $atividade_agenda->getCodAtividade();	
	$nome_atividade = FachadaEvento::getInstancia()->listarAtividadePorCodigo($cod_atividade)->getNome();
	$nome_evento = FachadaEvento::getInstancia()->listarEventoPorAtividade($cod_atividade)->getNome();
	
	echo '<div style="width: 210mm;">';
	echo '<div style="text-align: center;">';
		echo "<h1>".$nome_evento."</h1>";
		echo "<h2>".$nome_atividade."</h2>";
		echo "<h3>".arrumaData($atividade_agenda->getData())." | ".
			 arrumaHora($atividade_agenda->getHorarioInicio()).
			 " - ".arrumaHora($atividade_agenda->getHorarioFim())."</h3>";
	echo "</div>";
	$i = 1;
	echo "<table>";
		echo "<tr><th>#</th><th>Nome (RG)</th><th>Assinatura</th></tr>";
	foreach($inscritos as $nome){
		echo "<tr><td>".$i."</td><td>".$nome->getNome()." (".$nome->getRg().")</td>
			 <td> ____________________________________________________________</td></tr>";
		$i++;
	}
	echo "</table>";
	echo "</div>";
?>