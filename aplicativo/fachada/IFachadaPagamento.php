<?php
/*
 * Interface 
 * */
interface IFachadaPagamento{
    
    function confirmarPagamentoInscricao($cod_inscricao);
    
    function cancelarPagamentoInscricao($cod_inscricao);
}

?>