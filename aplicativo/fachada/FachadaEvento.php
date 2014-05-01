<?php
require_once(PERSISTENCIAS.'PersistenciaEvento.php');
require_once(CLASSES.'Evento.php');

class FachadaEvento extends InstanciaUnica{
	
	public function listarEventos(){
		return PersistenciaEvento::getInstancia()->selecionarEventosPorStatus(EVENTO_STATUS_TODOS);
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
		$registros = PersistenciaEvento::getInstancia()->selecionarAgendasPorAtividade($cod_atividade);
		if($registros != NULL){
			return $registros;
		} else {
			return NULL;
		}
	}
	
	public function listarAtividadeAgendaPorEvento($cod_evento){
		return PersistenciaEvento::getInstancia()->selecionarAtividadeAgendaPorCodigoEvento($cod_evento);
	}
    
	public function listarAgendaPorCodigo($cod_atividade_agenda){
		$registros = PersistenciaEvento::getInstancia()->selecionarAgendasPorCodigo($cod_atividade_agenda);
		if($registros != NULL){
			return $registros[0];
		} else {
			return NULL;
		}
	}
	
    public function listarVagasDisponiveisPorAtividades($cod_atividade_agenda){
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
    
    public function listarInscritosPorCodigoAtividadeAgenda($cod_atividade_agenda){
    	$registros = PersistenciaEvento::getInstancia()->selecionarInscritosPorCodigoAtividadeAgenda($cod_atividade_agenda);
    	$inscritos = null;
    	$i = 0;
    	if (!is_null($registros)){
    		foreach ($registros as $registro){
    			$inscritos[$i] = $registro['nome_certificado'];
    			$i++;
    		}
    	}
    	return $inscritos;
    }
    
    public function listarEventoPorAtividade($cod_atividade){
    	$registros = PersistenciaEvento::getInstancia()->selecionarEventoPorAtividade($cod_atividade);
    	if($registros!=NULL){
    		return $registros[0];
    	} else {
    		return -1;
    	}
    }
}

?>