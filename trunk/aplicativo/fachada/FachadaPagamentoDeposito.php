<?php
require_once('AFachadaPagamento.php');
/**
 * 
 */
class FachadaPagamentoDeposito extends AFachadaPagamento{
    
    function confirmarPagamentoInscricao($cod_inscricao){
        return parent::confirmarPagamentoInscricao($cod_inscricao);
    }
    
    function cancelarPagamentoInscricao($cod_inscricao){
        
    }
    
}
?>