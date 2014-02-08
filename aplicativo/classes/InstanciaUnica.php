<?php
 /**
 * Instancia Única (Padrão de projeto Singleton)
 * Pode ser utilizado por qualquer classe que não tenha atributos.
 * Formato de utilização: class FachadaTal extends InstanciaUnica
 * Formato de instrução de chamada: FachadaTal::getInstancia()
 */
 
Class InstanciaUnica
{
    //Guarda uma instância da classe
    private static $instancia = null;

    public static function getInstancia()
    {

    if (!isset(self::$instancia)) {
            $classe = __CLASS__;
            self::$instancia = new $classe;
        }

        return self::$instancia;
    }

}

?>