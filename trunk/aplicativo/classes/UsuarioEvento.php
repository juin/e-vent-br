<?php
require_once (CLASSES.'Usuario.php');
class UsuarioEvento extends Usuario {
		
	
	private $cod_usuario = null;
	
	private $nivel_acesso = null;
	
	private $cod_evento = null;
	
	private $funcao_evento = null;
	
	private $funcao_atividade = null;
	
	
	public function getCodUsuario(){
		return $this->cod_usuario;
	}
	
	public function setCodUsuario($cod_usuario){
		$this->cod_usuario = $cod_usuario;
	}
	
	public function getNivelAcesso(){
		return $this->nivel_acesso;
	}
	
	public function setNivelAcesso($nivel_acesso){
		$this->nivel_acesso = $nivel_acesso;
	}
	
	public function getCodEvento(){
		return $this->cod_evento;
	}
	
	public function setCodEvento($cod_evento){
		$this->cod_evento = $cod_evento;
	}
	
	public function getFuncaoEvento(){
		return $this->funcao_evento;
	}
	
	public function setFuncaoEvento($funcao_evento){
		$this->funcao_evento = $funcao_evento;
	}
	
	public function getFuncaoAtividade(){
		return $this->funcao_atividade;
	}
	
	public function setFuncaoAtividade($funcao_atividade){
		$this->funcao_atividade = $funcao_atividade;
	}
}
?>