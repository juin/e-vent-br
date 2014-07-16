<?php
	require_once(dirname(__FILE__).'/../../config.php');
	require_once(CLASSES.'Certificado.php');
	require_once(FACHADAS.'FachadaCertificado.php');
	
	$certificado = new Certificado();
	
	$certificado->setNomeEvento('Evento Teste');
	$certificado->setNomeAluno('Moara sousa brito');
	$certificado->setNomeAtividade('php-certificado', 0);
	$certificado->setCargaHoraria('14', 0);
	$certificado->setNomeAtividade('sql-certificado', 1);
	$certificado->setCargaHoraria('20', 1);
	
	
	
	FachadaCertificado::getInstancia()->gerarCertificado($certificado);
	
	
?>
