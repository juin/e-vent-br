<?php

require_once(dirname(__FILE__).'/../../config.php');
require_once(APRESENTACAO.'cabecalho.php');
require_once(FACHADAS.'FachadaAtividade.php');
require_once(FACHADAS.'FachadaLocal.php');

$cod_atividade = $_GET['cod_atividade'];

if($cod_atividade!=null){
	$atividade = FachadaAtividade::getInstancia()->listarAtividadePorCodigo($cod_atividade);
	echo utf8_encode($atividade->getNome())."<br><br>**********Agenda************<br><br>";
	$agendas = FachadaAtividade::getInstancia()->listarAgendasPorAtividade($cod_atividade);
	if ($agendas!=null) {
		echo "<ul>";
		foreach ($agendas as $agenda) {
			if(!is_null($agenda->getCodLocal())){
				$local = FachadaLocal::getInstancia()->listarLocalPorCodigo($agenda->getCodLocal());
			} else{
				$local = "Não Definido.";
			}
			echo "<li><a href=\"".URL."apresentacao/Evento/gerencia_atividade_agenda.php?cod_atividade_agenda=".$agenda->getCodAtividadeAgenda()."\">".$agenda->getData()."-".$local->getNome()."</a></li>";
		}
		echo "</ul>";
	}
	
} else{
    
    echo "Atividade Não encontrada!";
}
?>