<?php
/**
 *  
 * responsÃ¡vel por retornar os dados do usuÃ¡rio criado na sessÃ£o.
 */
require_once('../../classes/InstanciaUnica.php');
require_once('../../persistencia/PersistenciaUsuario.php');
/**
 * Classe responsÃ¡vel pelas definiÃ§Ãµes do usuÃ¡rio;
 */
class FachadaUsuario extends InstanciaUnica{

    //FunÃ§Ã£o que vai validar se o usuÃ¡rio pode acessar a area restrita ou nÃ£o.
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