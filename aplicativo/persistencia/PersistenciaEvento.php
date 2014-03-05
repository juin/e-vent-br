<?php
require_once ('../../FachadaConectorBD');

class PersistenciaEvento extends InstanciaUnica{
	
	public function getListaEventos(){
		$sql = 'Select cod_evento, nome, sigla, data_inicio, status, pagamento from Evento';
		
		return FachadaConectorBD::getInstancia()->consultar($sql);
	}
	
	public function  getListaAtividadeEvento($cod_evento){
		$sql = 'Select cod_atividade, nome from Atividade where cod_evento = '.$cod_evento;
		
		return FachadaConectorBD::getInstancia()->consultar($sql);
	}
}

?>