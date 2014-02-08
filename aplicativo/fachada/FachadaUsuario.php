<?php
/**
 * Inclui a classe UsuarioSessao, 
 * responsável por retornar os dados do usuário criado na sessão.
 */
require_once('../../classes/UsuarioSessao.php');

/**
 * Classe responsável pelas definições do usuário;
 */
class FachadaUsuario{

    //Função que vai validar se o usuário pode acessar a area restrita ou não.
	public function validarAcesso($login, $senha){
        $usuario = new UsuarioSessao();
        $usuario->setCod_usuario("3");
        $usuario->setLogin("event");
        $usuario->setNome("Junior");
        $usuario->setSenha("123");
        return $usuario;
	}//Fim da função validarAcesso($login, $senha)

}//Fim da Classe FachadaUsuario

?>