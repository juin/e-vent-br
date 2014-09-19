<?php
require_once('IFachadaPagamento.php');
require_once(CLASSES.'InstanciaUnica.php');
require_once(PERSISTENCIAS.'PersistenciaPagamento.php');
/*
 * Interface 
 * */
abstract class AFachadaPagamento extends InstanciaUnica implements IFachadaPagamento{
    
    function confirmarPagamentoInscricao($cod_inscricao){
        return PersistenciaPagamento::getInstancia()->confirmarPagamentoInscricao($cod_inscricao);
    }
    
    function cancelarPagamentoInscricao($cod_inscricao){
        return PersistenciaPagamento::getInstancia()->cancelarPagamentoInscricao($cod_inscricao);       
    }
}

?>