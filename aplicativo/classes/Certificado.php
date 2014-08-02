<?php

//Classe Certificado para a emissao de certificados

class Certificado{

    private $cod_certificado;
	private $cod_inscricao;
	private $data_hora_salvo;
    private $data_hora_enviado;
    private $data_hora_emissao;
    private $cod_validacao;
	private $nome_certificado;
	private $nome_atividade;
	private $carga_horaria;
	private $nome_evento;
	private $nome_aluno;
	private $url_certificado;

	
    public function getCodCertificado(){
        return $this->cod_certificado;
    }
	
	public function getUrlCertificado(){
		return $this->url_certificado;
	}
	public function getCodInscricao(){
		return $this->cod_inscricao;
	}
	
	public function getNomeCertificado(){
		return $this->nome_certificado;
	}
	
    public function getData_hora_salvo() {
        return $this->data_hora_salvo;
    }

    public function getData_hora_enviado() {
        return $this->data_hora_enviado;
    }

    public function getData_hora_emissao() {
        return $this->data_hora_emissao;
    }

	 public function getCodValidacao() {
        return $this->cod_validacao;
    }
	 
	 public function getNomeAtividade(){
		return $this->nome_atividade;
	}
	 
	 public function getCargaHoraria(){
		return $this->carga_horaria;
	}
	 
	public function getNomeEvento(){
		return $this->nome_evento;
	}
	
	public function getNomeAluno(){
		return $this->nome_aluno;
	}

    public function setCodCertificado($cod_certificado){
		$this->cod_certificado = $cod_certificado;
	}
	
	public function setUrlCertificado($url_certificado){
		$this->url_certificado=$url_certificado;
	}
	public function setCodInscricao($cod_inscricao){
		$this->cod_inscricao = $cod_inscricao;
	}
	
    public function setData_hora_salvo($data_hora_salvo) {
        $this->data_hora_salvo = $data_hora_salvo;
    }

    public function setData_hora_enviado($data_hora_enviado) {
        $this->data_hora_enviado = $data_hora_enviado;
    }

    public function setData_hora_emissao($data_hora_emissao) {
        $this->data_hora_emissao = $data_hora_emissao;
    }
	
	public function setNomeCertificado($nome_certificado){
		$this->nome_certificado=$nome_certificado;
	}
	
	 public function setCodValidacao($cod_validacao) {
        $this->cod_validacao = $cod_validacao;
    }
	 
	 public function setNomeAtividade($nome_atividade,$indice){
		$this->nome_atividade[$indice] = $nome_atividade;
	}
	 
	 public function setCargaHoraria($carga_horaria, $indice){
		$this->carga_horaria[$indice] = $carga_horaria;
	}
	 
	 public function setNomeEvento($nome_evento){
	 	$this->nome_evento=$nome_evento;
	 }
	 
	 public function setNomeAluno($nome_aluno){
	 	$this->nome_aluno=$nome_aluno;
	 }
	
}