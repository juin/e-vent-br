<?php

require_once(CLASSES.'UsuarioSessao.php');
require_once(CLASSES.'Certificado');
require_once(PERSISTENCIA.'PersitenciaCertificado.php');


class FachadaCertificado extends InstanciaUnica{
	//Busca o código do usurio
	public function getCodigoDaSessao(){
		return 0;
		//return $_SESSION['Usuario']->getCodUsuario();
	}
	//busca o codigo do evento
	public function getCodigoEvento(){
		return 0;
		//return $_SESSION['Evento']->getCodEvento();
	}
	//retorna a inscricao atraves do codigo
	public function getInscricaoPorCodigo(){
		//retorna minha inscrição
	
}
}
