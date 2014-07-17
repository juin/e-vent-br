<?php

class AtividadeAgenda {
		
	private $codAtividadeAgenda = null;
	private $data = null;
	private $horarioInicio = null;
	private $horarioFim = null;
	private $codLocal = null;
	private $codAtividade = null;

	public function getCodAtividadeAgenda(){
		return $this->codAtividadeAgenda;
	}

	public function setCodAtividadeAgenda($codAtividadeAgenda){
		$this->codAtividadeAgenda = $codAtividadeAgenda;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function getHorarioInicio(){
		return $this->horarioInicio;
	}

	public function setHorarioInicio($horarioInicio){
		$this->horarioInicio = $horarioInicio;
	}

	public function getHorarioFim(){
		return $this->horarioFim;
	}

	public function setHorarioFim($horarioFim){
		$this->horarioFim = $horarioFim;
	}

	public function getCodLocal(){
		return $this->codLocal;
	}

	public function setCodLocal($codLocal){
		$this->codLocal = $codLocal;
	}

	public function getCodAtividade(){
		return $this->codAtividade;
	}

	public function setCodAtividade($codAtividade){
		$this->codAtividade = $codAtividade;
	}
}

?>