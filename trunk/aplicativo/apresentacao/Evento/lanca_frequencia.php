<?php
require_once(dirname(__FILE__).'../../../config.php');
require_once(dirname(__FILE__).'../../../utilidades.php');
require_once (FACHADAS.'FachadaEvento.php');


$cod_atividade_agenda = $_GET['id'];

$inscritos = FachadaEvento::getInstancia()->listarParticipantesPorAtividade($cod_atividade_agenda);

$atividade_agenda = FachadaEvento::getInstancia()->listarAgendaPorCodigo($cod_atividade_agenda);
$cod_atividade = $atividade_agenda->getCodAtividade();
$nome_atividade = FachadaEvento::getInstancia()->listarAtividadePorCodigo($cod_atividade)->getNome();
$nome_evento = FachadaEvento::getInstancia()->listarEventoPorAtividade($cod_atividade)->getNome();
$cod_evento = FachadaEvento::getInstancia()->listarEventoPorAtividade($cod_atividade)->getCodEvento();

echo '<div style="width: 210mm;">';
echo '<div style="text-align: center;">';
echo "<h1>".$nome_evento."</h1>";
echo "<h2>".$nome_atividade." - Frequ�ncia</h2>";
echo "<h3>".arrumaData($atividade_agenda->getData())." | ".
		$atividade_agenda->getHorarioInicio()." - ".$atividade_agenda->getHorarioFim()."</h3>";
echo "</div>";
$i = 1;
echo '<form method="post" action="#">';
echo "<table>";
echo "<tr><th>#</th><th>Nome</th><th>Presente</th></tr>";
foreach($inscritos as $nome){
	echo "<tr><td>".$i."</td><td>".$nome->getNome().'</td>
			 <td><input name="presentes[]" type="checkbox" value="'.$nome->getCodUsuario().'"</td></tr>';
	$i++;
}
echo "</table>";
echo '<input type="submit" value="Lan�ar" name="lancar" />';
echo "</form>";
echo "</div>";

if(isset($_POST['presentes'][0])){
	$presentes = '';
	foreach($_POST['presentes'] as $p){
		FachadaEvento::getInstancia()->lancarPresencaPorCodigos($cod_atividade_agenda, $p, $cod_evento);
	}
}
?>