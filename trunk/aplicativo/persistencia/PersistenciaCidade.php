<?php
require_once('../../fachada/FachadaConectorBD.php');

class PersistenciaCidade extends InstanciaUnica{
	
	public function getCidades(){
		
		$sql = "Select * from Cidade";
		
		$cidades = FachadaConectorBD::getInstancia()->consultar($sql);
		
		return $cidades;
	}
	
}
?>