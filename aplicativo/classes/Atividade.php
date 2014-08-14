<?php

class Atividade {
		
	private $cod_atividade;
	private $nome;
	private $resumo;
	private $conhecimento_aprendido;
	private $conteudo_programatico;
	private $prerequisito;
	private $publico_alvo;
	private $ferramenta;
	private $carga_horaria;
	private $vagas;
	private $observacao;
	private $tipo_frequencia;
	private $status;
	private $cod_atividade_tipo;
	private $cod_evento;
	
	public function getCodAtividade(){
		return $this->cod_atividade;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function getResumo(){
		return $this->resumo;
	}
	
	public function getConhecimentoAprendido(){
		return $this->conhecimento_aprendido;
	}
	
	public function getConteudoProgramatico(){
		return $this->conteudo_programatico;
	}
	
	public function getPreRequisito(){
		return $this->prerequisito;
	}
	
	public function getPublicoAlvo(){
		return $this->publico_alvo;
	}
	
	public function getFerramenta(){
		return $this->ferramenta;
	}
	
	public function getCargaHoraria(){
		return $this->carga_horaria;
	}
	
	public function getVagas(){
		return $this->vagas;
	}

	public function getObservacao(){
		return $this->observacao;
	}

	public function getTipoFrequencia(){
		return $this->tipo_frequencia;
	}

	public function getStatus(){
		return $this->status;
	}
	
	public function getcodAtividadeTipo(){
		return $this->cod_atividade_tipo;		
	}
	
	public function getCodEvento(){
		return $this->cod_evento;
	}
	
	public function setCodAtividade($cod_atividade) {
		$this->cod_atividade = $cod_atividade;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}

	public function setResumo($resumo){
		$this->resumo = $resumo;
	}
	
	public function setConhecimentoAprendido($conhecimento_aprendido){
		$this->conhecimento_aprendido = $conhecimento_aprendido;
	}

	public function setConteudoProgramatico($conteudo_programatico){
		$this->conteudo_programatico = $conteudo_programatico;
	}
	
	public function setPreRequisito($prerequisito){
		$this->prerequisito = $prerequisito;
	}
	
	public function setPublicoAlvo($publico_alvo){
		$this->publico_alvo = $publico_alvo;
	}
	
	public function setFerramenta($ferramenta){
		$this->ferramenta = $ferramenta;
	}
	
	public function setCargaHoraria($carga_horaria){
		$this->carga_horaria = $carga_horaria;
	}
	
	public function setVagas($vagas){
		$this->vagas = $vagas;
	}
		
	public function setObservacao($observacao){
		$this->observacao = $observacao;
	}
	
	public function setTipoFrequencia($tipo_frequencia){
		$this->tipo_frequencia = $tipo_frequencia;
	}
	
	public function setStatus($status) {
		$this->status = $status;
	}
	
	public function setcodAtividadeTipo($cod_atividade_Tipo){
		$this->cod_atividade_tipo = $cod_atividade_Tipo;		
	}
	
	public function setCodEvento($cod_evento){
		$this->cod_evento = $cod_evento;
	}
	
}

?>