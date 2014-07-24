<?
require_once (dirname(__FILE__) . '/../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once(FACHADAS.'FachadaEvento.php');
require_once(FACHADAS.'FachadaInscricao.php');
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
<br>		
	<div class="row menu-esquerdo">	
		<div class="large-3 medium-3 small-3 columns">	
		<br>
		<br>
  			<ul class="off-canvas-list doc-oc-list">
    			<li><a href="#">Inscrições</a></li>
    			<li><a href="#">Certificados</a></li>
  			</ul>
  		<br>
  			<ul class="off-canvas-list doc-oc-list">
    			<li class="menu-usuario"><a href="#">Eventos</a></li>
    			<li class="menu-usuario"><a href="#">Cadastro de Participante</a></li>
    			<li class="menu-usuario"><a href="#">Inscrição de Participante</a></li>
    			<li class="menu-usuario"><a href="#">Pagamentos</a></li>
  			</ul>	
		</div>
		<div class="painel-eventos">
			<? $eventos_andamento = FachadaEvento::getInstancia()->listarEventosEmAndamento(); ?>
			<div class="large-6 medium-6 small-6 columns">	
			<br>
			<br>
			<?
	            if($eventos_andamento!=NULL){
	                foreach ($eventos_andamento as $andamento) { ?>
	                	<div class="panel">
		                	<h5><? echo $andamento->getNome(); ?></h5>
		                	<div class="row informacoes-evento">
		  						<div class="large-4 medium-4 small-4 columns">
		  							<br>						
		  							<ul class="small-block-grid-1">
		 								<li><img class="evento" src="img/logo_weekit.jpg"></li>
		  							</ul>
		  						</div>
	  							<div class="large-8 medium-8 small-8 columns">
	  								<p><? echo $andamento->getNome(); ?></p>
	  								<a href="<? echo URL; ?>apresentacao/Evento/lista_atividades.php?cod_evento=<? echo $andamento->getCodEvento();?>"class="success button">Fazer Inscrição</a>
	 				 				<a href="<? echo URL; ?>apresentacao/Evento/gerencia_evento.php?cod_evento=<? echo $andamento->getCodEvento();?>" class="alert button">Gerenciamento</a>
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
	<br>
	<br>
	<br>
	<section id="github" class="githubissues hide-for-small-down">
   	<div class="row collapse">
      	<div class="large-12 medium-12 small-12 columns">						
			</div>
		</div>	  
  	</section>
<? require_once('rodape.php'); ?>