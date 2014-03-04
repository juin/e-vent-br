<?
require_once('Usuario/menu.php');
session_start();

if($_SESSION['usuario']==null):
  header("location: Usuario/index.php");
endif;

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sistema de gerenciamento de Eventos | e-Vent-br</title>
</head>

<body>
    <a href="sair.php">Sair</a>
    <ul>
        <li>Inicio</li>
        <li>Eventos</li>
        <li>Inscrições</li>
        <li>Certificados</li>
    </ul>
    <ul>
        <? menu($_SESSION['nivel_acesso']); ?>
    </ul>

</body>
</html>