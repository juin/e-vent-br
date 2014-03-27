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
            self::$instancia -> setParametrosAcessoBanco($parametrosBD);
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
        $mysqli = new mysqli($this -> parametros -> getBDServidor(), $this -> parametros -> getBDUsuario(), $this -> parametros -> getBDSenha(), $this -> parametros -> getBDNomeBanco());
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
        $mysqli = $this -> conectarBD();
        $resultado = $mysqli -> query($query);
        $registros = null;
        $i = 0;

        while ($saida = $resultado -> fetch_array(MYSQLI_BOTH)) {
            $registros[$i] = $saida;
            $i++;
        }
        $mysqli -> close();
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

    public function atualizar($query){
        $mysqli = $this->conectarBD();
        $mysqli->query($query);
        $resultado = $mysqli->affected_rows;        
        $mysqli->close();
        return $resultado;   
    }
    
    public function executarTransacao($queries) {

        /* Formato do Array que essa função deve receber. 
         * $sqlCOMMIT = array( "INSERT INTO Cidade VALUES (60,'VITORIAA')",
         *                  "INSERT INTO Cidade VALUES (61,'SALVADOR')",
         *                  "INSERT INTO Cidade VALUES(59, 'SSA')");
         * */

        $mysqli = $this -> conectarBD();
        
        try {
            /* Altera Status do autocommit para FALSE. Na verdade, ele começa a transação. */
            $mysqli -> autocommit(FALSE);
            //Percorre Array com SQL a ser inserido no BD
            foreach ($queries as $sql) {
                $resultado = $mysqli -> query($sql);//Executa SQL
                if ($resultado === false) {//Se houver algum erro, gera excessão e apresenta msg de erro.
                    throw new Exception('SQL Inválido: ' . $sql . ' ERRO: ' . $mysqli->error);
                }
            }
            $mysqli -> commit();
            echo 'Transação completada com sucesso!';

        } catch (Exception $erro) {//Tratamento de excessão, caso haja alguma, realiza rollback.
            echo 'Transação falhou: ' . $erro->getMessage();
            $mysqli->rollback();
        }

        /* Volta status do autocommit */
        $mysqli -> autocommit(TRUE);
        //Fecha conexão.
        $mysqli -> close();

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