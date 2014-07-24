<?php
require_once ('config.php');

session_start();
if(!isset($_SESSION['UsuarioSessao'])) {
    header('location: '.URL.'apresentacao/Usuario/login.php');
} else{
    echo "Seja Bem Vindo!";
}
?>