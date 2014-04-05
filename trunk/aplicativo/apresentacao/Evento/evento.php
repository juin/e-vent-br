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
        $atividades = FachadaEvento::getInstancia()->listarAtividadesPorCodigoEvento($cod_evento);
        foreach ($atividades as $atividade){
            echo '<input type="radio" name="cod_evento" value="'.$atividade->getCodAtividadeAgenda().'">'.$atividade->getNome().'-'.$atividade->getStatus().'<br/>';
        }
    ?>
    <input type="submit" value="Gerenciar">
</form>
<?
echo "<br><br><br><a href='javascript:history.back(2)'>Clique aqui para voltar</a>";
?>

