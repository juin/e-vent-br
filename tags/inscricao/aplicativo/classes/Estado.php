<?php

class Estado {
	private $cod_estado;
	private $nome;
	
	public function getCodEstado(){
		return $this->cod_estado;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setCodEstado($cod_estado){
		$this->cod_estado = $cod_estado;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
}

?>
