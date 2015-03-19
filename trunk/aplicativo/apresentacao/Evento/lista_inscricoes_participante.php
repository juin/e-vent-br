<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once(APRESENTACAO.'cabecalho.php');
require_once(dirname(__FILE__).'/../../utilidades.php');
require_once(PERSISTENCIAS.'PersistenciaEvento.php');
require_once(PERSISTENCIAS.'PersistenciaAtividade.php');
require_once(PERSISTENCIAS.'PersistenciaLocal.php');
require_once(PERSISTENCIAS.'PersistenciaUsuario.php');
require_once(PERSISTENCIAS.'PersistenciaInscricao.php');
?>
<div class="row">	
		<div class="large-3 medium-3 small-3 columns">
		</div>
			<div class="large-7 medium-7 small-7 columns">		
				<div class="row gerenciamento-usuario-titulo">
					<h2>Eventos</h2>
				</div>
			</div>
</div>	
	<div class="row corpo">	
		<? require_once(APRESENTACAO.'menu_esquerdo.php'); ?>
		<div class="painel-eventos">
			<div class="large-9 medium-9 small-9 columns">
				<h5>Inscrições</h5>
					<div class="lista-inscricoes-completa">
						<? $inscricoes = PersistenciaInscricao::getInstancia()->selecionarInscricoesPorUsuario($usuarioLogado->getCodUsuario());?>
	  					<ul>
	  							<?
						        if ($inscricoes!=NULL) {
						            foreach ($inscricoes as $inscricao) {?>
						            	<li>Inscrição: <? echo str_pad($inscricao->getCodInscricao(), 4, "0", STR_PAD_LEFT); ?><br>
				      							<? $evento = PersistenciaEvento::getInstancia()->
				      							selecionarEventosPorCodigo($inscricao->getCodEvento());?>
				      							 <span><? echo $evento[0]->getSigla(); ?></span><br>
				      							 Status: <? echo $inscricao->getStatus(); ?>
				      					</li>
						            <?}
						        }?>
	  					</ul>			
					</div>	
				</div>
			</div>
		</div><!-- fim painel-eventos -->

		<div class="painel-eventos-encerrados">
			<div class="large-8 medium-8 small-8 columns">	
				<br>
			   	<h5>Eventos Encerrados</h5>
				<? $eventos_encerrados = PersistenciaEvento::getInstancia()->selecionarEventosPorStatus(EVENTO_STATUS_ENCERRADO);
	            if($eventos_encerrados!=NULL){
	                foreach ($eventos_encerrados as $encerrado) { ?>
	                	<div class="panel">
	  						<h5><? echo $encerrado->getNome(); ?></h5>
	 				 		<p><? echo $encerrado->getNome(); ?></p>				
						</div>
	                <?}
	            }
	        	?>
				</div>
		</div>
 	</div>
	<section id="github" class="githubissues hide-for-small-down">
   	<div class="row collapse">
      	<div class="large-12 medium-12 small-12 columns">						
			</div>
		</div>	  
  	</section>
<? require_once(APRESENTACAO.'rodape.php');?>