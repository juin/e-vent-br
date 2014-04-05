<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once(APRESENTACAO.'cabecalho.php');
require_once(FACHADAS.'FachadaEvento.php');

$cod_evento = $_POST['cod_evento'];
echo "Informações do Evento: <br>";
if($cod_evento!=NULL){
    $evento = FachadaEvento::getInstancia()->listarEventoPorCodigo($cod_evento);
    echo "Código do evento: " . $evento->getCodevento() . "<br>";
    echo $evento->getNome() . "<br>";
    echo $evento->getSigla() . "<br>";
    echo "Data de Inicio: " . $evento->getDatainicio() ."<br>";
    echo "Data de Fim: " . $evento->getDataFim() ."<br>";
    echo "<a href=\"".URL."apresentacao/Evento/lista_atividade.php?cod_evento=".$cod_evento."\">INSCREVER</a>";
     echo "<br><br><a href='javascript:history.back(2)'>Clique aqui para voltar</a>";
}else{
    echo "Evento não encontrado.";
    
}

echo "*************<br>";
echo "Atividades<br>";
?>
<form method="post" action="lista_atividade.php">
    <?php 
        $atividade = FachadaEvento::getInstancia()->selecionarAtividadePorCodigoEvento();
        foreach ($eventos as $evento){
            echo '<input type="radio" name="cod_evento" value="'.$evento[0].'">'.$evento[2].'-'.$evento[1].'<br/>';
        }
    ?>
    <input type="submit" value="Inscrever">
</form>
<?
echo "<br><br><br><a href='javascript:history.back(2)'>Clique aqui para voltar</a>";
?>

