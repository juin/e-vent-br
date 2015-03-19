<?php
require_once(PERSISTENCIAS.'PersistenciaConectorBD.php');
require_once(CLASSES.'Estado');
require_once(CLASSES.'Cidade');

class PersistenciaCidade extends InstanciaUnica{
	
	public function selecionarEstados() {
		$estados = NULL;
		
		$sql = "SELECT e.cod_estado, e.nome" .
				" FROM Estado e" .
				" ORDER BY nome ASC";
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		if (!is_null($registros)) {
			$i = 0;
			foreach ($registros as $registro) {
       			$estados[$i] = new Estado();
       			$estados[$i]->setCodEstado($registro["cod_estado"]);
       			$estados[$i]->setNome($registro["nome"]);
       			
       			$i++;
			}			
		}
		
		return $estados;
	}
	
	public function selecionarCidadesPorEstado($cod_estado){
		$cidades = NULL;
		
		$sql = "SELECT c.cod_cidade, c.nome" .
				" FROM Cidade c" .
				" WHERE c.cod_estado = '" . $cod_estado . "'" .
				" ORDER BY nome ASC";
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		if (!is_null($registros)) {
			$i = 0;
			foreach ($registros as $registro) {
       			$cidades[$i] = new Cidade();
       			$cidades[$i]->setCodCidade($registro["cod_cidade"]);
       			$cidades[$i]->setNome($registro["nome"]);
       			
       			$i++;
			}			
		}
		
		return $cidades;
	}
	
}
?>