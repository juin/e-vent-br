<?php

class Evento {
	private $codEvento = null;
	private $nome = null;
	private $sigla = null;
	private $dataInicioEvento = null;
	private $dataFimEvento = null;
	private $dataInicioInscricao = null;
	private $dataFimInscricao = null;
	private $dataHoraPublicado = null;
	private $status = null;
	private $pagamento = null;
	private $urlGabaritoAtividade = null;
	private $urlGabaritoEvento = null;
	private $urlGabaritoImagem = null;
	private $urlSite = null;
	private $diasLimitePagamento = null;

	public function getCodEvento(){
		return $this->codEvento;
	}

	public function setCodEvento($codEvento){
		$this->codEvento = $codEvento;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getSigla(){
		return $this->sigla;
	}

	public function setSigla($sigla){
		$this->sigla = $sigla;
	}

	public function getDataInicioEvento(){
		return $this->dataInicioEvento;
	}

	public function setDataInicioEvento($dataInicioEvento){
		$this->dataInicioEvento = $dataInicioEvento;
	}

	public function getDataFimEvento(){
		return $this->dataFimEvento;
	}

	public function setDataFimEvento($dataFimEvento){
		$this->dataFimEvento = $dataFimEvento;
	}
	
	public function getDataInicioInscricao(){
		return $this->dataInicioInscricao;
	}

	public function setDataInicioInscricao($dataInicioInscricao){
		$this->dataInicioInscricao = $dataInicioInscricao;
	}

	public function getDataFimInscricao(){
		return $this->dataFimInscricao;
	}

	public function setDataFimInscricao($dataFimInscricao){
		$this->dataFimInscricao = $dataFimInscricao;
	}

	public function getDataHoraPublicado(){
		return $this->dataHoraPublicado;
	}

	public function setDataHoraPublicado($dataHoraPublicado){
		$this->dataHoraPublicado = $dataHoraPublicado;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getPagamento(){
		return $this->pagamento;
	}

	public function setPagamento($pagamento){
		$this->pagamento = $pagamento;
	}

	public function getUrlGabaritoAtividade(){
		return $this->urlGabaritoAtividade;
	}

	public function setUrlGabaritoAtividade($urlGabaritoAtividade){
		$this->urlGabaritoAtividade = $urlGabaritoAtividade;
	}

	public function getUrlGabaritoEvento(){
		return $this->urlGabaritoEvento;
	}

	public function setUrlGabaritoEvento($urlGabaritoEvento){
		$this->urlGabaritoEvento = $urlGabaritoEvento;
	}

	public function getUrlGabaritoImagem(){
		return $this->urlImagem;
	}

	public function setUrlGabaritoImagem($urlImagem){
		$this->urlImagem = $urlImagem;
	}

	public function getUrlSite(){
		return $this->urlSite;
	}

	public function setUrlSite($urlSite){
		$this->urlSite = $urlSite;
	}

	public function getDiasLimitePagamento(){
		return $this->diasLimitePagamento;
	}

	public function setDiasLimitePagamento($diasLimitePagamento){
		$this->diasLimitePagamento = $diasLimitePagamento;
	}


}

?>