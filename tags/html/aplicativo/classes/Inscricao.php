<?
class Inscricao {

	private $codInscricao = null;
	private $codUsuario = null;
	private $codEvento = null;
	private $dataHoraInscricao = null;
	private $status = null;

	public function getCodInscricao(){
		return $this->codInscricao;
	}

	public function setCodInscricao($codInscricao){
		$this->codInscricao = $codInscricao;
	}

	public function getCodUsuario(){
		return $this->codUsuario;
	}

	public function setCodUsuario($codUsuario){
		$this->codUsuario = $codUsuario;
	}

	public function getCodEvento(){
		return $this->codEvento;
	}

	public function setCodEvento($codEvento){
		$this->codEvento = $codEvento;
	}

	public function getDataHoraInscricao(){
		return $this->dataHoraInscricao;
	}

	public function setDataHoraInscricao($dataHoraInscricao){
		$this->dataHoraInscricao = $dataHoraInscricao;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}
}
?>