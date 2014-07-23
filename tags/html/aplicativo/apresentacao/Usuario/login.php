<?
require_once(dirname(__FILE__).'/../../config.php');
require_once(FACHADAS.'FachadaUsuario.php');
require_once(UTILIDADES);

$informarInvalido = false;
$informarCamposNaoPreenchidos = false;
if (isPostBack()) {
	if(isset($_POST['login']) && ($_POST['senha'])){
	    $login=$_POST['login'];
	    $senha=$_POST['senha'];
	
	    if(($login) && ($senha)) { //Ele entra nessa condição se as duas variáveis não estiverem vazia
	        $usuario = FachadaUsuario::getInstancia()->validarAcesso($login, $senha);
	        
	        if ($usuario != NULL) {
	            session_start(); 
	            $_SESSION['tempo'] = time();
	            $_SESSION['usuario'] = $usuario;
	            header('location: '.URL.'apresentacao/index.php');
	        } 
	    }
	    $informarInvalido = true;
	} else {
		$informarCamposNaoPreenchidos = true;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src="<?echo SCRIPTS.'Usuario/login.js'?>"></script>
<title>Login | e-Vent-br</title>
</head>
<body>
<form method="post" action="login.php">
    <label>Login:</label>
    <input type="text" name="login" placeholder="Insira o seu nome de usuário."/>
    <br>
    <label>Senha:</label>
    <input type="text" name="senha" placeholder="Insira sua senha."/>
    <br><input type="submit" value="Acessar"/>
</form>
</body>
</html>
<?
if($informarInvalido) {
	echo "<script>informarLoginInvalido();</script>";
}
if($informarCamposNaoPreenchidos){
	echo "<script>informarCamposNaoPreenchidos();</script>";
}
?>
