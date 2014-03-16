<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once (FACHADAS.'FachadaConectorBD.php');

class PersistenciaEvento extends InstanciaUnica{
	
	public function getListaEventos(){
		$sql = 'Select cod_evento, nome, sigla, data_inicio, status, pagamento from Evento';
		
		$res = FachadaConectorBD::getInstancia()->consultar($sql);
		
		return $res;
		/*$eventos[0][0] = 0;
		$eventos[1][0] = 1;
		$eventos[2][0] = 2;
		
		$eventos[0][1] = "Evento 1";
		$eventos[1][1] = "Evento 2";
		$eventos[2][1] = "Evento 3";
		
		$eventos[0][2] = "E1";
		$eventos[1][2] = "E2";
		$eventos[2][2] = "E3";
		
		return $eventos;*/
	}
	
	public function  getListaAtividadeEvento($cod_evento){
		$sql = 'Select cod_atividade, nome from Atividade where cod_evento = '.$cod_evento;
		
		return FachadaConectorBD::getInstancia()->consultar($sql);
		/*$atividades[0][0] = 0;
		$atividades[1][0] = 1;
		$atividades[2][0] = 2;
		
		$atividades[0][1] = "Atividade 1";
		$atividades[1][1] = "Atividade 2";
		$atividades[2][1] = "Atividade 3";
		
		
		return $atividades;*/
	}
}

?>