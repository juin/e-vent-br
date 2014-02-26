<?php
/**
 *  
 * Responsável por retornar os dados do usuário criado na sessão.
 */
require_once('FachadaUsuario.php');

class FachadaUsuarioNivelAcesso extends FachadaUsuario{

    public function ValidarNivelAcesso(){
        
        switch ($_SESSION['nivel_acesso']){
            case 'Super':
                return 'Super';
                break;
            case 'Administrador':
                return 'Administrado';
                break;
            case 'Comum':
                return 'Comun';
                break;
            default:
                return 'Comun';
                break;
        
        }
    }
    
}

?>