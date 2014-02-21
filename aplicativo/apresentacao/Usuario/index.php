<?php
require_once('../../fachada/FachadaUsuario.php');

if(isset($_POST['login']) && ($_POST['senha'])){
    $login=$_POST['login'];
    $senha=$_POST['senha'];

    if(($login) AND ($senha)) { //Ele entra nessa condição se as duas variáveis não estiverem vazia
    
        $usuario = FachadaUsuario::getInstancia()->validarAcesso($login,$senha);
        
        if ($usuario != NULL) {
            echo "Bem vindo<br>";
        } else {
            echo "Login ou Senha inválido.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login | e-Vent-br</title>
</head>

<body>
<form method="post" action="index.php">
	<label>Login:</label>
	<input type="text" name="login" placeholder="Insira o seu nome de usuário."/>
	<label>Senha:</label>
	<input type="text" name="senha" placeholder="Insira sua senha."/>
	<input type="submit" value="Acessar"/>
</form>
</body>
</html>