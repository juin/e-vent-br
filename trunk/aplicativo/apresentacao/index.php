<?
require_once (dirname(__FILE__) . '/../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
?>
<ul>
    <li>
        Inicio
    </li>
    <li>
        Eventos
    </li>
</ul>
<ul>
    <? menu($usuarioLogado -> getNivelAcesso()); ?>
</ul>
<fieldset>
    <legend>
        Eventos em Andamentos
    </legend>
</fieldset>
<fieldset>
    <legend>
        Eventos Encerrados
    </legend>
</fieldset>
<fieldset>
    <legend>
        Inscrições
    </legend>
    <?
        $inscricoes = FachadaUsuario::getInstancia() -> listarInscricoes($usuarioLogado -> getCodUsuario());
    ?>
    <ul>
        <?
        if ($inscricoes!=NULL) {
            foreach ($inscricoes as $inscricao) {
                $evento = FachadaEvento::getInstancia() -> selecionaEventoPorCodigo($inscricao['cod_evento']);
                echo "<li>Código Inscrição: " . $inscricao['cod_inscricao'] . " Evento: " . $evento -> getNome() . " Status: " . $inscricao['status'];

            }
        }
        ?>
</fieldset>
<?
    require_once ('rodape.php');
 ?>
