<?
require_once (dirname(__FILE__) . '/../../config.php');

session_start();

session_destroy();//Destroi sessão

session_unset();//Limpa as variaveis globais das sessões

header('location: '.URL.'apresentacao/Usuario/login.php');
?>