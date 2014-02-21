<?php
require_once('../../fachada/FachadaConectorBD.php');
require_once('../../classes/UsuarioSessao.php');

//Classe que retorna os dados de usuário
class PersistenciaUsuario extends InstanciaUnica{
     
	public function selecionarPorLoginSenha($login,$senha)
	{
		//Transformar array de dados (bidimensional) em array de objetos (unidimensional)
        $sql = "SELECT * FROM Usuario WHERE login='" . $login . "' AND senha='" . $senha . "'";
        
        //Retorna do Banco array com resultados da consulta.
        $resultado = FachadaConectorBD::getInstancia()->consultarBD($sql);
        
        //Necessário inicializar váriaves para evitar "Warnings" do PHP.
        $i = 0;
        $usuarios = NULL;
        
        //Percorre array que retornou do banco de dados e cria um objeto do tipo UsuarioSessao
        while ($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
            $usuario = new UsuarioSessao();
            $usuario->setCod_usuario($linha['cod_usuario']);
            $usuario->setLogin($linha['nome_certificado']);
            
            $usuarios[$i++] = $usuario;
        }
        
        return $usuarios;
	}
}
?>