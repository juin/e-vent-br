<?php
	require_once(dirname(__FILE__).'../../../config.php');
	require_once(APRESENTACAO . 'cabecalho.php');
	require_once(CLASSES.'Inscricao.php');
	require_once(FACHADAS.'FachadaInscricao.php');
	require_once(FACHADAS.'FachadaEvento.php');
	require_once(FACHADAS.'FachadaAtividade.php');
	
	$vagas = true; 
	$codigos_atividades = $_POST['atividades'];
	$cod_evento = $_POST['cod_evento'];
	// verifica se ainda tem vagas disponiveis
	foreach ($codigos_atividades as $codigo_atividade) {
		$disponiveis = FachadaAtividade::getInstancia()->listarVagasDisponiveisPorAtividade($codigo_atividade);
		if ($disponiveis == 0) {
			$vagas = false;
		}
	}
	// realiza a inscricao se ainda houver vagas em todas atividades agendadas
	if ($vagas) {
		$inscricao = new Inscricao();
		$inscricao->setCodUsuario($usuarioLogado->getCodUsuario());
		$inscricao->setCodEvento($cod_evento);
		$inscricao->setStatus(INSCRICAO_STATUS_ANDAMENTO);
		$resultado = FachadaInscricao::getInstancia()->realizarInscricao($inscricao, $codigos_atividades);
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
		echo "<li><a href=\"" . URL . "apresentacao/Evento/lista_atividades.php?cod_evento=" . $cod_evento . "\">Retornar para seleção de atividades</a></li>";
	}
?>