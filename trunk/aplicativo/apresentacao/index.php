<? 
require_once(dirname(__FILE__).'/../config.php');
require_once(APRESENTACAO.'cabecalho.php');
?>
    <ul>
        <li>Inicio</li>
        <li>Eventos</li>
    </ul>
    <ul>
        <? menu($usuarioLogado->getNivelAcesso()); ?>
    </ul>
    <fieldset>
        <legend>Eventos em Andamentos</legend>
    </fieldset>
    <fieldset>
        <legend>Eventos Encerrados</legend>
    </fieldset>
    <fieldset>
        <legend>Inscrições</legend>
    </fieldset>
<? require_once('rodape.php'); ?>
