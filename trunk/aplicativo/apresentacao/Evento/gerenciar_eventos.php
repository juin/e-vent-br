<?
require_once(dirname(__FILE__).'/../../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once(FACHADAS.'FachadaUsuarioNivelAcesso.php');
require_once(FACHADAS.'FachadaEvento.php');
?>
<form method="post" action="evento.php">
    <?php 
        $eventos = FachadaEvento::getInstancia()->listarEventos();
        foreach ($eventos as $evento){
            echo '<input type="radio" name="cod_evento" value="'.$evento->getCodEvento().'">'.$evento->getNome().'-'.$evento->getStatus().'<br/>';
        }
    ?>
    <input type="submit" value="Gerenciar">
</form>