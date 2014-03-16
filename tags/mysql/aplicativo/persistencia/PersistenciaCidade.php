<?php
require_once(FACHADAS.'FachadaConectorBD.php');

class PersistenciaCidade extends InstanciaUnica{
	
	public function getCidades(){
		
		$sql = "Select * from Cidade";
		
		$cidades = FachadaConectorBD::getInstancia()->consultar($sql);
		
		return $cidades;
	}
	
}
?>