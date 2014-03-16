<?php
require_once (FACHADAS.'FachadaConectorBD.php');

class PersistenciaEvento extends InstanciaUnica{
	
	public function selecionarListaEventos(){
		$sql = 'Select cod_evento, nome, sigla, data_inicio, status, pagamento from Evento';
		$res = FachadaConectorBD::getInstancia()->consultar($sql);
		return $res;
	}
	
	public function  selecionarListaAtividadePorCodigoEvento($cod_evento){
		$sql = 'Select a.nome, b.cod_atividade_agenda, b.horario_inicio, b.data from Atividade a,
				Atividade_Agenda b where b.cod_atividade = a.cod_atividade AND
				a.cod_evento = '.$cod_evento;
		
		return FachadaConectorBD::getInstancia()->consultar($sql);
	}
	
	public function selecionarEventoPorCodigo($cod_evento){
		$eventos;
		$sql = 'Select * from Evento where cod_evento = '.$cod_evento;
		$res = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($res)){
			foreach ($res as $r){
				$eventos[$i] = new Evento();
				$eventos[$i]->setCodevento($cod_evento);
				$eventos[$i]->setNome($r[1]);
				$eventos[$i]->setSigla($r[2]);
				$eventos[$i]->setDatainicio($r[3]);
				$eventos[$i]->setDatafim($r[4]);
				$eventos[$i]->setDatahorapublicado($r[5]);
				$eventos[$i]->setStatus($r[6]);
				$eventos[$i]->setPagamento($r[7]);
				$eventos[$i]->setUrlatividade($r[8]);
				$eventos[$i]->setUrlevento($r[9]);
				$i++;
			}
		}
		return $eventos;
	}
}

?>