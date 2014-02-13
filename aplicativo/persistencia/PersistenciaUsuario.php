<?php
require_once('../../fachada/FachadaConectorBD.php');
//Classe que retorna os dados de usuário
class PersistenciaUsuario extends InstanciaUnica{
    
	public function selecionarPorLoginSenha($login,$senha)
	{
		//Transformar array de dados (bidimensional) em array de objetos (unidimensional)
        $sql = "SELECT * FROM Usuario WHERE login='" . $login . "' AND senha='" . $senha . "'";
        return FachadaConectorBD::getInstancia()->consultarBD($sql);
	}
}
?>