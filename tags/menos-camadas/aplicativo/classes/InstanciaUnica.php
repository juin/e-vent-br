<?php
 /**
 * Instancia Única (Padrão de projeto Singleton)
 * Pode ser utilizado por qualquer classe que não tenha atributos.
 * Formato de utilização: class FachadaTal extends InstanciaUnica
 * Formato de instrução de chamada: FachadaTal::getInstancia()
 */
 
Class InstanciaUnica
{
    
    public static function getInstancia()
    {
        static $instancia = null;
        
        if (!isset($instancia)) {
            $instancia = new static;
        }
        return $instancia;
    }

}

?>