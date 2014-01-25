<?php
//Classe para criar sessão do usuário logado.

class UsuarioSessao {
    //@var int
    private $cod_usuario;
    
    //@var string
    private $nome;
    
    //@var string
    private $login;
    
    //@var string
    private $senha;
    
    public function setCod_usuario($cod_usuario){
        $this->cod_usuario = $cod_usuario;
    }

    public function getCod_usuario(){
        return $this->cod_usuario;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getSenha(){
        return $this->senha;
    }
}
?>