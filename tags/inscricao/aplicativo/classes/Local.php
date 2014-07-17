<?
/*
 * Locais para atividades
 */
class Local {
	
    private $cod_local;
    private $nome;
    private $sigla;
    private $bloco;
    private $quantidade_maxima;

    public function setCodLocal($cod_local){
        $this->cod_local = $cod_local;
    }

    public function getCodLocal(){
        return $this->cod_local;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setSigla($sigla){
        $this->sigla = $sigla;
    }

    public function getSigla(){
        return $this->sigla;
    }

    public function setBloco($bloco){
        $this->bloco = $bloco;
    }

    public function getBloco(){
        return $this->bloco;
    }

    public function setQuantidadeMaxima($quantidade_maxima){
        $this->quantidade_maxima = $quantidade_maxima;
    }

    public function getQuantidadeMaxima(){
        return $this->quantidade_maxima;
    }
}

?>