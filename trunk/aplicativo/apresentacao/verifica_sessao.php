<?
if(basename($_SERVER["SCRIPT_NAME"])!="login.php"){
	session_start();
	$inativo = 60000; //Define tempo para sessão expirar. (em segundos)
	
	
	if($_SESSION['usuario']==null){//Verifica se Sessão foi criada.
	  header('location: '.URL.'apresentacao/Usuario/login.php');//Redireciona caso a sessão ainda não tenha sido criada.
	} else{
	    if (isset($_SESSION['tempo'])) {//Verifica se váriavel inicial da sessão tempo está definida.
	        $session_life = time() - $_SESSION['tempo'];//Diminui tempo atual da sessão tempo.
	        if ($session_life > $inativo) {//Verifica se usuário está inativo há mais segundos que o definido acima.
	            session_unset();//Apaga dados da sessão
	            session_destroy();//Destroi dados da sessão
	            header('location: '.URL.'apresentacao/Usuario/login.php');//Redirecio para página de login
	        }
	    }
	    $_SESSION['tempo'] = time();//Registra novo tempo na sessão.
	}
}

?>