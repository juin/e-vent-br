<?php
/**
 * Inclui a classe UsuarioSessao, 
 * responsável por retornar os dados do usuário criado na sessão.
 */
require_once('../../classes/UsuarioSessao.php');
require_once('../../classes/InstanciaUnica.php');
/**
 * Classe responsável pelas definições do usuário;
 */
class FachadaUsuario extends InstanciaUnica{

    //Função que vai validar se o usuário pode acessar a area restrita ou não.
	public function validarAcesso($login, $senha){
        $usuarios = PersistenciaUsuario::getInstancia()->selecionarPorLoginSenha($login, $senha);
        
        if($usuarios!=NULL){
            return $usuarios[0];        
        } else { return NULL; }
	}

}

?>