<? require_once('cabecalho.php'); ?>
    <ul>
        <li>Inicio</li>
        <li>Eventos</li>
        <li>Inscrições</li>
        <li>Certificados</li>
    </ul>
    <ul>
        <?  
                menu($_SESSION['nivel_acesso']);
        ?>
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
