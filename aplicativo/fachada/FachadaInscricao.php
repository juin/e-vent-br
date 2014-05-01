<?php
require_once(PERSISTENCIAS.'PersistenciaInscricao.php');
require_once(CLASSES.'Inscricao.php');
require_once(CLASSES.'InstanciaUnica.php');


class FachadaInscricao extends InstanciaUnica{
	
	public function listarInscricoesPorUsuario($cod_usuario){
		return PersistenciaInscricao::getInstancia()->selecionarInscricoesPorUsuario($cod_usuario);
	}
	
	public function realizarInscricao(Inscricao $inscricao){
		return PersistenciaInscricao::getInstancia()->realizarInscricao($inscricao);
	}
	
	public function realizarInscricaoEmAtividade($cod_inscricao, $cod_atividade_agenda){
		return PersistenciaInscricao::getInstancia()->
							realizarInscricaoEmAtividade($cod_inscricao, $cod_atividade_agenda);
	}
}

?>