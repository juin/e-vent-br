<?php
require_once(PERSISTENCIAS.'PersistenciaEvento.php');
require_once(CLASSES.'Evento.php');

class FachadaEvento extends InstanciaUnica{
	
	public function selecionarListaEventos(){
		return PersistenciaEvento::getInstancia()->selecionarListaEventos('%');
	}
	
    public function listarEventosEmAndamento(){
        return PersistenciaEvento::getInstancia()->selecionarListaEventos(EVENTO_STATUS_ANDAMENTO);
    }
    
    public function listarEventosEncerrados(){
        return PersistenciaEvento::getInstancia()->selecionarListaEventos(EVENTO_STATUS_ENCERRADO);
    }
          
	public function selecionarListaAtividadePorCodigoEvento($cod_evento){
		return PersistenciaEvento::getInstancia()->selecionarListaAtividadePorCodigoEvento($cod_evento);
	}
	
	public function selecionaEventoPorCodigo($cod_evento){
		$registros = PersistenciaEvento::getInstancia()->selecionarEventoPorCodigo($cod_evento);
		if($registros!=NULL){
			return $registros[0];
		} else { 
			return NULL;
		}
	}
	
	public function selecionaAtividadePorCodigo($cod_atividade_agenda){
		$registros = PersistenciaEvento::getInstancia()->selecionarAtividadePorCodigo($cod_atividade_agenda);
		if($registros != NULL){
			return $registros[0];
		} else {
			return NULL;
		}
	}
    
    public function selecionarVagasDisponiveisPorAtividades($cod_atividade){
        $registros = PersistenciaEvento::getInstancia()->selecionarVagasDisponiveisPorAtividade($cod_atividade);
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