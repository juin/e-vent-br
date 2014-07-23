<?php
require_once (dirname(__FILE__) . '/../../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once (FACHADAS . 'FachadaEvento.php');
require_once (FACHADAS . 'FachadaAtividade.php');

$cod_evento = $_GET['cod_evento'];
echo "Informações do Evento: <br>";
if ($cod_evento != NULL) {
	$evento = FachadaEvento::getInstancia() -> listarEventoPorCodigo($cod_evento);
	echo "Código do evento: " . $evento -> getCodevento() . "<br>";
	echo $evento -> getNome() . "<br>";
	echo $evento -> getSigla() . "<br>";
	echo "Data de Inicio: " . $evento -> getDatainicio() . "<br>";
	echo "Data de Fim: " . $evento -> getDataFim() . "<br>";
	echo "<a href=\"" . URL . "apresentacao/Evento/lista_atividades.php?cod_evento=" . $cod_evento . "\">INSCREVER</a>";
} else {
	echo "Evento não encontrado.";
	echo "<br><br><a href='javascript:history.back(2)'>Clique aqui para voltar</a>";
}

echo "*************<br>";
echo "Atividades<br>";

$atividades = FachadaAtividade::getInstancia() -> listarAtividadesPorCodigoEvento($cod_evento);
if ($atividades != null) {
	foreach ($atividades as $atividade) {
		echo "<li><a href=\"".URL."apresentacao/Evento/gerencia_atividade.php?cod_atividade=".$atividade->getCodAtividade()."\">".$atividade->getNome()."-".$atividade -> getStatus()."</a></li>";
	}
}

echo "<br><br><br><a href='javascript:history.back(2)'>Clique aqui para voltar</a>";
?>

