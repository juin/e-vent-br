<?
require_once(dirname(__FILE__).'/../../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once(FACHADAS.'FachadaUsuarioNivelAcesso.php');
require_once(FACHADAS.'FachadaEvento.php');
?>
<form method="post" action="evento.php">
    <?php 
        $eventos = FachadaEvento::getInstancia()->selecionarListaEventos();
        foreach ($eventos as $evento){
            echo '<input type="radio" name="cod_evento" value="'.$evento[0].'">'.$evento[2].'-'.$evento[1].'<br/>';
        }
    ?>
    <input type="submit" value="Gerenciar">
</form>