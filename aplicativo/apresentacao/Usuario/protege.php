<?php
//Arquivo responsável por verificar se usuário possui acessa a página ou não.
//Em construção.
session_start();
//Metódo mágico do PHP para carregar a classe necessaria para funcionamento correto do objeto
//http://www.php.net/manual/pt_BR/language.oop5.autoload.php
function __autoload($class_name) 
{
    require_once "../../classes/".$class_name.".php";
}
$user = $_SESSION['usuario'];


?>