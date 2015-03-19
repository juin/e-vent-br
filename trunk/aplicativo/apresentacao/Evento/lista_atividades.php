<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once(APRESENTACAO.'cabecalho.php');
require_once(dirname(__FILE__).'/../../utilidades.php');
require_once(PERSISTENCIAS.'PersistenciaEvento.php');
require_once(PERSISTENCIAS.'PersistenciaAtividade.php');
require_once(PERSISTENCIAS.'PersistenciaLocal.php');
require_once(PERSISTENCIAS.'PersistenciaUsuario.php');

$cod_evento = $_GET['cod_evento'];
$evento = PersistenciaEvento::getInstancia()->selecionarEventosPorCodigo($cod_evento);
$usuario = PersistenciaUsuario::getInstancia()->selecionarPorCodigo($usuarioLogado->getCodUsuario());
?>
<div class="row corpo">	
		<? require_once(APRESENTACAO.'menu_esquerdo.php'); ?>
		<br>
		<div class="painel-informacoes">
		<form method="post" action="confirmacao_evento.php">			
			<div class="large-9 medium-9 small-9 columns">
				<div class="panel">
  					<h5><?php echo utf8_encode($evento[0]->getNome());?></h5> 						
 				 		<p><? echo arrumaData($evento[0]->getDataInicioEvento());?> à <? echo arrumaData($evento[0]->getDataFimEvento());?> | <? echo arrumaData($evento[0]->getUrlSite());?></p>							 		
  					<div class="row informacoes-evento">
						<div class="large-12 medium-12 small-12 columns">
							<form class="form-cadastro">
								<div class="large-12 medium-12 small-12 columns">
									<fieldset>
										<legend>Informações do Inscrito</legend>
											<div class="row informacoes-inscrito">
												<div class="large-12 medium-12 small-12 columns">
													<p><span>Nome Completo:</span> <? echo $usuario[0]->getNomeCertificado();?><br>
											</div>
											<div class="large-12 medium-12 small-12 columns">
      										<label>Nome do Crachá:<br>
        											<input type="text" placeholder="<? echo $usuario[0]->getNomeCracha();?>" />		
      										</label>
    										</div>								
					 						</div>
					 				</fieldset>
					 			</div>	
							</form>
						</div>
					</div>
				</div>
		<div class="painel-categoria">
					<div class="large-12 large-centered medium-12 columns">
						<div class="row categoria">			
							<div class="panel">	 		
								<fieldset>
									<legend>Tabela de Preços (Categoria: <? echo $usuarioLogado->getCategoria();?>)</legend>
									<div class="large-12 large-centered medium-12 columns">
										<table>
										<?
										$atividades_tipo = PersistenciaAtividade::getInstancia()->selecionarTiposAtividadePorEvento($cod_evento);
										?>
											<thead>
    											<tr>
      											<th width="500">Tipo de atividade</th>
      											<th width="100">Valor</th>
    											</tr>
  											</thead>
  											<tbody>
  												<? if($atividades_tipo!=null){
													foreach ($atividades_tipo as $atividade_tipo) {?>
														<tr>
			      											<td><span><? echo $atividade_tipo->getNome(); ?></span></td>
			      											<td><span>R$ <? echo $atividade_tipo->getValorEstudante();?></span></td>
    													</tr>
													<?}
												}else{?>
													<tr>
		      											<td>Nenhuma Ativide cadastrada.</td>
		      											<td>R$ ----</td>
    												</tr>
												<?}?>
  										</tbody>
  									</table>	
  									</div>	
					 			</fieldset>	
							</div>		
						</div>
					</div>		
				</div>
				<div class="painel-atividades">
					<div class="large-12 large-centered medium-12 columns">
						<div class="row atividades">
							<?php 
								$atividades = PersistenciaAtividade::getInstancia()->selecionarAtividadesPorCodigoEvento($cod_evento);
							?>
							<div class="panel">	 		
								<fieldset>
									<legend>Atividades</legend>
									<div class="large-12 large-centered medium-12 columns">
										<table>
											<thead>
    											<tr>
    											<th></th>
      											<th>Atividades</th>
      											<th>Vagas</th>
    											</tr>
  											</thead>
  											<tbody>
  											<? if($atividades!=null){
  											foreach ($atividades as $atividade){
				
												$vagas_disponiveis =  PersistenciaAtividade::getInstancia()->selecionarVagasDisponiveisPorAtividade($atividade->getCodAtividade());
												if ($vagas_disponiveis > 0)
												{ 
													$atividadeAgenda = PersistenciaAtividade::getInstancia()->
													selecionarAtividadeAgendaPorCodigoAtividade($atividade->getCodAtividade());
													$title = null;
													if($atividadeAgenda!=null){
														foreach ($atividadeAgenda as $agenda) {
															if(!is_null($agenda->getCodLocal())){
																$local = PersistenciaLocal::getInstancia()->selecionarPorCodigo($agenda->getCodLocal());
															} else{
																$local->setNome("Não Definido.");
															}						
															$title .= "Data: ".arrumaData($agenda->getData())." | Horario Inicio: ".$agenda->getHorarioInicio()."| Horario Fim: ".
																	  $agenda->getHorarioFim()."| Local: ".utf8_encode($local[0]->getNome())."<br/>";
														}
													} else{
														$title = "Nenhuma Agenda cadastrada para essa atividade<br><br>";
													}
												?>
													<tr>
														<td>
															<input type="checkbox" id="atividades[]" name="atividades[]" value="<? echo $atividade->getCodAtividade(); ?>">
														</td>
		      											<td>
		      												<label data-tooltip class="has-tip" title="<? echo $title; ?>" ><? echo utf8_encode($atividade->getNome()); ?>(CH: <? echo $atividade->getCargaHoraria();?> h)</label>
		      											</td>
		      											<td><? echo $vagas_disponiveis[0];?></td>
	    											</tr>
												<? }
												else 
												{?>
													<tr>
		      											<td>
		      												<input type="checkbox" id="atividades[]" value="0" disabled>
		      												<label><? echo $atividade->getNome(); ?>(CH: <? echo $atividade->getCargaHoraria();?> h) ESGOTADO</label>
		      											</td>
		      											<td><? echo $vagas_disponiveis;?></td>
	    											</tr>
												<?}
											}
										 } else{
											echo "<tr><td>Nenhuma atividade cadastrada.</td></tr>";
											} 
										?>
  										</tbody>
  									</table>	
  									</div>	
					 			</fieldset>	
							</div>		
						</div>
					</div>		
				</div>
				<div class="painel-totalPagamento">
					<div class="large-12 large-centered medium-12 columns">
						<div class="row totalPagamento">			
							<div class="panel">	 		
								<fieldset>
									<legend>Total Pagamento</legend>
									<div class="large-12 large-centered medium-12 columns">
										<table>
    											<tr>
      											<th width="500"></th>
      											<th width="100"></th>
    											</tr>
  											<tbody>
  												<tr>
      											<td>Valor da Inscrição:</td>
      											<td>R$ 10,00</td>
    											</tr>
    											<tr>
      											<td>Atividades Adicionais:</td>
      											<td>R$ 25,00</td>
    											</tr>
    											<tr>
      											<td><span>Total:</span></td>
      											<td><span>R$ 35,00</span></td>
    											</tr>
  										</tbody>
  									</table>	
  									</div>	
					 			</fieldset>	
							</div>		
						</div>
					</div>		
				</div>
				<div class="painel-formaPagamento">
					<div class="large-12 large-centered medium-12 columns">
						<div class="row formaPagamento">			
							<div class="panel">	 		
								<fieldset>
									<legend>Formas de Pagamento</legend>
									<div class="large-12 large-centered medium-12 columns">
										<select name="forma_pagamento">
											<option value="vista">A VISTA</option>
											<option value="deposito">DEPOSITO</option>
										</select>
  									</div>	
					 			</fieldset>	
							</div>		
						</div>
					</div>		
				</div>
				<br>
				<div class="botao">
					<div class="large-12 medium-12 small-12 columns">
						<div class="large-3 medium-3 small-3 columns">	
							<p></p>
						</div>
						<div class="large-3 medium-3 small-3 columns">
							<p></p>
						</div>
						<div class="large-2 medium-2 small-2 columns">
							<p></p>
						</div>
						<div class="large-4 medium-4 small-4 columns">
							<input type="hidden" name="cod_evento" value="<?php echo $cod_evento;?>">
							<input type="submit" name="efetuar" value="Efetuar Inscrição" class="success button expand efetuar" />
						</div>			
				</div>	
			</div>
			</div>
			</form>
		</div><!-- painel-informacoes -->
	</div>
<? require_once(APRESENTACAO.'rodape.php');?>