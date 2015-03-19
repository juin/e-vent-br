<?php
require_once(dirname(__FILE__).'/../config.php');
require_once(PERSISTENCIAS.'PersistenciaConectorBD.php');
require_once (CLASSES.'Inscricao.php');
require_once(CLASSES.'InstanciaUnica.php');

class PersistenciaInscricao extends InstanciaUnica {
    
    //Seleciona todas as inscrições do usuário
    public function selecionarInscricoesPorUsuario($cod_usuario){
        $sql = "SELECT i.cod_inscricao, e.cod_evento, e.nome, i.data_hora_inscricao, i.status
        	    FROM Inscricao i, Evento e WHERE i.cod_usuario='" . $cod_usuario . "'
        		AND e.cod_evento = i.cod_evento ORDER BY i.cod_inscricao DESC";
        // seleciona os 5 ultimos registros de inscricao
        $registros = PersistenciaConectorBD::getInstancia()->consultarComLimite($sql,5);
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

    //Seleciona todas as inscrições do usuário
    public function selecionarUltimaInscricaoValidaPorUsuarioPorEvento($cod_usuario,$cod_evento){
        $sql = "SELECT i.cod_inscricao, e.cod_evento, e.nome, i.data_hora_inscricao, i.status
        	    FROM Inscricao i, Evento e 
        	    WHERE i.cod_usuario=".$cod_usuario."
        		AND i.cod_evento=".$cod_evento."
        		AND i.status!='Cancelada' ORDER BY i.cod_inscricao DESC";
        // seleciona os 5 ultimos registros de inscricao
        $registros = PersistenciaConectorBD::getInstancia()->consultar($sql);
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
    	$sql = "SELECT i.cod_inscricao, i.cod_usuario, i.cod_evento, i.data_hora_inscricao, i.status " .
        		"FROM Inscricao i WHERE i.cod_evento='" . $cod_evento . "' " .
        				"ORDER BY i.cod_inscricao DESC";
        $registros = PersistenciaConectorBD::getInstancia()->consultar($sql);
        $inscricoes = null;
        $i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$inscricoes[$i] = new Inscricao();
				$inscricoes[$i]->setCodInscricao($registro["cod_inscricao"]);
				$inscricoes[$i]->setCodUsuario($registro["cod_usuario"]);
				$inscricoes[$i]->setCodEvento($registro["cod_evento"]);
				$inscricoes[$i]->setDataHoraInscricao($registro["data_hora_inscricao"]);				
				$inscricoes[$i]->setStatus($registro["status"]);
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
    		
    		$codigos_agenda = PersistenciaAtividade::getInstancia()->
    		selecionarAtividadeAgendaPorCodigoAtividadeConfirmada($codigo_atividade);
	     	
			foreach ($codigos_agenda as $codigo_agenda) {
				$i++;
				$queries[$i] = "INSERT INTO Inscricao_Historico
    			(cod_inscricao, cod_atividade_agenda, valor_pago, 
    			frequente, observacao)
    			SELECT MAX(cod_inscricao), ".$codigo_agenda->getCodAtividadeAgenda().", 0.00, '".
    			INSCRICAO_HISTORICO_FREQUENTE_NAO_LANCADO."', NULL FROM Inscricao;";	
			}
		}
		
		return PersistenciaConectorBD::getInstancia()->executarTransacao($queries);    	
    }

    public function atualizarStatusInscricao($cod_inscricao,$status){
    	$sql = "UPDATE Inscricao SET status='".$status."' WHERE cod_inscricao=".$cod_inscricao.";";
		$resultado = PersistenciaConectorBD::getInstancia()->atualizar($sql);
		return $resultado;
    }
}
?>