<?php
/**
 *  
 * responsável por retornar os dados do usuário criado na sessão.
 */
require_once('../../classes/InstanciaUnica.php');
require_once('../../persistencia/PersistenciaUsuario.php');
/**
 * Classe responsável pelas definições do usuário;
 */
class FachadaUsuario extends InstanciaUnica{

    //Função que vai validar se o usuário pode acessar a area restrita ou não.
	public function validarAcesso($login, $senha){
            
        //Recebe um objeto do tipo UsuarioSessao da PersistenciaUsuario   
        $usuarios = PersistenciaUsuario::getInstancia()->selecionarPorLoginSenha($login, $senha);
        if($usuarios!=NULL){
            //Retorna o objeto encontrado no BD
            return $usuarios[0];
        } else { return NULL; }
	}
	
	public function adicionarUsuario($usuario){
		
		$id = FachadaUsuario::getInstancia()->adicionarUsuario($usuario);

		return $id;
	}
    
}

?>