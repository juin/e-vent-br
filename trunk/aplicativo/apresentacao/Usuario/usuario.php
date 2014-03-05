<?php
require_once('../classes/InstanciaUnica.php');
/**
 * Classe com todas as funções do usuário.
 */
class Usuario extends InstanciaUnica {
	
    public function modulo($modulo=NULL){
        if($modulo==NULL){
            echo "Erro ao carregar o modulo: ".__FUNCTION__;
        } else {
            if (file_exists(MODULO_DIRETORIO."$modulo.php")) {
                require_once("$modulo.php");                
            } else {
                echo "<p>Módulo inexistente.</p>";
            }
        }
    }

    
}


?>