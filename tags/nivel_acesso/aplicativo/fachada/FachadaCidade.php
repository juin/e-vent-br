<?php

require_once('../../classes/InstanciaUnica.php');
require_once('../../persistencia/PersistenciaCidade.php');

class FachadaCidade extends InstanciaUnica{abstract 

	public function getCidades(){
		/*if($uf = null){
			$uf = "BA";
		}*/
		$cidades = PersistenciaCidade::getInstancia()->getCidades();
		
		return $cidades;
	}
}