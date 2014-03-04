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
		
		$user->cod = $usuario->cod
		$user->nome_cert = $usuario->nome_cert
		$user->sexo = $usuario->sexo
		$user->nasc = $usario->nasc
		$user->cpf = $usuario->cpf
		$user->rg = $usuario->rg
		$user->login = $usuario->login
		$user->senha = $usuario->senha
		$user->tel1 = $usuario->tel1
		$user->tel2 = $usuario->tel2
		$user->email = $usuario->email
		$user->instituicao = $usuario->instituicao
		$user->curso = $usuario->curso
		$user->lattes = $usuario->lattes
		$user->categ = $usuario->categ
		$user->nivel = $usuario->nivel
		$user->notifica = $usuario->notifica
		$user->status = $usuario->status
		$user->dt_cad = $usuario->dt_cad
		$user->cidade = $usuario->cidade
		
		$resultado = FachadaUsuario::getInstancia()->adicionarUsuario($user);

		return $resultado;
	}
    
}

?>