<?php
require_once('../../fachada/FachadaConectorBD.php');
require_once('../../classes/UsuarioSessao.php');

//
//Classe que retorna os dados de usuário
class PersistenciaUsuario extends InstanciaUnica{
     
	public function selecionarPorLoginSenha($login,$senha)
	{
		//Transformar array de dados (bidimensional) em array de objetos (unidimensional)
        $sql = "SELECT * FROM Usuario WHERE login='" . $login . "' AND senha='" . $senha . "'";
        
        //Retorna do Banco array com resultados da consulta.
        $resultado = FachadaConectorBD::getInstancia()->consultar($sql);
        
        //Necessário inicializar váriaves para evitar "Warnings" do PHP.
        $i = 0;
        $usuarios = NULL;
        
        //Percorre array que retornou do banco de dados e cria um objeto do tipo UsuarioSessao
        while ($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
            $usuario = new UsuarioSessao();
            $usuario->setCodUsuario($linha['cod_usuario']);
            $usuario->setLogin($linha['login']);
            $usuario->setNivelAcesso($linha['nivel_acesso']);
            $usuario->setCategoria($linha['categoria']);
            
            $usuarios[$i++] = $usuario;
        }
        
        return $usuarios;
	}
	
	public function adicionarUsuario($usuario){

		$sql = "Insert into Usuario values ($usuario->cod,'$usuario->nome','$usuario->sexo',$usario->nasc,
				'$usuario->cpf','$usuario->rg','$usuario->login','$usuario->senha','$usuario->tel1','$usuario->tel2',
				'$usuario->email','$usuario->instituicao','$usuario->curso','$usuario->lattes','$usuario->categoria',
				'$usuario->nivel_acesso','$usuario->notifica','$usuario->status',$usuario->dt_cad,$usuario->cidade)";
		
		$id = FachadaConectorBD::getInstancia()->inserir($sql);
				
		return $id;
	}
}
?>