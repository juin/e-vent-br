<?php
require_once (FACHADAS.'FachadaConectorBD.php');
require_once (CLASSES.'Inscricao.php');

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

}
?>