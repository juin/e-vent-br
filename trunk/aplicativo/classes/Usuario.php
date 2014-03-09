<?php

class Usuario extends UsuarioSessao{
	private $sexo, $nasc, $cpf, $rg, $tel1, $tel2, $email, $instituicao, $curso,
			$lattes, $notifica, $status, $dt_cad, $cidade;
	
	public function getSexo(){
		return $this->sexo;
	}
	
	public function getNasc(){
		return $this->nasc;
	}
	
	public function getCpf(){
		return $this->cpf;
	}
	
	public function getRg(){
		return $this->rg;
	}
	
	public function getTel1(){
		return $this->tel1;
	}
	
	public function getTel2(){
		return $this->tel2;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function getInstituicao(){
		return $this->instituicao;
	}
	
	public function getCurso(){
		return $this->curso;
	}
	
	public function getLattes(){
		return $this->lattes;
	}
	
	public function getNotifica(){
		return $this->notifica;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function getDatacad(){
		return $this->dt_cad;
	}
	
	public function getCidade(){
		return $this->cidade;
	}
	
	public function setSexo($sexo){
		$this->sexo = $sexo;
	}
	
	public function setNasc($nasc){
		$this->nasc = $nasc;
	}
	
	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	
	public function setRg($rg){
		$this->rg = $rg;
	}
	
	public function setTel1($tel1){
		$this->tel1 = $tel1;
	}
	
	public function setTel2($tel2){
		$this->tel2 = $tel2;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function setInstituicao($instituicao){
		$this->instituicao = $instituicao;
	}
	
	public function setCurso($curso){
		$this->curso = $curso;
	}
	
	public function setLattes($lattes){
		$this->lattes = $lattes;
	}
	
	public function setNotifica($notifica){
		$this->notifica = $notifica;
	}
	
	public function setStatus($status){
		$this->status = $status;
	}
	
	public function setDatacad($dt_cad){
		$this->dt_cad = $dt_cad;
	}
	
	public function setCidade(){
		$this->cidade = $cidade;
	}
}

?>