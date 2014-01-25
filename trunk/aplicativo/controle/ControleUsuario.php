<?php
//require_once('../../modelo/ModeloUsuario.php');
require_once('../../classes/UsuarioSessao.php');

/**
 * Controle responsável pelas definições do usuário;
 */
class ControleUsuario{

	public function validarAcesso($login, $senha){
        
        $usuario = new UsuarioSessao();
        
        $usuario->setCod_usuario("3");
        $usuario->setLogin("event");
        $usuario->setNome("Junior");
        $usuario->setSenha("123");
        
        return $usuario;
        
	}

}

?>