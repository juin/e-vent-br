<?php
require_once(dirname(__FILE__).'/../config.php');
require_once (FACHADAS.'FachadaConectorBD.php');
require_once (CLASSES.'Inscricao.php');
require_once(CLASSES.'InstanciaUnica.php');

class PersistenciaInscricao extends InstanciaUnica {
    
    //Seleciona todas as inscrições do usuário
    public function selecionarInscricoesPorUsuario($cod_usuario){
        $sql = "SELECT i.cod_inscricao, e.cod_evento, e.nome, i.data_hora_inscricao, i.status
        	    FROM Inscricao i, Evento e WHERE i.cod_usuario='" . $cod_usuario . "'
        		AND e.cod_evento = i.cod_evento ORDER BY i.cod_inscricao DESC";
        // seleciona os 5 ultimos registros de inscricao
        $registros = FachadaConectorBD::getInstancia()->consultarComLimite($sql,5);
        $inscricoes = null;
        $i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$inscricoes[$i] = new Inscricao();
				$inscricoes[$i]->setCodInscricao($registro["cod_inscricao"]);
				$inscricoes[$i]->setCodEvento($registro["cod_evento"]);
				$inscricoes[$i]->setDataHoraInscricao($registro["data_hora_inscricao"]);
				$inscricoes[$i]->setStatus($registro["status"]);
				$i++;
			}
		}
        return $inscricoes;
    }
    
    //Selecionar todas as inscrições do evento
    public function selecionarInscricoesPorEvento($cod_evento){
    	$sql = "Select i.cod_inscricao, e.cod_evento, e.nome, i.data_hora, i.forma_pagamento, i.status " .
        		"From Inscricao i, Evento e Where e.cod_evento='" . $cod_evento . "' " .
        				"and e.cod_evento = i.cod_evento Order by i.cod_inscricao Desc";
        $registros = FachadaConectorBD::getInstancia()->consultar($sql);
        $inscricoes = null;
        $i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$inscricoes[$i] = new Inscricao();
				$inscricoes[$i]->setCodInscricao($registro["cod_inscricao"]);
				$inscricoes[$i]->setDataHora($registro["data_hora"]);
				$inscricoes[$i]->setFormaPagamento($registro["forma_pagamento"]);
				$inscricoes[$i]->setStatus($registro["status"]);
				$inscricoes[$i]->setCodEvento($registro["cod_evento"]);
				$inscricoes[$i]->setNomeEvento($registro["nome"]);
				$i++;
			}
		}
        return $inscricoes;
    }
    
    public function realizarInscricao(Inscricao $inscricao, array $codigos_atividades) {
    	$i = 0;
    	// adiciona a rotina de criacao da inscricao
    	$queries[$i] = "INSERT INTO Inscricao
    			(cod_usuario, cod_evento,
    			data_hora_inscricao, status)
    			VALUES
    			(".$inscricao->getCodUsuario().",".$inscricao->getCodEvento().",now(),
    			'".$inscricao->getStatus()."');";
    	// adiciona na mesma colecao de comandos cada insert para cadastro das atividades
    	// o MAX (padrao SQL) seleciona o ultimo codigo inserido para inscricao   	
    	foreach ($codigos_atividades as $codigo_atividade) {
    		
    		$codigos_agenda = FachadaAtividade::getInstancia()->
    		listarAtividadeAgendaPorCodigoAtividade($codigo_atividade);
	     	
			foreach ($codigos_agenda as $codigo_agenda) {
				$i++;
				$queries[$i] = "INSERT INTO Inscricao_Historico
    			(cod_inscricao, cod_atividade_agenda, valor_pago, 
    			frequente, observacao)
    			SELECT MAX(cod_inscricao), ".$codigo_agenda->getCodAtividadeAgenda().", 0.00, '".
    			INSCRICAO_HISTORICO_FREQUENTE_NAO_LANCADO."', NULL FROM Inscricao;";	
			}
		}
		return FachadaConectorBD::getInstancia()->executarTransacao($queries);    	
    }

}
?>