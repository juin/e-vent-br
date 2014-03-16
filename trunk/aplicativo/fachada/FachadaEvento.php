<?php
require_once(PERSISTENCIAS.'PersistenciaEvento.php');
require_once(CLASSES.'Evento.php');

class FachadaEvento extends InstanciaUnica{
	
	public function selecionarListaEventos(){
		return PersistenciaEvento::getInstancia()->selecionarListaEventos();
	}
	
	public function selecionarListaAtividadePorCodigoEvento($cod_evento){
		return PersistenciaEvento::getInstancia()->selecionarListaAtividadePorCodigoEvento($cod_evento);
	}
	
	public function selecionaEventoPorCodigo($cod_evento){
		$eventos = PersistenciaEvento::getInstancia()->selecionarEventoPorCodigo($cod_evento);
		if($eventos!=NULL){
			return $eventos[0];
		} else { 
			return NULL;
		}
	}
}

?>