<?php
//Classe que retorna os dados de usuário
class PersistenciaUsuario extends InstanciaUnica{
	
	public function selecionarPorLoginSenha()
	{
		//Transformar array de dados (bidimensional) em array de objetos (unidimensional)

        $usuario = new UsuarioSessao();             
        $usuario->setCod_usuario("3");
        $usuario->setLogin("event");
        $usuario->setNome("Junior");
        $usuario->setSenha("123");
        $array = array(0 => $usuario);
        return $array;
	}
	
}
?>