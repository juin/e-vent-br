<?php

require_once(CLASSES.'UsuarioSessao.php');
require_once(CLASSES.'Certificado');
require_once(PERSISTENCIA.'PersitenciaCertificado.php');


class FachadaCertificado extends InstanciaUnica{
	
	//Busca o codigo do usurio
	public function getCodigoDaSessao(){
		return 0;
		//return $_SESSION['Usuario']->getCodUsuario();
	}
	
	//busca o codigo do evento
	public function getCodigoEvento(){
		return 0;
		//return $_SESSION['Evento']->getCodEvento();
	}
	

	public function listarPorUsuario($cod_usuario){
		return PersistenciaCertificado::getInstancia()->selecionarPorUsuario;
	}
	
	public function verificarCertificado($cod_validacao){
		$registros=PersistenciaCertificado::getInstancia()->selecionarPorCodigoValidacao;
		if(count($registros)>0){
			return true;
		}else{
			return false;
		}
	}
	public function emitirCertificado($cod_certificado){
		
	}
	public function salvarCertificado($cod_certificado){
		
	}
	public function enviarCertificado($cod_certificado){
		
	}
}
