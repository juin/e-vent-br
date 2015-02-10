<?php
/*
 * Interface 
 * */
interface IPersistenciaPagamento{
    
    function confirmarPagamentoInscricao($cod_inscricao);
    
    function cancelarPagamentoInscricao($cod_inscricao);
}

?>