<?php
require_once(PERSISTENCIAS.'PersistenciaEvento.php');
require_once(CLASSES.'Evento.php');

class FachadaEvento extends InstanciaUnica{
	
	public function listarEventos(){
		return PersistenciaEvento::getInstancia()->selecionarEventosPorStatus('%');
	}
	
    public function listarEventosEmAndamento(){
        return PersistenciaEvento::getInstancia()->selecionarEventosPorStatus(EVENTO_STATUS_ANDAMENTO);
    }
    
    public function listarEventosEncerrados(){
        return PersistenciaEvento::getInstancia()->selecionarEventosPorStatus(EVENTO_STATUS_ENCERRADO);
    }
          
	public function listarAtividadesPorCodigoEvento($cod_evento){
		return PersistenciaEvento::getInstancia()->selecionarAtividadesPorCodigoEvento($cod_evento);
	}
	
	public function listarEventoPorCodigo($cod_evento){
		$registros = PersistenciaEvento::getInstancia()->selecionarEventosPorCodigo($cod_evento);
		if($registros!=NULL){
			return $registros[0];
		} else { 
			return NULL;
		}
	}
	
	public function listarAtividadePorCodigo($cod_atividade){
		$registros = PersistenciaEvento::getInstancia()->selecionarAtividadesPorCodigo($cod_atividade);
		if($registros != NULL){
			return $registros[0];
		} else {
			return NULL;
		}
	}
	
	public function listarAgendasPorAtividade($cod_atividade){
		$registros = PersistenciaEvento::getInstancia()->selecionarAgendasPorAtivdade($cod_atividade);
		if($registros != NULL){
			return $registros[0];
		} else {
			return NULL;
		}
	}
    
    public function listarVagasDisponiveisPorAtividades($cod_atividade){
        $registros = PersistenciaEvento::getInstancia()->listarVagasDisponiveisPorAtividade($cod_atividade);
        if($registros!=NULL){
            return $registros[0];
        } else { 
            return -1;
        }
    }
    
    public function listarParticipantesPorAtividade($cod_atividade) {
        return PersistenciaEvento::getInstancia()->selecionarParticipantesPorAtividade($cod_atividade);
    }
    
    public function listarAtividadesMonitoradaPorUsuario($cod_evento, $cod_usuario, $funcao){
        return PersistenciaEvento::getInstancia()->selecionarAtividadesRealizadasPorUsuario($cod_evento, $cod_usuario, $funcao);
    }
}

?>