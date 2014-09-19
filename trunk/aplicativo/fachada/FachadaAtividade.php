<?php
require_once(PERSISTENCIAS.'PersistenciaAtividade.php');
require_once(CLASSES.'Atividade.php');

class FachadaAtividade extends InstanciaUnica{
	
	//Método que cria uma nova atividade.
	public function criarAtividade(Atividade $atividade){
		return PersistenciaAtividade::getInstancia()->inserirAtividade($atividade);
	}
	
	public function listarTiposAtividadePorEvento($cod_evento){
		$registros = PersistenciaAtividade::getInstancia()->selecionarTiposAtividadePorEvento($cod_evento);
		if($registros != NULL){
			return $registros;
		} else {
			return NULL;
		}
	}
	
	public function listarAtividadesPorCodigoEvento($cod_evento){
		return PersistenciaAtividade::getInstancia()->selecionarAtividadesPorEvento($cod_evento);
	}
	
	public function listarAtividadeAgendaPorAtividade($cod_atividade){
		return PersistenciaAtividade::getInstancia()->selecionarAtividadeAgendaPorAtividade($cod_atividade);
	}
	
	public function listarAtividadeAgendaPorInscricao($cod_inscricao) {
		return PersistenciaAtividade::getInstancia()->selecionarAtividadeAgendaPorInscricao($cod_inscricao);
	}
	
	public function listarAtividadePorCodigo($cod_atividade){
		return PersistenciaAtividade::getInstancia()->selecionarAtividadesPorCodigo($cod_atividade);
	}
	
	public function listarAgendasPorAtividade($cod_atividade){
		return PersistenciaAtividade::getInstancia()->selecionarAgendasPorAtividade($cod_atividade);
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

	public function alterarAtividade(Atividade $atividade){
		return PersistenciaAtividade::getInstancia()->atualizarAtividade($atividade);
		
	}
}
?>