<?
require_once(dirname(__FILE__).'/../../config.php');
require_once(APRESENTACAO.'cabecalho.php');
require_once(FACHADAS.'FachadaEvento.php');

if($_POST['cod_atividade']!=null){
    echo "Atividade encontrada!";
} else{
    
    echo "ERRO!!";
}
?>