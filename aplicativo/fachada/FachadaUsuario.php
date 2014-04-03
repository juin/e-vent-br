<?php
/**
 * responsável por retornar os dados do usuário criado na sessão.
 */
require_once(CLASSES.'InstanciaUnica.php');
require_once(PERSISTENCIAS.'PersistenciaUsuario.php');
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
		$id = PersistenciaUsuario::getInstancia()->adicionarUsuario($usuario);

		return $id;
	}
    
    public function listarInscricoes($cod_usuario){
        return PersistenciaUsuario::getInstancia()->selecionarInscricoes($cod_usuario);
    }
    
}

?>