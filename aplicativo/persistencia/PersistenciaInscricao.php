<?php
require_once(dirname(__FILE__).'../../config.php');
require_once (FACHADAS.'FachadaConectorBD.php');
require_once (CLASSES.'Inscricao.php');
require_once(CLASSES.'InstanciaUnica.php');

class PersistenciaInscricao extends InstanciaUnica {
    
    //Seleciona todas as inscrições do usuário
    public function selecionarInscricoesPorUsuario($cod_usuario){
        $sql = "Select i.cod_inscricao, e.cod_evento, e.nome, i.data_hora, i.forma_pagamento, i.status " .
        		"From Inscricao i, Evento e Where i.cod_usuario='" . $cod_usuario . "' " .
        				"and e.cod_evento = i.cod_evento Order by i.cod_inscricao Desc";
        // seleciona os 5 ultimos registros de inscricao
        $registros = FachadaConectorBD::getInstancia()->consultarComLimite($sql,5);
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
    
    public function realizaInscricao(Inscricao $inscricao){
    	$sql = "INSERT INTO `inscricao`
    			(`cod_usuario`, `cod_evento`,
    			`data_hora`, `forma_pagamento`, `status`)
    			VALUES
    			(".$inscricao->getCodUsuario().",".$inscricao->getCodEvento().",now(),
    			'".$inscricao->getFormaPagamento()."','".$inscricao->getStatus()."')";
    	return FachadaConectorBD::getInstancia()->inserir($sql);
    }
    
    public function realizaInscricaoEmAtividade($cod_inscricao, $cod_atividade_agenda){
    	$sql = "INSERT INTO `inscricao_historico`
    			(`cod_inscricao`, `cod_atividade_agenda`, `valor_pago`, 
    			`frequente`, `observacao`)
    			VALUES
    			(".$cod_inscricao.",".$cod_atividade_agenda.",
    			0.00,'".INSCRICAO_HISTORICO_FREQUENTE_NAO_LANCADO."','')";
    	return FachadaConectorBD::getInstancia()->inserir($sql);
    }

}
?>