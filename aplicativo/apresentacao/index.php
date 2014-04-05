<?
require_once (dirname(__FILE__) . '/../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once(FACHADAS.'FachadaUsuarioNivelAcesso.php');
require_once(FACHADAS.'FachadaEvento.php');
require_once(FACHADAS.'FachadaInscricao.php');
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
                    echo "<li><a href=\"".URL."apresentacao/Evento/evento.php?cod_evento=".$andamento->getCodEvento() . "\">".$andamento->getNome() ."</a></li>";
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
                    echo "<li>".$andamento->getNome() ."</li>";
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
        $inscricoes = FachadaInscricao::getInstancia() -> listarInscricoesPorUsuario($usuarioLogado -> getCodUsuario());
    ?>
    <ul>
        <?
        if ($inscricoes!=NULL) {
            foreach ($inscricoes as $inscricao) {
                echo "<li>Código Inscrição: " . $inscricao->getCodInscricao() . " Evento: " . $inscricao -> getNomeEvento() . " Status: " . $inscricao->getStatus();
            }
        }
        ?>
</fieldset>
<?
    require_once ('rodape.php');
 ?>
