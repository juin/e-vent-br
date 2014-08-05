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
<div class="row menu-esquerdo">	
		<? require_once(APRESENTACAO.'menu_esquerdo.php'); ?>

		<div class="abas-gerenciamento">
			<div class="large-8 medium-8 small-8 columns">
			<br>
			<br>
				<div class="panel">
					<dl class="tabs" data-tab>
  						<dd class="tab-title active"><a href="#panel2-1">Evento</a></dd>
  						<dd class="tab-title"><a href="#panel2-2">Atividades</a></dd>
  						<dd class="tab-title"><a href="#panel2-3">Programação</a></dd>
  						<dd class="tab-title"><a href="#panel2-4">Estatística</a></dd>
					</dl>
					<div class="tabs-content">
  						<div class="content active" id="panel2-1">
  							<br>
  							<form class="form-cadastro">
								<fieldset>
									<legend>Dados do Evento</legend>
									<?
										
											$evento = FachadaEvento::getInstancia()->
											listarEventoPorCodigo($cod_evento);
									?>
    									<div class="row">
											<div class="large-12 small-12 columns">
											<br>
      									<label>Nome do Evento<font>*</font>:<br>
        										<input type="text" placeholder="<? echo utf8_encode($evento->getNome()); ?>" />		
      									</label>
    										</div>								
										</div>
										<div class="row">
											<div class="large-12 small-12 columns">
      										<label>Sigla<font>*</font>:<br>
        											<input type="text" placeholder="Sigla" />		
      										</label>
    										</div>								
										</div>
										<div class="row">
											<div class="large-6 small-6 columns">
      										<label>Data de Início<font>*</font>:<br>
        											<input type="date" placeholder="large-4.columns"/>		
      										</label>
      									</div>																
											<div class="large-6 small-6 columns">
      										<label>Data de Término<font>*</font>:<br>
        											<input type="date" placeholder="large-4.columns"/>		
      										</label>
      									</div>
    									</div>
    									<div class="row">
											<div class="large-6 small-6 columns">
      										<label>Data de Início da Inscrição<font>*</font>:<br>
        											<input type="date" placeholder="large-4.columns"/>		
      										</label>
      									</div>																
										<div class="large-6 small-6 columns">
      									<label>Data de Término da Inscrição<font>*</font>:<br>
        										<input type="date" placeholder="large-4.columns"/>		
      									</label>
      								</div>
    								</div>
    								<div class="row">
   									<div class="large-12 medium-12 small-12 columns">
      									<label>Pagamento<font>*</font>: </label>
      										<input type="checkbox" name="Gratuito" value="Gratuito" id="Gratuito"><label for="gratuito">Gratuito</label>
      										<input type="checkbox" name="Pago" value="Pago" id="Pago"><label for="pago">Pago</label>
    									</div>
  									</div>
  									<div class="row collapse">		
  										<div class="large-3 small-2 columns">
      									<span class="prefix">http://</span>
    									</div>
    									<div class="large-9 small-10 columns">			
        										<input type="text" placeholder="URL gabarito Atividade..." />			
      								</div>
      								<div class="large-3 small-2 columns">
      									<span class="prefix">http://</span>
    									</div>
    									<div class="large-9 small-10 columns">			
        										<input type="text" placeholder="URL gabarito Evento..." />			
      								</div>
      								<div class="large-3 small-2 columns">
      									<span class="prefix">http://</span>
    									</div>
    									<div class="large-9 small-10 columns">			
        										<input type="text" placeholder="URL imagem Evento..." />			
      								</div>
      								<div class="large-3 small-2 columns">
      									<span class="prefix">http://</span>
    									</div>
    									<div class="large-9 small-10 columns">			
        										<input type="text" placeholder="URL do site..." />			
      								</div>
    								</div>
    								<div class="row">
										<div class="large-12 small-12 columns">
      									<label>Dias limite para Pagamento<font>*</font>:<br>
        										<input type="text" placeholder="Dias" />		
      									</label>
    									</div>
    									<div class="large-12 medium-12 small-12 columns">
    										<font>(*)Campos Obrigatórios</font>	
    									</div>									
									</div>
							</fieldset>		
						</form>		
    								<div class="row">
										<div class="large-12 medium-12 small-12 columns">
											<div class="large-4 medium-4 small-4 columns">	
												<p></p>
											</div>
											<div class="large-4 medium-4 small-4 columns">
												<p></p>
											</div>
											<div class="large-3 medium-3 small-3 columns">
												<input type="submit" name="salvar" value="Salvar" class="success button expand salvar" />
											</div>
										</div>	
									</div>	
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
