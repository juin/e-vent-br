<?php
/**
 *  
 * Responsável por retornar os dados do usuário criado na sessão.
 */
require_once(dirname(__FILE__).'/../../config.php');
require_once(FACHADAS.'FachadaUsuario.php');

class FachadaUsuarioNivelAcesso extends FachadaUsuario{

    public function validarNivelAcesso(){
        

    }
    
}

?>