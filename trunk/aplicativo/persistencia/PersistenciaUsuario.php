<?php
//Classe que retorna os dados de usuário
class PersistenciaUsuario{
	
	private $login;
	private $senha;
	
	public function selecionarPorLoginSenha($login,$senha)
	{
		//Transformar array de dados (bidimensional) em array de objetos (unidimensional)

        $usuario = new UsuarioSessao();             
        $usuario->setCod_usuario("3");
        $usuario->setLogin("event");
        $usuario->setNome("Junior");
        $usuario->setSenha("123");
        $array = array("0" => $usuario);
	}
	
}
?>