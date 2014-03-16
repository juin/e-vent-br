<?php
//echo dirname(__FILE__);
require_once (FACHADAS . 'FachadaConectorBD.php');
require_once (CLASSES . 'UsuarioSessao.php');
require_once (CLASSES . 'InstanciaUnica.php');
//
//Classe que retorna os dados de usuário
class PersistenciaUsuario extends InstanciaUnica {

    public function selecionarPorLoginSenha($login, $senha) {
        //Transformar array de dados (bidimensional) em array de objetos (unidimensional)
        $sql = "SELECT * FROM Usuario WHERE login='" . $login . "' AND senha='" . $senha . "'";

        
        $sqlCOMMIT = array( 0=>"INSERT INTO Cidade VALUES (14,'VITORIAA');",
                            1=>"INSERT INTO Cidades VALUES (15,'SALVADOR');");
        FachadaConectorBD::getInstancia()->executarTransacao($sqlCOMMIT);
        
        //Retorna do Banco array com resultados da consulta.
        $registros = FachadaConectorBD::getInstancia() -> consultar($sql);

        //Necessário inicializar váriaves para evitar "Warnings" do PHP.
        $usuarios = NULL;

        if (!is_null($registros)) {
            
            $i = 0;
            //Percorre array que retornou do banco de dados e cria um objeto do tipo UsuarioSessao
            foreach ($registros as $registro) {
                $usuario = new UsuarioSessao();
                $usuario -> setCodUsuario($registro['cod_usuario']);
                $usuario -> setLogin($registro['login']);
                $usuario -> setNivelAcesso($registro['nivel_acesso']);
                $usuario -> setCategoria($registro['categoria']);
                
                $usuarios[$i++] = $usuario;   
            }
        }

        return $usuarios;
    }

    public function adicionarUsuario(Usuario $usuario) {

        if ($usuario instanceof Usuario) {
            $cod = $usuario -> getCodUsuario();
            $nome = $usuario -> getNome();
            $sexo = $usuario -> getSexo();
            $nasc = $usuario -> getNasc();
            $cpf = $usuario -> getCpf();
            $rg = $usuario -> getRg();
            $login = $usuario -> getLogin();
            $senha = $usuario -> getSenha();
            $tel1 = $usuario -> getTel1();
            $tel2 = $usuario -> getTel2();
            $email = $usuario -> getEmail();
            $instituicao = $usuario -> getInstituicao();
            $curso = $usuario -> getCurso();
            $lattes = $usuario -> getLattes();
            $categ = $usuario -> getCategoria();
            $nivel = $usuario -> getNivelAcesso();
            $notif = $usuario -> getNotifica();
            $status = $usuario -> getStatus();
            $dtcad = $usuario -> getDatacad();
            $cidade = $usuario -> getCidade();

            $sql = "Insert into Usuario values ($cod,'$nome','$sexo',$nasc,'$cpf','$rg','$login',
					'$senha','$tel1','$tel2','$email','$instituicao','$curso','$lattes','$categ',
					'$nivel','$notif','$status',$dtcad,$cidade)";

            /*$id = FachadaConectorBD::getInstancia()->inserir($sql);*/
            $id = $sql;
        } else {
            $id = "Erro!";
        }
        return $id;
    }

}
?>