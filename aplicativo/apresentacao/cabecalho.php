<?php
require_once(APRESENTACAO.'menu.php');
require_once(APRESENTACAO.'verifica_sessao.php');
require_once(CLASSES.'UsuarioSessao.php');
//Metódo mágico do PHP para carregar a classe necessaria para funcionamento correto do objeto
//http://www.php.net/manual/pt_BR/language.oop5.autoload.php
function __autoload($class_name) 
{
    require_once(CLASSES.$class_name.'.php');
}

//Salva sessão do usuario na variavel $usuarioLogado
$usuarioLogado = $_SESSION['usuario'];
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>e-Vent-br</title>
	
	<link rel="stylesheet" href="<? echo SCRIPTS_CSS; ?>foundation.css"/>
	<link rel="stylesheet" href="<? echo SCRIPTS_CSS; ?>e.vent.css"/>
	<link rel="stylesheet" href="<? echo SCRIPTS_CSS; ?>foundation-icons.css"/>
	
	
	<script src="<? echo SCRIPTS_JS; ?>modernizr.js"></script>
	
</head>
<body>
	<? if(basename($_SERVER["SCRIPT_NAME"])!="login.php"){ ?>
	<div class="row">	
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
  					<div class="right conta-usuario">			
						<p>Olá, <strong><? echo $usuarioLogado->getNome();?></strong> <a href="#">Minha Conta</a> [ <a href="<? echo URL."apresentacao/Usuario/logout.php";?>">Sair</a> ]</p>
					</div>		
  				<section class="top-bar-section menu-topo">
    		 		<ul class="right">
      				<li><a href="<? echo URL."apresentacao/"; ?>">Eventos</a></li>
      				<li><a href="#">Inscrições</a></li>
      				<li><a href="#">Certificados</a></li>
    				</ul>
  				</section>
  				</nav>
			</div>
		</div>
	</div>	
    <? } ?>