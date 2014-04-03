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
}

?>