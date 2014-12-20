<?
require_once(dirname(__FILE__).'/../../../config.php');

require_once(FACHADAS.'FachadaAtividade.php');
require_once(FACHADAS.'FachadaLocal.php');

$cod_atividade = $_GET['cod_atividade'];
$atividade = FachadaAtividade::getInstancia()->listarAtividadePorCodigo($cod_atividade);
?>
