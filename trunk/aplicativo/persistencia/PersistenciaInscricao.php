<?php
require_once (FACHADAS.'FachadaConectorBD.php');
require_once (CLASSES.'Inscricao.php');

class PersistenciaInscricao extends InstanciaUnica {
    
    //Seleciona todas as inscrições do usuário
    public function selecionarInscricoesPorUsuario($cod_usuario){
        $sql = "Select i.cod_inscricao, e.cod_evento, e.nome, i.data_hora, i.forma_pagamento, i.status " .
        		"From inscricao i, evento e Where i.cod_usuario='" . $cod_usuario . "' " .
        				"and e.cod_evento = i.cod_evento Order by i.cod_inscricao Desc";
        // seleciona os 5 ultimos registros de inscricao
        $registros = FachadaConectorBD::getInstancia()->consultar($sql, 5);
            
        return $registros;
    }

}
?>