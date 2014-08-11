<?php
require_once (dirname(__FILE__) . '/../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once(FACHADAS.'FachadaEvento.php');
require_once(FACHADAS.'FachadaInscricao.php');
require_once(FACHADAS.'FachadaUsuario.php');
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
			<? $eventos_andamento = FachadaEvento::getInstancia()->listarEventosEmAndamento(); ?>
			<div class="large-6 medium-6 small-6 columns">	
			<?
	            if($eventos_andamento!=NULL){
	                foreach ($eventos_andamento as $andamento) { ?>
	                	<div class="panel">
		                	<h5><? echo utf8_encode($andamento->getNome()); ?></h5>
		                	<div class="row informacoes-evento">
		  						<div class="large-4 medium-4 small-4 columns">
		  							<br>						
		  							<ul class="small-block-grid-1">
		  							<? if($andamento->getUrlGabaritoImagem()!=null){
		  								$imagem = $andamento->getUrlGabaritoImagem();
		  							} else{
		  								$imagem = IMAGENS."imagem-evento-padraoa.jpg";
		  							}?>
		 								<li><img class="evento" src="<? echo $imagem; ?>"></li>
		  							</ul>
		  						</div>
	  							<div class="large-8 medium-8 small-8 columns">
	  								<p><? echo utf8_encode($andamento->getNome()); ?></p>
	  								<a href="<? echo URL; ?>apresentacao/Evento/lista_atividades.php?cod_evento=<? echo $andamento->getCodEvento();?>"class="success button">Fazer Inscrição</a>
	 				 				<?
	 				 					if(FachadaUsuario::getInstancia()->
										usuarioPossuiFuncaoEspecialPorEvento($usuarioLogado->getCodUsuario(),$andamento->getCodEvento()) == TRUE){
											
	 				 				 ?>
	 				 				<a href="<? echo URL; ?>apresentacao/Evento/gerencia_evento.php?cod_evento=<? echo $andamento->getCodEvento();?>" class="alert button">Gerenciamento</a>
	 				 				
	 				 				<? }
										
										
											
									?>
	 				 			</div>
	 				 		</div>
	 				 	</div>
	            	<?}
	            }
        	?>
			</div>
		</div><!-- fim painel-eventos -->
		<div class="painel-inscricoes">
			<div class="large-3 medium-2 small-3 columns">	
		   	<h5>Inscrições</h5>
				<div class="inscricoes">
					<? $inscricoes = FachadaInscricao::getInstancia()->listarInscricoesPorUsuario($usuarioLogado->getCodUsuario());?>
  					<table>
  						<tbody>
  							<?
					        if ($inscricoes!=NULL) {
					            foreach ($inscricoes as $inscricao) {?>
					            	<tr>
			      						<td>Inscrição: <? echo str_pad($inscricao->getCodInscricao(), 4, "0", STR_PAD_LEFT); ?><br>
			      							<? $evento = FachadaEvento::getInstancia()->
			      							listarEventoPorCodigo($inscricao->getCodEvento());?>
			      							 <span><? echo $evento->getSigla(); ?></span><br>
			      							 Status: <? echo $inscricao->getStatus(); ?>
			      						</td>
    								</tr>
					            <?}
					        }?>
  						</tbody>
  					</table>			
				</div>	
			</div>
		</div>
		<div class="painel-eventos-encerrados">
			<div class="large-8 medium-8 small-8 columns">	
				<br>
			   	<h5>Eventos Encerrados</h5>
				<? $eventos_encerrados = FachadaEvento::getInstancia()->listarEventosEncerrados();
	            if($eventos_encerrados!=NULL){
	                foreach ($eventos_encerrados as $encerrado) { ?>
	                	<div class="panel">
	  						<h5><? echo $andamento->getNome(); ?></h5>
	 				 		<p><? echo $andamento->getNome(); ?></p>				
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
<? require_once('rodape.php'); ?>