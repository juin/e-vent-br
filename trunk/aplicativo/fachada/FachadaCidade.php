<?php
require_once(CLASSES.'InstanciaUnica.php');
require_once(PERSISTENCIAS.'PersistenciaCidade.php');

class FachadaCidade extends InstanciaUnica{ 

	public function listaEstados() {
		return PersistenciaCidade::getInstancia()->selecionarEstados();
	}

	public function listarCidadesPorEstado($cod_estado){
		return PersistenciaCidade::getInstancia()->selecionarCidadesPorEstado($cod_estado);
	}
	
}