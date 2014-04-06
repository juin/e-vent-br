<?php

class AtividadeAgenda {
	private $cod_atividade_agenda;
	private $nome;
	private $data;
	private $horario_inicio;
	private $horario_fim;
	private $status;
	
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
}

?>