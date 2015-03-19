<?php
require_once(dirname(__FILE__).'/../config.php');
require_once(PERSISTENCIAS.'PersistenciaConectorBD.php');
require_once(CLASSES . 'Atividade.php');
require_once(CLASSES . 'AtividadeAgenda.php');
require_once(CLASSES . 'Usuario.php');
require_once(PERSISTENCIAS . 'PersistenciaLocal.php');

class PersistenciaEvento extends InstanciaUnica{
	
	public function selecionarEventosPorStatus($status){
		$eventos = NULL;
		$sql = "SELECT * FROM Evento WHERE status LIKE '".$status."'";
		$registros = PersistenciaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$eventos[$i] = new Evento();
				$eventos[$i]->setCodEvento($registro["cod_evento"]);
				$eventos[$i]->setNome($registro["nome"]);
				$eventos[$i]->setSigla($registro["sigla"]);
				$eventos[$i]->setDataInicioEvento($registro["data_inicio_evento"]);
				$eventos[$i]->setDataFimEvento($registro["data_fim_evento"]);
				$eventos[$i]->setDataInicioInscricao($registro["data_inicio_inscricao"]);
				$eventos[$i]->setDataFimInscricao($registro["data_fim_inscricao"]);
				$eventos[$i]->setDataHoraPublicado($registro["data_hora_publicado"]);
				$eventos[$i]->setStatus($registro["status"]);
				$eventos[$i]->setPagamento($registro["pagamento"]);
				$eventos[$i]->setUrlGabaritoAtividade($registro["url_gabarito_atividade"]);
				$eventos[$i]->setUrlGabaritoEvento($registro["url_gabarito_evento"]);
				$eventos[$i]->setUrlImagem($registro["url_imagem"]);
				$eventos[$i]->setUrlSite($registro["url_site"]);
				$eventos[$i]->setDiasLimitePagamento($registro["dias_limite_pagamento"]);
				$i++;
			}
		}

		return $eventos;
	}
    
	public function selecionarEventoPorCodigo($cod_evento){
		$eventos = NULL;
		$sql = 'Select * from Evento where cod_evento = '.$cod_evento;
		$registros = PersistenciaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$eventos[$i] = new Evento();
				$eventos[$i]->setCodEvento($cod_evento);
				$eventos[$i]->setNome($registro["nome"]);
				$eventos[$i]->setSigla($registro["sigla"]);
				$eventos[$i]->setDataInicioEvento($registro["data_inicio_evento"]);
				$eventos[$i]->setDataFimEvento($registro["data_fim_evento"]);
				$eventos[$i]->setDataInicioInscricao($registro["data_inicio_inscricao"]);
				$eventos[$i]->setDataFimInscricao($registro["data_fim_inscricao"]);
				$eventos[$i]->setDataHoraPublicado($registro["data_hora_publicado"]);
				$eventos[$i]->setStatus($registro["status"]);
				$eventos[$i]->setPagamento($registro["pagamento"]);
				$eventos[$i]->setUrlGabaritoAtividade($registro["url_gabarito_atividade"]);
				$eventos[$i]->setUrlGabaritoEvento($registro["url_gabarito_evento"]);
				$eventos[$i]->setUrlImagem($registro["url_imagem"]);
				$eventos[$i]->setUrlSite($registro["url_site"]);
				$eventos[$i]->setDiasLimitePagamento($registro["dias_limite_pagamento"]);
				$i++;
			}
		}

		if($eventos!=NULL){
        	return $eventos[0];
        } else { 
            return NULL;
        }
	}
    
    public function selecionarEventoPorAtividade($cod_atividade){
    	$eventos = NULL;
    	$sql = 'Select * from Evento where cod_evento = 
    			(Select cod_evento from Atividade where cod_atividade = '.$cod_atividade.')';
    	$registros = PersistenciaConectorBD::getInstancia()->consultar($sql);
    	$i = 0;
    	if (!is_null($registros)){
    		foreach ($registros as $registro){
    			$eventos[$i] = new Evento();
    			$eventos[$i]->setCodevento($registro["cod_evento"]);
    			$eventos[$i]->setNome($registro["nome"]);
    			$eventos[$i]->setSigla($registro["sigla"]);
    			$eventos[$i]->setDataInicioEvento($registro["data_inicio_evento"]);
    			$eventos[$i]->setDataFimEvento($registro["data_fim_evento"]);
				$eventos[$i]->setDataInicioInscricao($registro["data_inicio_inscricao"]);
				$eventos[$i]->setDataFimInscricao($registro["data_fim_inscricao"]);
    			$eventos[$i]->setDataHoraPublicado($registro["data_hora_publicado"]);
    			$eventos[$i]->setStatus($registro["status"]);
    			$eventos[$i]->setPagamento($registro["pagamento"]);
    			$eventos[$i]->setUrlGabaritoAtividade($registro["url_gabarito_atividade"]);
    			$eventos[$i]->setUrlGabaritoEvento($registro["url_gabarito_evento"]);
				$eventos[$i]->setUrlImagem($registro["url_imagem"]);
				$eventos[$i]->setUrlSite($registro["url_site"]);
				$eventos[$i]->setDiasLimitePagamento($registro["dias_limite_pagamento"]);
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
    	return PersistenciaConectorBD::getInstancia()->inserir($sql);
    }
    
    public function inserirPresencaPorCodigos($cod_atividade_agenda, $cod_usuario, $cod_evento){
    	$sql = "Update Inscricao_Historico set frequente ='Presente' where cod_inscricao = 
    			(Select cod_inscricao from Inscricao where cod_usuario = ".$cod_usuario."
    				AND cod_evento = ".$cod_evento.") AND cod_atividade_agenda = ".$cod_atividade_agenda;
    	return PersistenciaConectorBD::getInstancia()->atualizar($sql);
    }
	
	public function atualizarEvento(Evento $evento){
		$sql = 	"UPDATE Evento". 
				" SET nome='".$evento->getNome()."',".
				" sigla='".$evento->getSigla()."',".
				" data_inicio_evento='".$evento->getDataInicioEvento()."',".
				" data_fim_evento='".$evento->getDataFimEvento()."',".
				" data_inicio_inscricao='".$evento->getDataInicioInscricao()."',".
				" data_fim_inscricao='".$evento->getDataFimInscricao()."',".
				" pagamento='".$evento->getPagamento()."',".
				" url_gabarito_atividade='".$evento->getUrlGabaritoAtividade()."',".
				" url_gabarito_evento='".$evento->getUrlGabaritoEvento()."',".
				" url_imagem='".$evento->getUrlImagem()."',".
				" url_site='".$evento->getUrlSite()."',".
				" dias_limite_pagamento=".$evento->getDiasLimitePagamento().
				" WHERE cod_evento=".$evento->getCodEvento().";";
		$resultado = PersistenciaConectorBD::getInstancia()->atualizar($sql);
		return $resultado;
		
	}
	
}

?>