<?php
/**
 * Inclui a classe UsuarioSessao, 
 * responsável por retornar os dados do usuário criado na sessão.
 */
require_once('../../classes/UsuarioSessao.php');
require_once('../../classes/InstanciaUnica.php');
require_once('../../persistencia/PersistenciaUsuario.php');
/**
 * Classe responsável pelas definições do usuário;
 */
class FachadaUsuario extends InstanciaUnica{

    //Função que vai validar se o usuário pode acessar a area restrita ou não.
	public function validarAcesso($login, $senha){
        $usuarios = PersistenciaUsuario::getInstancia()->selecionarPorLoginSenha($login, $senha);
        
        if($usuarios!=NULL){
            //Verifica se login e senha digitado é igual aos dados retornados do BD.
            if(($usuarios[0]->getLogin()==$login) && ($usuarios[0]->getSenha()==$senha)){
                return $usuarios[0];    
            } else {return NULL;}
        } else { return NULL; }
	}
}

?>