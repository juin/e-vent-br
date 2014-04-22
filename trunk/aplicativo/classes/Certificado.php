<?php

//Classe Certificado para a emissao de certificados

class Certificado{
	 //@var int
    private $cod_certificado;
	private $cod_inscricao;
	 //@var int
    private $data_hora_salvo;
	 //@var int
    private $data_hora_enviado;
	 //@var int
    private $data_hora_emissao;
    private $cod_validacao;
	
    public function getCodCertificado() {
        return $this->cod_certificado;
    }
	
	public function getCodCertificado() {
        return $this->cod_certificado;
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

    public function setCodCertificado($cod_certificado){
		$this->cod_certificado = $cod_certificado;
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
	
	 public function setCodValidacao($cod_validacao) {
        $this->cod_validacao = $cod_validacao;
    }
	

    

}
