<?php
/**
 * Parametros de acesso ao banco de dados.
 */
class ParametrosAcessoBanco {
	
	//@var string
    private $bd_servidor; //Endereço do servidor do Banco de Dados
    
    //@var string
    private $bd_usuario; //Usuário do Banco de dados
    
    //@var string
    private $bd_senha; //Senha do Usuário do Banco de dados
    
    //@var string
    private $bd_nome_banco; //Nome do Banco de dados
    
    public function setBDServidor($bd_servidor){
        $this->bd_servidor = $bd_servidor;
    }

    public function getBDServidor(){
        return $this->bd_servidor;
    }

    public function setBDUsuario($bd_usuario){
        $this->bd_usuario = $bd_usuario;
    }
    
    public function getBDUsuario(){
        return $this->bd_usuario;
    }
    
    public function setBDSenha($bd_senha){
        $this->bd_senha = $bd_senha;
    }
    
    public function getBDSenha(){
        return $this->bd_senha;
    }

    public function setBDNomeBanco($bd_nome){
        $this->bd_nome_banco = $bd_nome;
    }
    
    public function getBDNomeBanco(){
        return $this->bd_nome_banco;
    }
}
