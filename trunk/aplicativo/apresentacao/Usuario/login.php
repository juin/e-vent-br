<?php
require_once (dirname(__FILE__) . '/../../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
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
<div class="row">
		<div class="large-6 large-centered medium-6 small-6 columns">
				<form class="form-login" method="post" action="login.php">
					<div class="panel panel-login">
					<div align="center"> 
						<div class="row fundo-titulo">
							<div class="large-12 large-centered columns medium-12 small-12">
								<div class="row titulo">
									<div class="large-10 medium-10 small-10 columns">
										<h3>Login</h3>
									</div>
									<div class="large-10 medium-10 small-10 columns">
										<i class="fi-torso icone"></i>
									</div>
								</div>
							</div>
						</div><br>
					<div class="row usuario">					
							<label>Usuário</label>
							<div class="large-8 medium-8 small-8 small-centered columns">
								<input type="text" name="login" alt="Login" placeholder="Usuário" class="usuariosmall-4 "/>			
							</div>
					</div>
					<div class="row senha">	
							<label>Senha</label>
							<div class="large-8 medium-8 small-8 small-centered columns">
								<input type="password" name="senha" alt="Login" placeholder="Senha" class="login"/>
							</div>
					</div>
					<div class="row">
						<div class="large-8 medium-8 small-8 small-centered columns">
								<input type="submit" name="acessar" value="Acessar" class="success button expand acessar" />
						</div>
					</div>
					</div>
					</div><!-- fim panel -->
				</form>	
		<div class="row esqueceu-cadastre">			
			<div class="large-12 medium-12 small-12 columns">
				<ul class="inline-list right esqueceu-cadastre">		
      				<li><a href="#">Cadastre-se</a></li>
      				<li><a href="#">Esqueceu a senha?</a></li>
      				<li><a href="#">Validar Certificado</a></li>
			</div>		
		</div>	
	</div>
	</div>
<?
if($informarInvalido) {
	echo "<script>informarLoginInvalido();</script>";
}
if($informarCamposNaoPreenchidos){
	echo "<script>informarCamposNaoPreenchidos();</script>";
}
?>
