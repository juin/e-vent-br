<?php
require_once(dirname(__FILE__).'../../../config.php');
require_once(APRESENTACAO.'cabecalho.php');
require_once(FACHADAS.'FachadaAtividade.php');
require_once(FACHADAS.'FachadaLocal.php');

$cod_atividade_agenda = $_GET['cod_atividade_agenda'];
 
if($cod_atividade_agenda!=null){
	
	$agenda = FachadaAtividade::getInstancia()->listarAgendaPorCodigo($cod_atividade_agenda);
	if ($agenda!=null) {
			if(!is_null($agenda->getCodLocal())){
				$local = FachadaLocal::getInstancia()->listarLocalPorCodigo($agenda->getCodLocal());
			} else{
				$local = "Não Definido.";
			}
			echo $agenda->getData()."-".$local->getNome()."<br>";
	} else{
		echo "Não encontrada.";
	}
	
} else{
    echo "Atividade Não encontrada!";
}
?>