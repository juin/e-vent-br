<?php
require_once(CLASSES . 'UsuarioSessao.php');;

class Usuario extends UsuarioSessao{
    private $codUsuario = null;
	private $nomeCertificado = null;
	private $nomeCracha = null;
	private $sexo = null;
	private $dataNascimento = null;
	private $cpf = null;
	private $rg = null;
	private $login = null;
	private $senha = null;
	private $telefone1 = null;
	private $telefone2 = null;
	private $email = null;
	private $campusInstituicao = null;
	private $lattes = null;
	private $categoria = null;
	private $nivelAcesso = null;
	private $notifica = null;
	private $status = null;
	private $dataHoraCadastro = null;
	private $codCidade = null;
	private $codInstituicao = null;
	private $codCurso = null;

	public function getCodUsuario(){
		return $this->codUsuario;
	}

	public function setCodUsuario($codUsuario){
		$this->codUsuario = $codUsuario;
	}

	public function getNomeCertificado(){
		return $this->nomeCertificado;
	}

	public function setNomeCertificado($nomeCertificado){
		$this->nomeCertificado = $nomeCertificado;
	}

	public function getNomeCracha(){
		return $this->nomeCracha;
	}

	public function setNomeCracha($nomeCracha){
		$this->nomeCracha = $nomeCracha;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getDataNascimento(){
		return $this->dataNascimento;
	}

	public function setDataNascimento($dataNascimento){
		$this->dataNascimento = $dataNascimento;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getRg(){
		return $this->rg;
	}

	public function setRg($rg){
		$this->rg = $rg;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getTelefone1(){
		return $this->telefone1;
	}

	public function setTelefone1($telefone1){
		$this->telefone1 = $telefone1;
	}

	public function getTelefone2(){
		return $this->telefone2;
	}

	public function setTelefone2($telefone2){
		$this->telefone2 = $telefone2;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getCampusInstituicao(){
		return $this->campusInstituicao;
	}

	public function setCampusInstituicao($campusInstituicao){
		$this->campusInstituicao = $campusInstituicao;
	}

	public function getLattes(){
		return $this->lattes;
	}

	public function setLattes($lattes){
		$this->lattes = $lattes;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function getNivelAcesso(){
		return $this->nivelAcesso;
	}

	public function setNivelAcesso($nivelAcesso){
		$this->nivelAcesso = $nivelAcesso;
	}

	public function getNotifica(){
		return $this->notifica;
	}

	public function setNotifica($notifica){
		$this->notifica = $notifica;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getDataHoraCadastro(){
		return $this->dataHoraCadastro;
	}

	public function setDataHoraCadastro($dataHoraCadastro){
		$this->dataHoraCadastro = $dataHoraCadastro;
	}

	public function getCodCidade(){
		return $this->codCidade;
	}

	public function setCodCidade($codCidade){
		$this->codCidade = $codCidade;
	}

	public function getCodInstituicao(){
		return $this->codInstituicao;
	}

	public function setCodInstituicao($codInstituicao){
		$this->codInstituicao = $codInstituicao;
	}

	public function getCodCurso(){
		return $this->codCurso;
	}

	public function setCodCurso($codCurso){
		$this->codCurso = $codCurso;
	}
	
}
?>