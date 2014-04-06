<?
require_once ('config.php');

session_start();
if($_SESSION['UsuarioSessao'] == NULL){
    header('location: '.URL.'apresentacao/Usuario/login.php');
} else{
    echo "Seja Bem Vindo!";
}
?>