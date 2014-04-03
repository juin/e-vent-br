<?php
require_once('AFachadaPagamento.php');
/**
 * 
 */
class FachadaPagamentoAVista extends AFachadaPagamento{
    
    function confirmarPagamentoInscricao($cod_inscricao){
        return parent::confirmarPagamentoInscricao($cod_inscricao);
    }
    
    function cancelarPagamentoInscricao($cod_inscricao){
        return parent::cancelarPagamentoInscricao($cod_inscricao);
    }
    
}
?>