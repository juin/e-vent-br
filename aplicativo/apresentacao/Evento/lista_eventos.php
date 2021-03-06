<?php

require_once (dirname(__FILE__) . '/../../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once (FACHADAS . 'FachadaEvento.php');
require_once (FACHADAS . 'FachadaUsuario.php');

$eventos = FachadaEvento::getInstancia() -> listarEventos();

foreach ($eventos as $evento) {	
	 $coord_aux = FachadaUsuario::getInstancia()->usuarioEhAuxiliarOuCoordenador($usuarioLogado->getCodUsuario(), $evento->getCodEvento());
	 if ($coord_aux){
	 	echo "<b><a href=\"" . URL . "apresentacao/Evento/gerencia_evento.php?cod_evento=" . $evento->getCodEvento() . "\">".$evento->getNome() ." | ". $evento -> getStatus() . "</a><br/></b>";
	 } else {
	 	echo "<a href=\"" . URL . "apresentacao/Evento/lista_atividades.php?cod_evento=" . $evento->getCodEvento() . "\">".$evento->getNome() ." | ". $evento -> getStatus() . "</a><br/>";
	 }
}
?>