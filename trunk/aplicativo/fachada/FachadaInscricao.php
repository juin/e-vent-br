<?php
require_once(PERSISTENCIAS.'PersistenciaInscricao.php');
require_once(CLASSES.'Inscricao.php');
require_once(CLASSES.'InstanciaUnica.php');


class FachadaInscricao extends InstanciaUnica{
	
	public function listarInscricoesPorUsuario($cod_usuario){
		return PersistenciaInscricao::getInstancia()->selecionarInscricoesPorUsuario($cod_usuario);
	}
	
	public function realizaInscricao(Inscricao $inscricao){
		return PersistenciaInscricao::getInstancia()->realizaInscricao($inscricao);
	}
	
	public function realizaInscricaoEmAtividade($cod_inscricao, $cod_atividade_agenda){
		return PersistenciaInscricao::getInstancia()->
							realizaInscricaoEmAtividade($cod_inscricao, $cod_atividade_agenda);
	}
}

?>