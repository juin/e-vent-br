<?
require_once (CLASSES . 'ParametrosAcessoBanco.php');
/**
 * Configurações do Banco de Dados
 */

class FachadaConectorBD {

    //Criar Instância da classe
    private static $instancia = NULL;

    //Atributo para guardar os parametros do Banco de Dados
    private $parametros = NULL;

    public static function iniciarInstancia($parametrosBD) {
        if (!isset(self::$instancia)) {
            $c = __CLASS__;
            self::$instancia = new $c;
            self::$instancia->setParametrosAcessoBanco($parametrosBD);
        }
    }

    //O método singleton
    public static function getInstancia() {
        return self::$instancia;
    }

    /**
     * Set que recebe instancia de ParametrosAcessoBanco
     */
    public function setParametrosAcessoBanco($parametrosBD) {
        $this -> parametros = $parametrosBD;
    }

    /**
     * Método que conecta e SELECIONA o banco de dados
     */
    public function conectarBD() {
        $mysqli = new mysqli($this->parametros->getBDServidor(),$this->parametros->getBDUsuario(), $this->parametros->getBDSenha(),$this->parametros->getBDNomeBanco());
        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Falha na Conexão: %s\n", mysqli_connect_error());
            exit();
        }
        return $mysqli;
    }

    /**
     * Método que executa uma consulta no banco de dados
     */
    public function consultar($query) {
        $mysqli = $this->conectarBD();
        $res = $mysqli->query($query); 
        $registros = null;
        $i = 0;
        
        
        while ($saida = $res->fetch_array(MYSQLI_NUM)) {
            $registros[$i] = $saida;
            $i++;
        }
        $mysqli->close();
        return $registros;
    }

    public function inserir($query) {
        $this -> conectarBD();
        $this -> selecionarBD();
        mysql_query($query) or die('Não foi possível inserir no Banco de Dados' . mysql_errno());
        $id = $mysql_insert_id;
        mysql_close();
        return $id;
    }

    public function executarTransacao($queries) {
        $mysqli = $this->conectarBD();
        $comit = "";
        $mysqli->autocommit(FALSE);
        
        foreach ($queries as $query) {
            $comit .= $query;
            //$mysqli->query($query);
        }
        $mysqli->multi_query($comit);
        /* commit transaction */
        if (!$mysqli->commit()) {
            print("Transaction commit failed\n");
            exit();
        }
        /* close connection */
        $mysqli->close();
        

    }

}

/**
 * Parametros de Acesso ao banco de dados
 * Cremildo: Verificar melhor forma de refazer esse processo. (Usar Properties)
 */
if (FachadaConectorBD::getInstancia() == NULL) {
    $parametrosBD = new ParametrosAcessoBanco();
    $parametrosBD -> setBDServidor('localhost');
    $parametrosBD -> setBDUsuario('e_vent');
    $parametrosBD -> setBDSenha('3v3nt');
    $parametrosBD -> setBDNomeBanco('e_event_br');
    FachadaConectorBD::iniciarInstancia($parametrosBD);
}
?>