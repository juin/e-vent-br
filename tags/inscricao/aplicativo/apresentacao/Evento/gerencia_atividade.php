<?
require_once(dirname(__FILE__).'../../../config.php');
require_once(APRESENTACAO.'cabecalho.php');
require_once(FACHADAS.'FachadaEvento.php');

$cod_atividade = $_GET['cod_atividade'];

if($cod_atividade!=null){
	$atividade = FachadaEvento::getInstancia()->listarAtividadePorCodigo($cod_atividade);
	echo $atividade->getNome()."<br><br>**********Agenda************<br><br>";
	$agendas = FachadaEvento::getInstancia()->listarAgendasPorAtividade($cod_atividade);
	if ($agendas!=null) {
		echo "<ul>";
		foreach ($agendas as $agenda) {
			if(!is_null($agenda->getLocal())){
				$local = $agenda->getLocal()->getNome();
			} else{
				$local = "Não Definido.";
			}
			echo "<li><a href=\"".URL."apresentacao/Evento/gerencia_atividade_agenda.php?cod_atividade_agenda=".$agenda->getCodAtividadeAgenda()."\">".$agenda->getData()."-".$local."</a></li>";
		}
		echo "</ul>";
	}
	
} else{
    
    echo "Atividade Não encontrada!";
}
?>