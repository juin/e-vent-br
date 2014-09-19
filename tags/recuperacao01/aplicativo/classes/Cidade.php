<?php

class Cidade {
	private $cod_cidade;
	private $nome;
	
	public function getCodCidade(){
		return $this->cod_cidade;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setCodCidade($cod_cidade){
		$this->cod_cidade = $cod_cidade;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
}

?>
