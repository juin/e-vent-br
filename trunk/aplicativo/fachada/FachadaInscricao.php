<?php
require_once(PERSISTENCIAS.'PersistenciaInscricao.php');
require_once(CLASSES.'Inscricao.php');
require_once(CLASSES.'InstanciaUnica.php');

class FachadaInscricao extends InstanciaUnica{
	
	public function listarInscricoesPorUsuario($cod_usuario){
		return PersistenciaInscricao::getInstancia()->selecionarInscricoesPorUsuario($cod_usuario);
	}
	
	public function listarInscricoesPorEvento($cod_evento){
		return PersistenciaInscricao::getInstancia()->selecionarInscricoesPorEvento($cod_evento);
	}
	
	public function realizarInscricao(Inscricao $inscricao, array $cods_atividades_agenda){
		return PersistenciaInscricao::getInstancia()->realizarInscricao($inscricao, 
			$cods_atividades_agenda);
	}
}

?>