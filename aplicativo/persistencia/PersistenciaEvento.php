<?php
require_once(dirname(__FILE__).'/../config.php');
require_once(FACHADAS.'FachadaConectorBD.php');
require_once(CLASSES . 'Atividade.php');
require_once(CLASSES . 'AtividadeAgenda.php');
require_once(CLASSES . 'Usuario.php');
require_once(PERSISTENCIAS . 'PersistenciaLocal.php');

class PersistenciaEvento extends InstanciaUnica{
	
	public function selecionarEventosPorStatus($status){
		$eventos = NULL;	
		$sql = "Select cod_evento, nome, sigla, data_inicio_evento, status, pagamento from Evento WHERE status LIKE '".$status."'";
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$eventos[$i] = new Evento();
				$eventos[$i]->setCodevento($registro["cod_evento"]);
				$eventos[$i]->setNome($registro["nome"]);
				$eventos[$i]->setSigla($registro["sigla"]);
				$eventos[$i]->setDatainicio($registro["data_inicio"]);
				$eventos[$i]->setStatus($registro["status"]);
				$eventos[$i]->setPagamento($registro["pagamento"]);
				$i++;
			}
		}

		return $eventos;
	}
    
	public function selecionarEventosPorCodigo($cod_evento){
		$eventos = NULL;
		$sql = 'Select * from Evento where cod_evento = '.$cod_evento;
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$eventos[$i] = new Evento();
				$eventos[$i]->setCodevento($cod_evento);
				$eventos[$i]->setNome($registro["nome"]);
				$eventos[$i]->setSigla($registro["sigla"]);
				$eventos[$i]->setDatainicio($registro["data_inicio"]);
				$eventos[$i]->setDatafim($registro["data_fim"]);
				$eventos[$i]->setDatahorapublicado($registro["data_hora_publicado"]);
				$eventos[$i]->setStatus($registro["status"]);
				$eventos[$i]->setPagamento($registro["pagamento"]);
				$eventos[$i]->setUrlatividade($registro["url_gabarito_atividade"]);
				$eventos[$i]->setUrlevento($registro["url_gabarito_evento"]);
				$i++;
			}
		}
		return $eventos;
	}
    
    public function selecionarEventoPorAtividade($cod_atividade){
    	$eventos = NULL;
    	$sql = 'Select * from Evento where cod_evento = 
    			(Select cod_evento from Atividade where cod_atividade = '.$cod_atividade.')';
    	$registros = FachadaConectorBD::getInstancia()->consultar($sql);
    	$i = 0;
    	if (!is_null($registros)){
    		foreach ($registros as $registro){
    			$eventos[$i] = new Evento();
    			$eventos[$i]->setCodevento($registro["cod_evento"]);
    			$eventos[$i]->setNome($registro["nome"]);
    			$eventos[$i]->setSigla($registro["sigla"]);
    			$eventos[$i]->setDatainicio($registro["data_inicio"]);
    			$eventos[$i]->setDatafim($registro["data_fim"]);
    			$eventos[$i]->setDatahorapublicado($registro["data_hora_publicado"]);
    			$eventos[$i]->setStatus($registro["status"]);
    			$eventos[$i]->setPagamento($registro["pagamento"]);
    			$eventos[$i]->setUrlatividade($registro["url_gabarito_atividade"]);
    			$eventos[$i]->setUrlevento($registro["url_gabarito_evento"]);
    			$i++;
    		}
    	}
    	return $eventos;
    }
    
    public function gravarEventoNovo(Evento $evento){
    	$sql = "INSERT INTO `Evento` (`nome`, `sigla`,
    			`data_inicio`, `data_fim`,`status`,
    			`pagamento`) VALUES ('".$evento->getNome()."','".$evento->getSigla()."',
    			'".$evento->getDataInicio()."','".$evento->getDataFim()."','".EVENTO_STATUS_ANDAMENTO."',
				'".$evento->getPagamento()."')";
    	return FachadaConectorBD::getInstancia()->inserir($sql);
    }
    
    public function inserirPresencaPorCodigos($cod_atividade_agenda, $cod_usuario, $cod_evento){
    	$sql = "Update Inscricao_Historico set frequente ='Presente' where cod_inscricao = 
    			(Select cod_inscricao from Inscricao where cod_usuario = ".$cod_usuario."
    				AND cod_evento = ".$cod_evento.") AND cod_atividade_agenda = ".$cod_atividade_agenda;
    	return FachadaConectorBD::getInstancia()->atualizar($sql);
    }
}

?>