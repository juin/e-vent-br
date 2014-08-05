<?php
require_once (dirname(__FILE__) . '/../../config.php');
require_once(FACHADAS.'FachadaUsuario.php');
require_once(UTILIDADES);
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>e-Vent-br | Cadastro de Usuário</title>
	
	<link rel="stylesheet" href="<? echo SCRIPTS_CSS; ?>foundation.css"/>
	<link rel="stylesheet" href="<? echo SCRIPTS_CSS; ?>e.vent.css"/>
	<link rel="stylesheet" href="<? echo SCRIPTS_CSS; ?>foundation-icons.css"/>
	
	<script src="<? echo SCRIPTS_JS; ?>modernizr.js"></script>
</head>
<body>
	<div class="row cabecalho">	
		<div class="large-12 medium-12 small-12 columns">	
			<div class="fixed">		
				<nav class="top-bar" data-topbar>
					<ul class="title-area">
   					<ul class="small-block-grid-1">
   						<br>
 							<li><img class="evento" src="<? echo IMAGENS; ?>logo_event.png"></li>
  						</ul>
    					<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
  					</ul>		
  				<section class="top-bar-section">
    		 		<ul class="right">
      				<li><a href="<? echo URL."apresentacao/"; ?>">Eventos</a></li>
      				<li><a href="#">Inscrições</a></li>
      				<li><a href="#">Certificados</a></li>
    				</ul>
  				</section>
  				</nav>
  				<section id="github" class="githubissues hide-for-small-down">  				
  				</section>
			</div>
		</div>
	</div>
	<div class="row corpo">	
		<div class="large-8 large-centered medium-8 small-8 columns">
			<div class="large-8 medium-8 small-8 columns">
				<div class="row cadastro-titulo">
					<h2>Cadastro de Usuário</h2>
				</div>
			</div>
			
			<div class="row">
				<div class="large-12 medium-12 small-12 columns">
				<br>
				<br>
					<div class="panel">
						<form class="form-cadastro">
							<fieldset>
								<legend>Dados Pessoais</legend>
									<div class="row">
										<div class="large-12 small-12 columns">
      									<label>Nome<font>*</font>:  <span>(Nome para o certificado)</span><br>
        										<input type="text" placeholder="Nome Completo" />		
      									</label>
    									</div>								
									</div>
									<div class="row">
										<div class="large-12 medium-12 small-12 columns">
      									<label>Nome do Crachá<font>*</font>:
        										<input type="text" placeholder="Nome Crachá" />
      									</label>
    									</div>								
									</div>
									<div class="row">
    									<div class="large-6 medium-6 small-6 columns">
      									<label>Sexo<font>*</font>: </label>
      										<input type="radio" name="Feminino" value="F" id="sexoFeminino"><label for="sexoFeminino">F</label>
      										<input type="radio" name="Masculino" value="M" id="sexoMasculino"><label for="sexoMasculino">M</label>
      										<input type="radio" name="Não Declarar" value="naodeclarar" id="naodeclarar"><label for="naodeclarar">Não declarar</label>
    									</div>
    								</div>
    								<div class="row">
    									<div class="large-6 medium-6 small-6 columns">
      									<label>Data de Nascimento<font>*</font>:
        										<input type="date" placeholder="large-4.columns" />
      									</label>
    									</div>	
    									<div class="large-6 medium-6 small-6 columns">
      									<label>RG:<font>*</font> 
        										<input type="text" placeholder="RG" />
      									</label>
    									</div>
    								</div>								
									<div class="row">	
    									<div class="large-6 medium-6 small-6 columns">
      									<label>CPF<font>*</font>:
        										<input type="text" placeholder="CPF" />
      									</label>
    									</div>
    								</div>	
									<div class="row">
										<div class="large-12 medium-12 small-12 columns">
      									<label>e-mail<font>*</font>: 
        										<input type="text" placeholder="e-mail" />
      									</label>
    									</div>
    								</div>
    								<div class="row">
										<div class="large-6 medium-6 small-6 columns">
      									<label>Telefone 1<font>*</font>: <span>(Informar apenas números)</span><br> 
        										<input type="tel" placeholder="Telefone1" />
      									</label>
    									</div>	
    									<div class="large-6 medium-6 small-6 columns">
      									<label>Telefone 2: <span>(Informar apenas números)</span><br> 
        										<input type="tel" placeholder="Telefone2" />
      									</label>
    									</div>								
									</div>
								<div class="row">
									<div class="large-2 medium-2 small-2 columns">
      								<label>Estado<font>*</font>:
        									<select>
          									<option value="ac">AC</option>
          									<option value="al">AL</option>
          									<option value="ap">AP</option>
          									<option value="am">AM</option>
          									<option value="ba">BA</option>
          									<option value="ce">CE</option>
          									<option value="df">DF</option>
          									<option value="es">DF</option>
          									<option value="go">DF</option>	
        									</select>
      							</label>
    								</div>   										
									<div class="large-10 medium-10 small-10 columns">
      								<label>Cidade<font>*</font>:
        									<select>
          									<option value="...">...</option> 
        									</select>
      								</label>
    								</div>
    							</div>
    					</fieldset>		
					</form>
    				<form class="form-complementos">
						<fieldset>
							<legend>Complementos</legend>								
								<div class="row">
   								<div class="large-12 medium-12 small-12 columns">
      								<label>Categoria <font>*</font>:
        									<select>
          									<option value="estudante">Estudante</option>
          									<option value="profissional">Profissional</option>
          									<option value="professor">Professor</option>
          									<option value="outros">Outros</option>
        									</select>
      								</label>
    								</div>
  								</div>		
							<div class="row">
								<div class="large-12 medium-12 small-12 columns">
      							<label>Lattes: 
        								<input type="text" placeholder="Lattes" />
      							</label>
    							</div>
    						</div>			
							<div class="row">
								<div class="large-12 medium-12 small-12 columns">
      							<label>Instituição de Ensino: 
        								<select>
          								<option value="uesb">UESB - Universidade Estadual do Sudoeste da Bahia</option>
          								<option value="ufba">UFBA - Universidade Federal da Bahia</option>
          								<option value="ifba">IFBA - Instituto Federal da Bahia</option>
          								<option value="ftc">FTC - Faculdade de Tecnologia e Ciência</option>
          								<option value="fainor">Fainor - Faculdade Independente do Nordeste</option>
          								<option value="unip">UNIP- Universidade Paulista </option>
          								<option value="nassaujuvencio">Faculdade Mauricio de Nassau/Juvencio Terra</option>
          								<option value="uesc">Universidade Estadual de Santa Cruz - UESC</option>
          								<option value="uneb">UNEB - Universidade do Estado da Bahia </option>
        								</select>
      							</label>
    							</div>
    						</div>	
    						<div class="row">
								<div class="large-12 medium-12 small-12 columns">
      							<label>Curso: 
        								<select>
          								<option value="computacao">Ciência da Computação</option>
          								<option value="sistemas">Sistemas de Informação</option>
          								<option value="engenharia">Engenharia da Computação</option>
        								</select>
      							</label>
    							</div> 
    						</div>							
						</fieldset>			
					</form>		
			
					<form class="form-senha">
						<fieldset>
							<legend>Dados de Login</legend>
								<div class="row">
									<div class="large-12 medium-12 small-12 columns">
      								<label>Login<font>*</font> :
        									<input type="text" placeholder="Login" />
      								</label>
    								</div>	
								</div>
								<div class="row">
									<div class="large-12 medium-12 small-12 columns">
      								<label>Senha<font>*</font>: <span>(Mínimo de 8 e máximo de 20 caracteres)</span><br> 
        									<input type="password" placeholder="Senha" />
      								</label>
    								</div>	
								</div>
								<div class="row">
									<div class="large-12 medium-12 small-12 columns">
      								<label>Confirmar senha<font>*</font>: 
        									<input type="password" placeholder="Confirmar senha" />
      								</label>
    								</div>
    								<div class="large-12 medium-12 small-12 columns">
    									<font>(*)Campos Obrigatórios</font>	
    								</div>	
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="large-12 medium-12 small-12 columns">
					<div class="large-3 medium-3 small-3 columns">	
						<p></p>
					</div>
					<div class="large-3 medium-3 small-3 columns">
						<p></p>
					</div>
					<div class="large-3 medium-3 small-3 columns">
						<input type="submit" name="salvar" value="Salvar" class="success button expand salvar" />
					</div>
					<div class="large-3 medium-3 small-3 columns">
						<input type="submit" name="cancelar" value="Cancelar" class="alert button expand cancelar" />
					</div>			
				</div>	
			</div>
		</div>
	</div>
	<section id="github" class="githubissues hide-for-small-down">
   	<div class="row collapse">
      	<div class="large-12 medium-12 small-12 columns">						
			</div>
		</div>	  
  	</section>
	<div class="row footer">	
		<div class="large-12 medium-12 small-12 columns foo">	
			<div class="zurb-footer-bottom">	
	  			<div class="large-7 columns">
	  				<ul class="inline-list right">
						<li><a href="#">Sobre</a></li>
						<li><a href="#">Manual</a></li>	
						<li><a href="#">Contato</a></li>		  					
	  				</ul>	
    			</div>          
  			</div>		
		</div>
	</div>
	
	<script src="js/vendor/jquery.js"></script>
	<script src="js/foundation.min.js"></script>
	
	<script>
		$(document).foundation();
	</script>
