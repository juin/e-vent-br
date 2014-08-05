<?php
require_once(PERSISTENCIAS.'PersistenciaAtividade.php');
require_once(CLASSES.'Atividade.php');

class FachadaAtividade extends InstanciaUnica{
	
	public function listarTiposAtividadePorEvento($cod_evento){
		$registros = PersistenciaAtividade::getInstancia()->selecionarTiposAtividadePorEvento($cod_evento);
		if($registros != NULL){
			return $registros;
		} else {
			return NULL;
		}
	}
	
	public function listarAtividadesPorCodigoEvento($cod_evento){
		return PersistenciaAtividade::getInstancia()->selecionarAtividadesPorCodigoEvento($cod_evento);
	}
	
	/*
	 * Lista a agenda dessa atividade
	 * 
	 * */
	public function listarAtividadeAgendaPorCodigoAtividade($cod_atividade){
		$registros = PersistenciaAtividade::getInstancia()->selecionarAtividadeAgendaPorCodigoAtividade($cod_atividade);
		if($registros != NULL){
			return $registros;
		} else {
			return NULL;
		}
	}
	
	public function listarAtividadePorCodigo($cod_atividade){
		$registros = PersistenciaAtividade::getInstancia()->selecionarAtividadesPorCodigo($cod_atividade);
		if($registros != NULL){
			return $registros[0];
		} else {
			return NULL;
		}
	}
	
	public function listarAgendasPorAtividade($cod_atividade){
		$registros = PersistenciaAtividade::getInstancia()->selecionarAgendasPorAtividade($cod_atividade);
		if($registros != NULL){
			return $registros;
		} else {
			return NULL;
		}
	}
	
	public function listarAtividadeAgendaPorEvento($cod_evento){
		return PersistenciaAtividade::getInstancia()->selecionarAtividadeAgendaPorCodigoEvento($cod_evento);
	}
    
	public function listarAgendaPorCodigo($cod_atividade_agenda){
		$registros = PersistenciaAtividade::getInstancia()->selecionarAgendasPorCodigo($cod_atividade_agenda);
		if($registros != NULL){
			return $registros[0];
		} else {
			return NULL;
		}
	}
	
    public function listarVagasDisponiveisPorAtividade($cod_atividade){
        $registros = PersistenciaAtividade::getInstancia()->selecionarVagasDisponiveisPorAtividade($cod_atividade);
        if($registros!=NULL){
            return $registros[0];
        } else { 
            return -1;
        }
    }
    
    public function listarParticipantesPorAtividade($cod_atividade) {
        return PersistenciaAtividade::getInstancia()->selecionarParticipantesPorAtividade($cod_atividade);
    }
    
    public function listarAtividadesMonitoradaPorUsuario($cod_evento, $cod_usuario, $funcao){
        return PersistenciaEvento::getInstancia()->selecionarAtividadesRealizadasPorUsuario($cod_evento, $cod_usuario, $funcao);
    }
}
?>