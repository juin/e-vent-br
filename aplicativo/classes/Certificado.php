<?php

class Certificado{
    private $codigo;
    private $usuario;
    private $data_hora_salvo;
    private $data_hora_enviado;
    private $data_hora_emissao;
    private $evento;
    private $url;
    private $atividades;
    
    function __construct($codigo, $usuario, $data_hora_salvo, $data_hora_enviado, $data_hora_emissao, $evento, $url, $atividades) {
        $this->codigo = $codigo;
        $this->usuario = $usuario;
        $this->data_hora_salvo = $data_hora_salvo;
        $this->data_hora_enviado = $data_hora_enviado;
        $this->data_hora_emissao = $data_hora_emissao;
        $this->evento = $evento;
        $this->url = $url;
        $this->atividades = $atividades;
    }
    
 
    public function getCodigo() {
        return $this->codigo;
    }

    public function getUsuario() {
        return $this->usuario;
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

    public function getEvento() {
        return $this->evento;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getAtividades() {
        return $this->atividades;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
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

    public function setEvento($evento) {
        $this->evento = $evento;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function setAtividades($atividades) {
        $this->atividades = $atividades;
    }



}