</body>
</html>


<?
//Rotina de envio do cadastro
if (isPostBack()) {
	if(isset($_POST['nome']) && ($_POST['cpf']) && ($_POST['login'])
	 && ($_POST['senha']) && ($_POST['email'])){
		
		$usuario = new Usuario();
		
		$usuario->setCodUsuario(null);
		$usuario->setNome($_POST['nome']);
		$usuario->setSexo($_POST['sexo']);
		$usuario->setNasc($_POST['nasc']);
		$usuario->setCpf($_POST['cpf']);
		$usuario->setRg($_POST['rg']);
		$usuario->setLogin($_POST['login']);
		$usuario->setSenha($_POST['senha1']);
		$usuario->setTel1($_POST['tel1']);
		$usuario->setTel2($_POST['tel2']);
		$usuario->setEmail($_POST['email']);
		$usuario->setInstituicao($_POST['instituicao']);
		$usuario->setCurso($_POST['curso']);
		$usuario->setLattes($_POST['lattes']);
		$usuario->setCategoria($_POST['categ']);
		$usuario->setNivelAcesso($_POST['nivel']);
		$usuario->setNotifica($_POST['notifica']);
		$usuario->setStatus($_POST['status']);
		$usuario->setDatacad($_POST['dt_cad']);
		$usuario->setCidade($_POST['cidade']);
		
		$resultado = FachadaUsuario::getInstancia()->adicionarUsuario($usuario);
		
		echo $resultado;
	}
}
?>