<?php
require_once(CLASSES.'InstanciaUnica.php');
require_once(PERSISTENCIAS.'PersistenciaUsuario.php');

class FachadaUsuario extends InstanciaUnica{

	public function validarAcesso($login, $senha){
        $usuarios = PersistenciaUsuario::getInstancia()->selecionarPorLoginSenha($login, $senha);
        if($usuarios!=NULL){
            return $usuarios[0];
        } else { 
        	return NULL; 
        }
	}
	
	public function listarUsuarioPorCodigo($cod_usuario){
        $usuarios = PersistenciaUsuario::getInstancia()->selecionarPorCodigo($cod_usuario);
        if($usuarios!=NULL){
            return $usuarios[0];
        } else { 
        	return NULL; 
        }
	}
	public function adicionarUsuario($usuario){
		$id = PersistenciaUsuario::getInstancia()->adicionarUsuario($usuario);

		return $id;
	}
	
	public function usuarioEhCoordenador($cod_usuario, $cod_evento){
        $usuarios = PersistenciaUsuario::getInstancia()->selecionarPorEventoFuncao(
        	$cod_usuario, $cod_evento, USUARIO_EVENTO_FUNCAO_COORD);
        if($usuarios != NULL){
            return true;
        } else { 
        	return false; 
        }
	}
	
	public function usuarioEhAuxiliar($cod_usuario, $cod_evento){
        $usuarios = PersistenciaUsuario::getInstancia()->selecionarPorEventoFuncao(
        	$cod_usuario, $cod_evento, USUARIO_EVENTO_FUNCAO_AUX);
        if($usuarios != NULL){
            return true;
        } else { 
        	return false; 
        }
	}
	
	public function usuarioEhAuxiliarOuCoordenador($cod_usuario, $cod_evento){
		$ehaux = FachadaUsuario::getInstancia()->usuarioEhAuxiliar($cod_usuario,$cod_evento);
		$ehcoord = FachadaUsuario::getInstancia()->usuarioEhCoordenador($cod_usuario,$cod_evento);
		return ($ehaux || $ehcoord);
	}
    
    public function usuarioEhMinistrante($cod_usuario, $cod_atividade){
        $usuarios = PersistenciaUsuario::getInstancia()->selecionarPorAtividadeFuncao(
        	$cod_usuario, $cod_atividade, USUARIO_ATIVIDADE_FUNCAO_MINISTRANTE);
        if($usuarios != NULL){
            return true;
        } else { 
        	return false; 
        }
    }
    
    public function usuarioEhMonitor($cod_usuario, $cod_atividade){
        $usuarios = PersistenciaUsuario::getInstancia()->selecionarPorAtividadeFuncao(
        	$cod_usuario, $cod_atividade, USUARIO_ATIVIDADE_FUNCAO_MONITOR);
        if($usuarios != NULL){
            return true;
        } else { 
        	return false; 
        }
    }
    
}

?>