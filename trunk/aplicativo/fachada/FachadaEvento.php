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
	
	public function listarAtividadePorCodigo($cod_atividade_agenda){
		$registros = PersistenciaEvento::getInstancia()->selecionarAtividadesPorCodigo($cod_atividade_agenda);
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
    
    // seleciona usuarios participantes por atividade
    // aplicabilidades:
    // 1. Emissao de listas de presencas
    // 2. Controle de presencas (depois de coletar as presencas, registra-las no sistema)
    public function listarParticipantesPorAtividade($cod_atividade) {
        $registros = PersistenciaEvento::getInstancia()->selecionarParticipantesPorAtividade($cod_atividade);
    }
    
    public function listarAtividadesMonitoradaPorUsuario($cod_evento, $cod_usuario){
        
    }
}

?>