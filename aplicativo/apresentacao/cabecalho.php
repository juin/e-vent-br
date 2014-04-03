<?
require_once(APRESENTACAO.'menu.php');
require_once(APRESENTACAO.'verifica_sessao.php');
require_once(CLASSES.'UsuarioSessao.php');
require_once(FACHADAS.'FachadaUsuarioNivelAcesso.php');
require_once(FACHADAS.'FachadaEvento.php');
//Metódo mágico do PHP para carregar a classe necessaria para funcionamento correto do objeto
//http://www.php.net/manual/pt_BR/language.oop5.autoload.php
function __autoload($class_name) 
{
    require_once(CLASSES.$class_name.'.php');
}
$usuarioLogado = $_SESSION['usuario'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sistema de gerenciamento de Eventos | e-Vent-br</title>
</head>

<body>
    
    <p>Olá <? echo $usuarioLogado->getLogin(); ?> <a href="#">Minha Conta</a> - <a href="sair.php">Sair</a></p>
    