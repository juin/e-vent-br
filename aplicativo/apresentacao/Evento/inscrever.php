<?php
	require_once(dirname(__FILE__).'../../../config.php');
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
	$inscricao->setCodUsuario("1");
	
	//$queries[0]
	$nro_inscricao = FachadaInscricao::getInstancia()->realizarInscricao($inscricao);
	$inscricao->setCodInscricao($nro_inscricao);
	echo "<br>";
	//Passo #2 Inscricao nas Atividades
	foreach ($_POST['atv'] as $atv){
		echo FachadaInscricao::getInstancia()->
				realizarInscricaoEmAtividade($inscricao->getCodInscricao(),$atv[0]);
		echo "<br>";
	}
	
	
?>