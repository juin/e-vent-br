<?php
require_once(dirname(__FILE__).'../../config.php');
require_once(PERSISTENCIAS.'PersistenciaEvento.php');

class FachadaEvento extends InstanciaUnica{
	
	public function getListaEventos(){
		return PersistenciaEvento::getInstancia()->getListaEventos();
	}
	
	public function getListaAtividadeEvento($cod_evento){
		return PersistenciaEvento::getInstancia()->getListaAtividadeEvento($cod_evento);
	}
	
	public function getNomeEvento($cod_evento){
		$res = PersistenciaEvento::getInstancia()->getNomeEvento($cod_evento);
		if (! is_null($res)){
			$nome = $res[0];
		}
		return $nome;
	}
}

?>