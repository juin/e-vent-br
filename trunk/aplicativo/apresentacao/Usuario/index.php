<?php
require_once('../../fachada/FachadaUsuario.php');

if(isset($_POST['login']) && ($_POST['senha'])){
    $login=$_POST['login'];
    $senha=$_POST['senha'];

    if(($login) AND ($senha)) { //Ele entra nessa condição se as duas variáveis não estiverem vazia
    
        $usuario = FachadaUsuario::getInstancia()->validarAcesso($login,$senha);
    
        if ($usuario) {

            $_SESSION['usuario'] = $usuario;
            
            //Pegar cada item da sessão criada com o array com os dados do usuário.
            echo "Código: " . $_SESSION['usuario']->getCod_usuario();
            echo "<br/>";
            echo "Nome: " . $_SESSION['usuario']->getNome();
            
            /**
             * Teste para verificar se Instância Única está funcionando.
             */
            $objA = FachadaUsuario::getInstancia(); 
            $objB = FachadaUsuario::getInstancia(); 
            if ($objA == $objB) { 
                echo "<br>Instância única"; 
            } else { 
                    echo "<br>Instâncias diferentes"; 
                }
            //Fim do teste InstanciaUnica
            
        } else {
            echo "erro.";
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