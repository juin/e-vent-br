<?php
	require_once(dirname(__FILE__).'../../../config.php');
	require_once(APRESENTACAO . 'cabecalho.php');
	require_once(CLASSES.'Inscricao.php');
	require_once(FACHADAS.'FachadaInscricao.php');
	require_once(FACHADAS.'FachadaEvento.php');
	
	//Passo #1 Inscricao Geral
	$inscricao = new Inscricao();
	$inscricao->setFormaPagamento(INSCRICAO_FORMA_PGTO_VISTA);
	$inscricao->setStatus(INSCRICAO_STATUS_ANDAMENTO);
	$inscricao->setCodEvento($_POST['cod_evento']);
	$inscricao->setNomeEvento(
					FachadaEvento::getInstancia()->
					listarEventoPorCodigo($_POST['cod_evento'])->getNome());
	//Pegar Usuario da Sessao
	$inscricao->setCodUsuario($usuarioLogado->getCodUsuario());
	echo FachadaInscricao::getInstancia()->realizarInscricao($inscricao, $_POST['atv']);
?>