<?
require_once (dirname(__FILE__) . '/../../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once (FACHADAS . 'FachadaUsuarioNivelAcesso.php');
require_once (FACHADAS . 'FachadaEvento.php');

$eventos = FachadaEvento::getInstancia() -> listarEventos();
echo "<ul>";
foreach ($eventos as $evento) {
	 echo "<li><a href=\"" . URL . "apresentacao/Evento/gerencia_evento.php?cod_evento=" . $evento->getCodEvento() . "\">".$evento->getNome() . $evento -> getStatus() . "</a></li>";
}
echo "</ul>";
?>