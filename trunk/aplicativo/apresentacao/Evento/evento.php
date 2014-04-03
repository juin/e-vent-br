<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once(APRESENTACAO.'cabecalho.php');
require_once(FACHADAS.'FachadaEvento.php');

$cod_evento = $_GET['cod_evento'];

if($cod_evento!=NULL){
    $evento = FachadaEvento::getInstancia()->selecionaEventoPorCodigo($cod_evento);
    echo $evento->getCodevento() . "<br>";
    echo $evento->getNome() . "<br>";
    echo $evento->getSigla() . "<br>";
    echo "Data de Inicio: " . $evento->getDatainicio() ."<br>";
    echo "Data de Fim: " . $evento->getDataFim() ."<br>";
    echo "<a href=\"".URL."apresentacao/Evento/lista_atividade.php?cod_evento=".$cod_evento."\">INSCREVER</a>";
     echo "<br><br><a href='javascript:history.back(2)'>Clique aqui para voltar</a>";
}else{
    echo "Evento não encontrado.";
    echo "<a href='javascript:history.back(2)'>Clique aqui para voltar</a>";
}
?>