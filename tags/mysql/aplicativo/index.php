<?
session_start();
if($_SESSION['UsuarioSessao'] == NULL){
    header('location: apresentacao/Usuario/login.php');
} else{
    echo "Seja Bem Vindo!";
}
?>