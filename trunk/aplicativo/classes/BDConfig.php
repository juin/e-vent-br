<? 
/**
 * Configurações do Banco de Dados
 */
 
class BDConfig{
    
    //@var string
    private $bd_servidor = '127.0.0.1'; //Endereço do servidor do Banco de Dados
    
    //@var string
    private $bd_usuario = 'root'; //Usuário do Banco de dados
    
    //@var string
    private $bd_senha = 'nano2012'; //Senha do Usuário do Banco de dados
    
    //@var string
    private $bd_nome = 'e_event_br'; //Nome do Banco de dados
    
    public function getBDServidor(){
        return $this->bd_servidor;
    }
    
    public function getBDUsuario(){
        return $this->bd_usuario;
    }
    
    public function getBDSenha(){
        return $this->bd_senha;
    }
    
    public function getBDNome(){
        return $this->bd_nome;
    }
    
    /**
      * Método que conecta no banco de dados
      */
    public function conexao(){
        $conectar = mysql_connect($this->getBDServidor(),$this->getBDUsuario(),$this->getBDSenha())
            or die('Não foi possível conectar: ' . mysql_error());
    }
    
    /**
      * Método que seleciona o banco de dados
      */
    public function selecionaDB(){
        $db = mysql_select_db($this->getBDNome())
            or die('Não foi possível selecionar o Banco de Dados'. mysql_error());
    }
    
    /**
      * Método que executa uma consulta no banco de dados
      */
    public function consultaBD($query){
      $res = mysql_query($query) or die('Não foi possível consultar o Banco de Dados'. mysql_error());
      return $res;
   }
    
}

    $conecta = new BDConfig;
    $q = "SELECT * FROM Usuario";
    $conecta->conexao();
    $conecta->selecionaDB();
    
    echo 'Foram encontrados: ' . mysql_num_rows($conecta->consultaBD($q)) . ' Registros em seu banco de dados';
?>