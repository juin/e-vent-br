<?php

class Evento {
	private $cod_evento;
	private $nome;
	private $sigla;
	private $data_inicio;
	private $data_fim;
	private $data_hora_publicado;
	private $status;
	private $pagamento;
	private $url_gabarito_atividade;
	private $url_gabarito_evento;
	
	public function getCodevento(){
		return $this->cod_evento;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function getSigla(){
		return $this->sigla;
	}
	
	public function getDatainicio(){
		return $this->data_inicio;
	}
	
	public function getDatafim(){
		return $this->data_fim;
	}
	
	public function getDatahorapublicado(){
		return $this->data_hora_publicado;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function getPagamento(){
		return $this->pagamento;
	}
	
	public function getUrlatividade(){
		return $this->url_gabarito_atividade;
	}
	
	public function geturlevento(){
		return $this->url_gabarito_evento;
	}
	
	public function setCodevento($cod_evento){
		$this->cod_evento = $cod_evento;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function setSigla($sigla){
		$this->sigla = $sigla;
	}
	
	public function setDatainicio($data_inicio){
		$this->data_inicio = $data_inicio;
	}
	
	public function setDatafim($data_fim){
		$this->data_fim = $data_fim;
	}
	
	public function setDatahorapublicado($data_hora_publicado){
		$this->data_hora_publicado = $data_hora_publicado;
	}
	
	public function setStatus($status){
		$this->status = $status;
	}
	
	public function setPagamento($pagamento){
		$this->pagamento = $pagamento;
	}
	
	public function setUrlatividade($url_atividade){
		$this->url_gabarito_atividade = $url_atividade;
	}
	
	public function setUrlevento($url_evento){
		$this->url_gabarito_evento = $url_evento;
	}
}

?>