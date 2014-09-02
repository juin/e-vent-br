<?php
require_once (CLASSES . 'Usuario.php');
class UsuarioCertificado extends Usuario {
	// Usado para enviar o certificado
	private $url_certificado = null;
	private $nome_evento = null;
	public function getUrlCertificado() {
		return $this->url_certificado;
	}
	public function setUrlCertificado($url_certificado) {
		$this->url_certificado = $url_certificado;
	}
	public function getNomeEvento() {
		return $this->nome_evento;
	}
	public function setNomeEvento($nome_evento) {
		$this->nome_evento = $nome_evento;
	}
}
?>