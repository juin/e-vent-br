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

	public function listarEventoPorCodigo($cod_evento){
		$registros = PersistenciaEvento::getInstancia()->selecionarEventosPorCodigo($cod_evento);
		if($registros!=NULL){
			return $registros[0];
		} else { 
			return NULL;
		}
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
    
	public function listarInscritosporCodigoEvento($cod_evento){
		
	}
    public function inserirEventoNovo(Evento $evento){
    	return PersistenciaEvento::getInstancia()->gravarEventoNovo($evento);
    }
    
    public function lancarPresencaPorCodigos($cod_atividade_agenda, $cod_usuario, $cod_evento){
    	return PersistenciaEvento::getInstancia()->inserirPresencaPorCodigos($cod_atividade_agenda, $cod_usuario, $cod_evento);
    }

}

?>