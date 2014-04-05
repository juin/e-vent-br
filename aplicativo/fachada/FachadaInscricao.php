<?php
require_once(PERSISTENCIAS.'PersistenciaInscricao.php');

class FachadaInscricao extends InstanciaUnica{
	
	public function listarInscricoesPorUsuario($cod_usuario){
		return PersistenciaInscricao::getInstancia()->selecionarInscricoesPorUsuario($cod_usuario);
	}
	
}

?>