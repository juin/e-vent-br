<?php
require_once (PERSISTENCIAS . 'PersistenciaConectorBD.php');
require_once (CLASSES . 'UsuarioSessao.php');
require_once (CLASSES . 'InstanciaUnica.php');

class PersistenciaUsuario extends InstanciaUnica {
    
    public function selecionarPorLoginSenha($login, $senha) {
        $usuarios = NULL;

        $sql = "SELECT * FROM Usuario WHERE login='" . $login . "' AND senha='" . $senha . "'";
        $registros = PersistenciaConectorBD::getInstancia() -> consultar($sql);

        if (!is_null($registros)) {
            $i = 0;
            //Percorre array que retornou do banco de dados e cria um objeto do tipo UsuarioSessao
            foreach ($registros as $registro) {
                $usuario = new UsuarioSessao();
                $usuario -> setCodUsuario($registro['cod_usuario']);
                $usuario -> setLogin($registro['login']);
				$usuario -> setNome($registro['nome_certificado']);
                $usuario -> setNivelAcesso($registro['nivel_acesso']);
                $usuario -> setCategoria($registro['categoria']);
                
                $usuarios[$i++] = $usuario;   
            }
        }

        if($usuarios!=NULL){
            return $usuarios[0];
        } else { 
                return NULL; 
        }
    }
	
	public function selecionarPorCodigo($cod_usuario) {
        $usuarios = NULL;

        $sql = "SELECT * FROM Usuario WHERE cod_usuario=" . $cod_usuario;
        $registros = PersistenciaConectorBD::getInstancia() -> consultar($sql);

        if (!is_null($registros)) {
            $i = 0;
            //Percorre array que retornou do banco de dados e cria um objeto do tipo UsuarioSessao
            foreach ($registros as $registro) {
                $usuario = new Usuario();
                $usuario -> setCodUsuario($cod_usuario);
				$usuario -> setNomeCertificado($registro['nome_certificado']);
				$usuario -> setNomeCracha($registro['nome_cracha']);
				$usuario -> setSexo($registro['sexo']);
				$usuario -> setDataNascimento($registro['data_nascimento']);
				$usuario -> setCpf($registro['cpf']);
				$usuario -> setRg($registro['rg']);
                $usuario -> setLogin($registro['login']);
				$usuario -> setTelefone1($registro['telefone1']);
				$usuario -> setTelefone2($registro['telefone2']);
				$usuario -> setEmail($registro['email']);
				$usuario -> setCampusInstituicao($registro['campus_instituicao']);
				$usuario -> setLattes($registro['lattes']);
				$usuario -> setCategoria($registro['categoria']);
				$usuario -> setNivelAcesso($registro['nivel_acesso']);
				$usuario -> setNotifica($registro['notifica']);
				$usuario -> setStatus($registro['status']);
				$usuario -> setDataHoraCadastro($registro['data_hora_cadastro']);
                $usuario -> setCodCidade($registro['cod_cidade']);
				$usuario -> setCodInstituicao($registro['cod_instituicao']);
				$usuario -> setCodCurso($registro['cod_curso']);
                $usuarios[$i++] = $usuario;   
            }
        }
        return $usuarios;
    }

    public function adicionarUsuario(Usuario $usuario) {
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

        return PersistenciaConectorBD::getInstancia()->inserir($sql);
    }
    
    public function selecionarPorEventoFuncao($cod_usuario, $cod_evento, $funcao){
		$usuarios = NULL;
		$sql = "Select u.cod_usuario, u.nome_certificado, u.nivel_acesso" .
				" From Usuario u, Usuario_Evento ue" .
				" Where ue.cod_evento = '" . $cod_evento . "'" .
				" and ue.cod_usuario = '" . $cod_usuario . "'" .
				" and ue.funcao = '" . $funcao . "'" .
				" and u.cod_usuario = ue.cod_usuario" .
				" and u.status = 'Ativo'";
				
		$registros = PersistenciaConectorBD::getInstancia()->consultar($sql);
		if (!is_null($registros)) {
            $i = 0;
            foreach ($registros as $registro) {
                $usuario = new Usuario();
                $usuario->setCodUsuario($registro['cod_usuario']);
                $usuario->setNome($registro['nome_certificado']);
                $usuario->setNivelAcesso($registro['nivel_acesso']);
                
                $usuarios[$i++] = $usuario;   
            }
		}
		
		return $usuarios;		
	}
	
    public function selecionarPorAtividadeFuncao($cod_usuario, $cod_atividade, $funcao){
		$usuarios = NULL;
		$sql = "Select u.cod_usuario, u.nome_certificado, u.nivel_acesso" .
				" From Usuario u, Usuario_Atividade ua" .
				" Where ua.cod_atividade = '" . $cod_atividade . "'" .
				" and ua.cod_usuario = '" . $cod_usuario . "'" .
				" and ue.funcao = '" . $funcao . "'" .
				" and u.cod_usuario = ua.cod_usuario" .
				" and u.status = 'Ativo'";
				
		$registros = PersistenciaConectorBD::getInstancia()->consultar($sql);
		if (!is_null($registros)) {
            $i = 0;
            foreach ($registros as $registro) {
                $usuario = new Usuario();
                $usuario->setCodUsuario($registro['cod_usuario']);
                $usuario->setNome($registro['nome_certificado']);
                $usuario->setNivelAcesso($registro['nivel_acesso']);
                
                $usuarios[$i++] = $usuario;   
            }
		}
		
		return $usuarios;	    
	}
	
	public function selecionarPorFuncaoEspecial($cod_usuario, $cod_evento){
		$usuarios = NULL;
		$sql = 	"SELECT u.cod_usuario, nome_certificado, nivel_acesso,ua.funcao, ue.funcao".
				" FROM Usuario u, Usuario_Atividade ua, Usuario_Evento ue, Evento e".
				" WHERE u.cod_usuario = ".$cod_usuario.
				" AND e.cod_evento = ".$cod_evento.
				" AND u.cod_usuario = ua.cod_usuario".
				" AND u.cod_usuario = ue.cod_usuario".
				" AND e.cod_evento = ue.cod_evento";
		$registros = PersistenciaConectorBD::getInstancia()->consultar($sql);
		
		if (!is_null($registros)) {
            $i = 0;
            foreach ($registros as $registro) {
                $usuario = new Usuario();
                $usuario->setCodUsuario($registro['cod_usuario']);
                $usuarios[$i++] = $usuario;   
            }
		}
		
		return $usuarios;
	}
	
	//Verifica se usuário possui função especial em algum evento
	public function verificarPorFuncaoEspecialEvento($cod_usuario){
		$usuarios = NULL;
		$sql = 	"SELECT u.cod_usuario, nivel_acesso, ue.cod_evento, ue.funcao".
				" FROM Usuario u, Usuario_Evento ue".
				" WHERE u.cod_usuario = ".$cod_usuario.
				" AND u.cod_usuario = ue.cod_usuario";
		$registros = PersistenciaConectorBD::getInstancia()->consultar($sql);
		
		if (!is_null($registros)) {
            $i = 0;
            foreach ($registros as $registro) {
                $usuario = new UsuarioEvento();
                $usuario->setCodUsuario($registro['cod_usuario']);
				$usuario->setNivelAcesso($registro['nivel_acesso']);
				$usuario->setCodEvento($registro['codigo_evento']);
				$usuario->setFuncaoEvento($registro['funcao']);
                $usuarios[$i++] = $usuario;   
            }
		}
		
		return $usuarios;
	}
}
?>