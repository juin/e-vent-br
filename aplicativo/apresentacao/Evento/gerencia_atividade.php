<?
require_once(dirname(__FILE__).'../../../config.php');
require_once(APRESENTACAO.'cabecalho.php');
require_once(FACHADAS.'FachadaEvento.php');

$cod_atividade = $_GET['cod_atividade'];
 
if($cod_atividade!=null){
	$atividade = FachadaEvento::getInstancia()->listarAtividadePorCodigo($cod_atividade);
	echo $atividade->getNome();
} else{
    
    echo "Atividade Não encontrada!";
}
?>