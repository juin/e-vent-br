<?php
require_once('../../fachada/FachadaConectorBD.php');
require_once('../../classes/UsuarioSessao.php');
require_once('../../classes/InstanciaUnica.php');

//Classe que retorna os dados de usuário
class PersistenciaUsuario extends InstanciaUnica{
    
    //@var string
    private $sql = NULL;
    
    //@var string
    private $temporario = NULL;
     
	public function selecionarPorLoginSenha($login,$senha)
	{
		//Transformar array de dados (bidimensional) em array de objetos (unidimensional)
        $sql = "SELECT * FROM Usuario WHERE login='" . $login . "' AND senha='" . $senha . "'";
             
        return mysql_fetch_array(FachadaConectorBD::getInstancia()->consultarBD($sql)); 
	}
}
?>