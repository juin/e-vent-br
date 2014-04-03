<?
require_once (dirname(__FILE__) . '/../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once(FACHADAS.'FachadaUsuarioNivelAcesso.php');
require_once(FACHADAS.'FachadaEvento.php');
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
    <? 
        $eventos_andamento = FachadaEvento::getInstancia()->listarEventosEmAndamento();
    ?>
    <ul>
        <?
            if($eventos_andamento!=NULL){
                foreach ($eventos_andamento as $andamento) {
                    echo "<li><a href=\"".URL."apresentacao/Evento/evento.php?cod_evento=".$andamento['cod_evento'] . "\">".$andamento['nome']."</a></li>";
                }
            }
        ?>
    </ul>
</fieldset>
<fieldset>
    <legend>
        Eventos Encerrados
    </legend>
    <? 
        $eventos_encerrados = FachadaEvento::getInstancia()->listarEventosEncerrados();
    ?>
    <ul>
        <?
            if($eventos_andamento!=NULL){
                foreach ($eventos_encerrados as $andamento) {
                    echo "<li>".$andamento['nome']."</li>";
                }
            }
        ?>
    </ul>
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
