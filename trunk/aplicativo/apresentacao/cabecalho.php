<?
require_once('Usuario/menu.php');
require_once('Usuario/verifica_sessao.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sistema de gerenciamento de Eventos | e-Vent-br</title>
</head>

<body>
    
    <p>Olá <? echo $_SESSION['login']; ?> <a href="#">Minha Conta</a> - <a href="sair.php">Sair</a></p>
    