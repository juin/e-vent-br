<?
class Inscricao {

	private $cod_inscricao;
	private $data_hora;
	private $forma_pagamento;
	private $status;
	private $cod_evento;
	private $nome_evento;

	public function setCodInscricao($cod_inscricao) {
		$this -> cod_inscricao = $cod_inscricao;
	}

	public function getCodInscricao() {
		return $this -> cod_inscricao;
	}

	public function setDataHora($data_hora) {
		$this -> data_hora = $data_hora;
	}

	public function getDataHora() {
		return $this -> data_hora;
	}

	public function setFormaPagamento($forma_pagamento) {
		$this -> forma_pagamento = $forma_pagamento;
	}

	public function getFormaPagamento() {
		return $this -> forma_pagamento;
	}

	public function setStatus($status) {
		$this -> status = $status;
	}

	public function getStatus() {
		return $this -> status;
	}

	public function setCodEvento($cod_evento) {
		$this -> cod_evento = $cod_evento;
	}

	public function getCodEvento() {
		return $this -> cod_evento;
	}

	public function setNomeEvento($nome_evento) {
		$this -> nome_evento = $nome_evento;
	}

	public function getNomeEvento() {
		return $this -> nome_evento;
	}

}
?>