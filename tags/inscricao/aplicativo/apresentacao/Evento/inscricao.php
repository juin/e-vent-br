<?php
	require_once(dirname(__FILE__).'../../../config.php');
	require_once(APRESENTACAO . 'cabecalho.php');
	require_once(CLASSES.'Inscricao.php');
	require_once(FACHADAS.'FachadaInscricao.php');
	require_once(FACHADAS.'FachadaEvento.php');
	
	$vagas = true; 
	$codigos_atividades_agenda = $_POST['atv'];
	// verifica se ainda tem vagas disponiveis
	foreach ($codigos_atividades_agenda as $codigo_atividade_agenda) {
		$disponiveis = FachadaEvento::getInstancia()->listarVagasDisponiveisPorAtividade($codigo_atividade_agenda);
		if ($disponiveis == 0) {
			$vagas = false;
		}
	}
	// realiza a inscricao se ainda houver vagas em todas atividades agendadas
	if ($vagas) {
		$inscricao = new Inscricao();
		$inscricao->setFormaPagamento(INSCRICAO_FORMA_PGTO_VISTA);
		$inscricao->setStatus(INSCRICAO_STATUS_ANDAMENTO);
		$inscricao->setCodEvento($_POST['cod_evento']);
		$inscricao->setCodUsuario($usuarioLogado->getCodUsuario());
		$resultado = FachadaInscricao::getInstancia()->realizarInscricao($inscricao, $codigos_atividades_agenda);
		if ($resultado == 0)
		{
			echo "As vagas nas atividades escolhidas foram reservadas. Você deve confirmar o pagamento para finalizar a sua inscrição!";
			echo "<li><a href=\"" . URL . "apresentacao/index.php\">Retornar para seleção de eventos</a></li>";
		}
	} else {
		// do contrario, informa que existem atividades esgotadas e direciona para a listagem
		// de atividades novamente (ele deverah escolher de novo)
		echo "Pelo menos uma das atividades escolhidas teve suas vagas ESGOTADAS. Por favor, " .
				"retorne à tela de selecão de atividades e tente de novo!";
		echo "<li><a href=\"" . URL . "apresentacao/Evento/lista_atividades.php?cod_evento=" . $_POST['cod_evento'] . "\">Retornar para seleção de atividades</a></li>";
	}
?>