<?
session_start();
if($_SESSION['UsuarioSessao'] == NULL){
    header('location: http://localhost/e-vent/aplicativo/apresentacao/Usuario/index.php');
} else{
    echo "Seja Bem Vindo!";
}
?>