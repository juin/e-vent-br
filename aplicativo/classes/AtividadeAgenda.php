<?php

class AtividadeAgenda {
	private $cod_atividade_agenda;
	private $nome;
	private $data;
	private $horario_inicio;
	private $horario_fim;
	private $status;
	private $local;
	private $cod_atividade;
	
	public function getCodAtividadeAgenda(){
		return $this->cod_atividade_agenda;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function getData(){
		return $this->data;
	}
	
	public function getHorarioInicio(){
		return $this->horario_inicio;
	}
	
	public function getHorarioFim(){
		return $this->horario_fim;
	}

	public function getLocal(){
		return $this->local;
	}
	
	public function getCodAtividade(){
		return $this->cod_atividade;
	}
	
	public function setCodAtividadeAgenda($cod_atividade_agenda){
		$this->cod_atividade_agenda = $cod_atividade_agenda;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function setHorarioInicio($horario_inicio){
		$this->horario_inicio = $horario_inicio;
	}
	
	public function setHorarioFim($horario_fim){
		$this->horario_fim = $horario_fim;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function setStatus($status){
		$this->status = $status;
	}
	
	public function setLocal($local){
		$this->local = $local;
	}
	
	public function setCodAtividade($cod_atividade){
		$this->cod_atividade = $cod_atividade;
	}
}

?>