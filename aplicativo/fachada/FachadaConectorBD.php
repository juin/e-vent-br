<? 
require_once('../../classes/ParametrosAcessoBanco.php');
/**
 * Configurações do Banco de Dados
 */
 
class FachadaConectorBD{
    
    //Criar Instância da classe
    private static $instancia = NULL;
    
    //Atributo para guardar os parametros do Banco de Dados
    private $parametros = NULL;
    
    public static function iniciarInstancia($parametrosBD){
        if (!isset(self::$instancia)) {
            $c = __CLASS__;
            self::$instancia = new $c;
            self::$instancia->setParametrosAcessoBanco($parametrosBD);
        }
    }
    
    //O método singleton
    public static function getInstancia()
    {
        return self::$instancia;
    }
    
    /**
     * Set que recebe instancia de ParametrosAcessoBanco
     */
    public function setParametrosAcessoBanco($parametrosBD){
        $this->parametros = $parametrosBD;     
    }
    /**
      * Método que conecta no banco de dados
      */
    public function conectarBD(){
       return mysql_connect($this->parametros->getBDServidor(),$this->parametros->getBDUsuario(),$this->parametros->getBDSenha())
            or die('Não foi possível conectar: ' . mysql_error());
    }
    
    /**
      * Método que seleciona o banco de dados
      */
    public function selecionarBD(){
       return mysql_select_db($this->parametros->getBDNomeBanco())
            or die('Não foi possível selecionar o Banco de Dados'. mysql_error());
    }
    
    /**
      * Método que executa uma consulta no banco de dados
      */
    public function consultarBD($query){
      $this->conectarBD();
      $this->selecionarBD();
      $res = mysql_query($query) or die('Não foi possível consultar o Banco de Dados' . mysql_error());
      mysql_close();
      return $res;
   }
   
   public function inserirBD($query){
   		$this->conectarBD();
   		$this->selecionarBD();
   		$res = mysql_query($query) or die('N�o foi poss�vel inserir no Banco de Dados'.mysql_errno());
   		mysql_close();
   		return $res;
   }
   }
    
}
?>