<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once(CLASSES.'InstanciaUnica.php');
require_once(PERSISTENCIAS.'PersistenciaCidade.php');

class FachadaCidade extends InstanciaUnica{ 

	public function getCidades(){
		/*if($uf = null){
			$uf = "BA";
		}*/
		/*$cidades = PersistenciaCidade::getInstancia()->getCidades();*/
		$cidades[0][0] = 0;
		$cidades[1][0] = 1;
		$cidades[2][0] = 2;
		
		$cidades[0][1] = "cidade 1";
		$cidades[1][1] = "cidade 2";
		$cidades[2][1] = "cidade 3";
		
		return $cidades;
	}
}