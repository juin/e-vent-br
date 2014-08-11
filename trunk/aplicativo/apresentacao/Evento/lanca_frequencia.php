<?php
require_once (dirname(__FILE__) . '/../../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once (FACHADAS . 'FachadaEvento.php');
require_once (FACHADAS . 'FachadaAtividade.php');
require_once(UTILIDADES);

$cod_atividade_agenda = $_GET['id'];

$inscritos = FachadaAtividade::getInstancia()->listarParticipantesPorAtividade($cod_atividade_agenda);

$atividade_agenda = FachadaAtividade::getInstancia()->listarAgendaPorCodigo($cod_atividade_agenda);
$cod_atividade = $atividade_agenda->getCodAtividade();
$nome_atividade = FachadaAtividade::getInstancia()->listarAtividadePorCodigo($cod_atividade)->getNome();
$nome_evento = FachadaEvento::getInstancia()->listarEventoPorAtividade($cod_atividade)->getNome();
$cod_evento = FachadaEvento::getInstancia()->listarEventoPorAtividade($cod_atividade)->getCodEvento();
?>

<div class="row">	
		<div class="large-3 medium-3 small-3 columns">
		</div>
			<div class="large-7 medium-7 small-7 columns">		
				<div class="row gerenciamento-usuario-titulo">
					<h2>Lista de Frequência</h2>
				</div>
			</div>
</div>
<div class="row corpo">	
		<? require_once(APRESENTACAO.'menu_esquerdo.php'); ?>
		<br>
		<div class="painel-informacoes">
<?
echo '<div style="width: 210mm;">';
echo '<div style="text-align: center;">';
echo "<h1>".utf8_encode($nome_evento)."</h1>";
echo "<h2>".utf8_encode($nome_atividade)." - Frequência</h2>";
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
echo '<input type="submit" value="Lançar" name="lancar" />';
echo "</form>";
echo "</div>";

if(isset($_POST['presentes'][0])){
	$presentes = '';
	foreach($_POST['presentes'] as $p){
		FachadaEvento::getInstancia()->lancarPresencaPorCodigos($cod_atividade_agenda, $p, $cod_evento);
	}
}
?>
</div>
</div>
<? require_once(APRESENTACAO.'rodape.php');?>