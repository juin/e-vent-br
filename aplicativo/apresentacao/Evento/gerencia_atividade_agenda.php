<?
require_once(dirname(__FILE__).'../../../config.php');
require_once(APRESENTACAO.'cabecalho.php');
require_once(FACHADAS.'FachadaEvento.php');

$cod_atividade_agenda = $_GET['cod_atividade_agenda'];
 
if($cod_atividade_agenda!=null){
	
	$agenda = FachadaEvento::getInstancia()->listarAgendaPorCodigo($cod_atividade_agenda);
	if ($agenda!=null) {
			if(!is_null($agenda->getLocal())){
				$local = $agenda->getLocal()->getNome();
			} else{
				$local = "Não Definido.";
			}
			echo $agenda->getData()."-".$local."<br>";
	} else{
		echo "Não encontrada.";
	}
	
} else{
    echo "Atividade Não encontrada!";
}
?>