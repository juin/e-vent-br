<?

class AtividadeValor {

	private $cod_atividade;
	private $cod_evento;
	private $valor_estudante;
	private $valor_professor;
	private $valor_profissional_outros;

	public function getCodAtividade() {
		return $this -> cod_atividade;
	}

	public function setCodAtividade($cod_atividade) {
		$this -> cod_atividade = $cod_atividade;
	}

	public function getCodEvento() {
		return $this -> cod_evento;
	}

	public function setCodEvento($cod_evento) {
		$this -> cod_evento = $cod_evento;
	}

	public function getValorEstudante() {
		return $this -> valor_estudante;
	}

	public function setValorEstudante($valor_estudante) {
		$this -> valor_estudante = $valor_estudante;
	}

	public function getValorProfessor() {
		return $this -> valor_professor;
	}

	public function setValorProfessor($valor_professor) {
		$this -> valor_professor = $valor_professor;
	}

	public function getValorProfissionalOutros() {
		return $this -> valor_profissional_outros;
	}

	public function setValorProfissionalOutros($valor_profissional_outros) {
		$this -> valor_profissional_outros = $valor_profissional_outros;
	}
}
