<?php
require_once (dirname(__FILE__) . '/../../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once (FACHADAS . 'FachadaEvento.php');
require_once (FACHADAS . 'FachadaAtividade.php');

$cod_evento = $_GET['cod_evento'];?>
<div class="row">	
		<div class="large-3 medium-3 small-3 columns">
		</div>
			<div class="large-7 medium-7 small-7 columns">		
				<div class="row gerenciamento-usuario-titulo">
					<h2>Gerenciamento</h2>
				</div>
			</div>
</div>
<div class="row corpo">	
		<? require_once(APRESENTACAO.'menu_esquerdo.php'); ?>
		<div class="abas-gerenciamento">
			<div class="large-8 medium-8 small-8 columns">
				<div class="panel">
					<dl class="tabs" data-tab>
  						<dd class="tab-title active"><a href="#panel2-1">Evento</a></dd>
  						<dd class="tab-title"><a href="#panel2-2">Atividades</a></dd>
  						<dd class="tab-title"><a href="#panel2-3">Programação</a></dd>
  						<dd class="tab-title"><a href="#panel2-4">Estatística</a></dd>
					</dl>
					<div class="tabs-content">
  						<div class="content active" id="panel2-1">
  							<a href="<?echo URL;?>apresentacao/Evento/evento_editar.php?cod_evento=<?echo $cod_evento;?>">Editar Evento</a>
  						</div>
  						<div class="content" id="panel2-2">
    						<br>
								<fieldset>
									<legend>Atividades</legend>
									<p>Clique no título da atividade para lançar a frequência.</p>
									<? $atividades = FachadaAtividade::getInstancia()->
									listarAtividadesPorCodigoEvento($cod_evento);
									if ($atividades != null) {?>
										<table>
										  <thead>
										    <tr>
										      <th width="50">Cod.</th>
										      <th>Nome</th>
										      <th width="120">Ação</th>
										    </tr>
										  </thead>
										  <tbody>
										    <?
												foreach ($atividades as $atividade) {?>
													<tr>
													<td><? echo $atividade->getCodAtividade();?></td>
													<td><? echo utf8_encode($atividade->getNome());?></td>
													<td>
														<a href="#" data-reveal-id="modal-editar-atividade">Editar</a>
														 | 
														<a href="#" data-reveal-id="modal-apagar-atividade">Apagar</a>
													</td>
													</tr>
													<div id="modal-editar-atividade" class="reveal-modal" data-reveal>
													  <h2>Atividade</h2>
													  <p class="lead">Your couch.  It is mine.</p>
													  <p>Im a cool paragraph that lives inside of an even cooler modal. Wins</p>
													  <a class="close-reveal-modal">&#215;</a>
													</div>
													<div id="modal-apagar-atividade" class="reveal-modal" data-reveal>
													  <h2>Apagar</h2>
													  <p class="lead">Você confirmar a exclusão da atividade abaixo?</p>
													  <p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>
													  <a class="close-reveal-modal">&#215;</a>
													</div>													
												<?}?>
										  </tbody>
										</table>
										
								  	<?}?>
								  	
								</fieldset>		
  						</div>
  						<div class="content" id="panel2-3">
    						<p>Third panel content goes here...</p>
  						</div>
  						<div class="content" id="panel2-4">
    						<p>Fourth panel content goes here...</p>
  						</div>
					</div>		
				</div>				
			</div>
		</div>
 	</div>
 <? require_once(APRESENTACAO.'rodape.php');?>
