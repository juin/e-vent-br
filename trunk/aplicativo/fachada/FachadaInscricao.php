<?php
require_once(PERSISTENCIAS.'PersistenciaInscricao.php');
require_once(CLASSES.'Inscricao.php');
require_once(CLASSES.'InstanciaUnica.php');

class FachadaInscricao extends InstanciaUnica{
	
	public function listarInscricoesPorUsuario($cod_usuario){
		return PersistenciaInscricao::getInstancia()->selecionarInscricoesPorUsuario($cod_usuario);
	}
	
	public function listarUltimaInscricaoValidaPorUsuarioPorEvento($cod_usuario,$cod_evento){
		return PersistenciaInscricao::getInstancia()->selecionarUltimaInscricaoValidaPorUsuarioPorEvento($cod_usuario,$cod_evento);
	}
	public function listarInscricoesPorEvento($cod_evento){
		return PersistenciaInscricao::getInstancia()->selecionarInscricoesPorEvento($cod_evento);
	}
	
	public function realizarInscricao(Inscricao $inscricao, array $codigos_atividades){
		return PersistenciaInscricao::getInstancia()->realizarInscricao($inscricao, 
			$codigos_atividades);
	}
	
	public function alterarStatusInscricao($cod_inscricao,$status){
		return PersistenciaInscricao::getInstancia()->alterarStatusInscricao($cod_inscricao,$status);
	}
}

?>