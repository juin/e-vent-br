<?
require_once (CLASSES.'ParametrosAcessoBanco.php');
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
        $mysqli = new mysqli($this->parametros->getBDServidor(), $this->parametros->getBDUsuario(), $this->parametros->getBDSenha(), $this->parametros->getBDNomeBanco());
        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Falha na Conexão: %s\n", mysqli_connect_error());
            exit();
        }
        return $mysqli;
    }

    public function consultar($query) {
        $mysqli = $this -> conectarBD();
        $resultado = $mysqli -> query($query);
		if($mysqli->errno!=0)
			printf("Codigo de erro: %d\n", $mysqli->errno);
		
        $registros = null;
        $i = 0;

        while ($saida = $resultado -> fetch_array(MYSQLI_BOTH)) {
            $registros[$i] = $saida;
            $i++;
        }
		
        $mysqli -> close();
        return $registros;
    }

    public function consultarComLimite($query, $limite) {
    	return FachadaConectorBD::getInstancia()->consultar($query . " LIMIT " . $limite);
    }

    public function inserir($query) {
        $mysqli = $this->conectarBD();
        $res = $mysqli->query($query);
		 
        $id = $mysqli->insert_id;
		echo $id;
		if($mysqli->errno!=0)
			printf("Codigo de erro: %d\n", $mysqli->errno);
        $mysqli->close();
        return $id;
    }

    public function atualizar($query){
        $mysqli = $this->conectarBD();
        $mysqli->query($query);
        $resultado = $mysqli->affected_rows;        
        $mysqli->close();
        return $resultado;   
    }
    
    public function executarTransacao(array $queries) {
    	$resultado = -1;
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
            $resultado = 0;
        } catch (Exception $erro) {//Tratamento de excessão, caso haja alguma, realiza rollback.
            $mysqli->rollback();
            $resultado = $erro->getCode();
        }
        $mysqli -> autocommit(TRUE);
        $mysqli -> close();

        return $resultado;
    }
}

/**
 * Parametros de Acesso ao banco de dados
 * Cremildo: Verificar melhor forma de refazer esse processo. (Usar Properties)
 */
if (FachadaConectorBD::getInstancia() == NULL) {
    $parametrosBD = new ParametrosAcessoBanco();
    $parametrosBD->setBDServidor(ACESSO_SERVIDOR);
    $parametrosBD->setBDUsuario(ACESSO_USUARIO);
    $parametrosBD->setBDSenha(ACESSO_SENHA);
    $parametrosBD->setBDNomeBanco(ACESSO_NOME_BANCO);
    FachadaConectorBD::iniciarInstancia($parametrosBD);
}
?>