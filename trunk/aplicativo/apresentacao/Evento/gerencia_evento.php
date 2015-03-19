<?php
require_once (dirname(__FILE__) . '/../../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once (PERSISTENCIAS . 'PersistenciaEvento.php');
require_once (PERSISTENCIAS . 'PersistenciaAtividade.php');
require_once (PERSISTENCIAS . 'PersistenciaInscricao.php');
require_once (PERSISTENCIAS . 'PersistenciaUsuario.php');
require_once (UTILIDADES);

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
					<dl class="tabs" data-tab data-options="deep_linking:true">
  						<dd class="tab-title active"><a href="#tab-evento-1">Evento</a></dd>
  						<dd class="tab-title"><a href="#tab-evento-2">Atividades</a></dd>
  						<dd class="tab-title"><a href="#tab-evento-3">Programação</a></dd>
  						<dd class="tab-title"><a href="#tab-evento-4">Inscrições</a></dd>
					</dl>
					<div class="tabs-content">
  						<div class="content active" id="tab-evento-1">
  							<fieldset>
  								<? $evento = PersistenciaEvento::getInstancia()->
											selecionarEventoPorCodigo($cod_evento); ?>
  								<legend>Dados do Evento</legend>
	  							<p><b>Nome:</b> <? echo utf8_encode($evento->getNome()); ?></p>
	  							<p><b>Sigla:</b> <? echo utf8_encode($evento->getSigla()); ?></p>
	  							<p><b>Ínicio:</b> <? echo arrumaData($evento->getDataInicioEvento()); ?> 
	  								<b>Fim:</b> <? echo arrumaData($evento->getDataFimEvento()); ?></p>
	  							<p><b>Ínicio das inscrições:</b> <? echo arrumaData($evento->getDataInicioInscricao()); ?> 
	  								<b>Fim das Inscrições:</b> <? echo arrumaData($evento->getDataFimInscricao()); ?></p>
	  							<p><b>Status:</b> <? echo utf8_encode($evento->getStatus()); ?></p>
	  							<p><b>Pagamento:</b> <? echo utf8_encode($evento->getPagamento()); ?></p>
	  							<p><b>URL Gabarito Atividade:</b> <a href="http://<? echo $evento->getUrlGabaritoAtividade(); ?>" target="_blank">http://<? echo $evento->getUrlGabaritoAtividade(); ?></a></p>
	  							<p><b>URL Gabarito Evento:</b> <a href="http://<? echo $evento->getUrlGabaritoEvento(); ?>" target="_blank">http://<? echo $evento->getUrlGabaritoEvento(); ?></a></p>
	  							<p><b>URL Logo Evento:</b> <a href="http://<? echo $evento->getUrlImagem(); ?>" target="_blank">http://<? echo $evento->getUrlImagem(); ?></a></p>
	  							<p><b>Site:</b> <a href="http://<? echo $evento->getUrlSite(); ?>" target="_blank">http://<? echo $evento->getUrlSite(); ?></a></p>
	  							<p><b>Dias limite para pagamento:</b> <? echo $evento->getDiasLimitePagamento(); ?></p>
  							</fieldset>
  							<div class="row">
								<div class="large-3 medium-3 small-3 columns right">
  									<a href="<?echo URL;?>apresentacao/Evento/evento_editar.php?cod_evento=<?echo $cod_evento;?>" class="success button expand salvar">Editar Evento</a>
  								</div>
  							</div>
  						</div>
  						<div class="content" id="tab-evento-2">
    						<br>
								<fieldset>
									<legend>Atividades</legend>
									<p>Clique no título da atividade para lançar a frequência.</p>
									<? $atividades = PersistenciaAtividade::getInstancia()->
									selecionarAtividadesPorCodigoEvento($cod_evento);
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
													<tr class="<? echo $atividade->getStatus(); ?>">
													<td><? echo $atividade->getCodAtividade();?></td>
													<td><? echo utf8_encode($atividade->getNome());?></td>
													<td>
														<a href="<?echo URL;?>apresentacao/Evento/atividades/atividade_editar.php?cod_evento=<? echo $cod_evento; ?>&cod_atividade=<? echo $atividade->getCodAtividade(); ?>">Editar</a>
														 | 
														<a href="#">Cancelar</a>
													</td>
													</tr>
												<?}?>
										  </tbody>
										</table>
										
								  	<?}?>
								</fieldset>
								<div class="row">
								<div class="large-3 medium-3 small-3 columns right">
  									<a href="<?echo URL;?>apresentacao/Evento/atividades/atividade_criar.php?cod_evento=<? echo $cod_evento; ?>" class="success button expand salvar">Adicionar Atividade</a>
  								</div>
  							</div>		
  						</div>
  						<div class="content" id="tab-evento-3">
    						<p>Third panel content goes here...</p>
  						</div>
  						<div class="content" id="tab-evento-4">
							<fieldset>
								
									<?
										$inscricoes = PersistenciaInscricao::getInstancia()->selecionarInscricoesPorEvento($cod_evento);
									?>
									<input type="checkbox" name="inscricaoStatus" id="inscricaoStatus" value="Em Andamento"/>Em Andamento
									<input type="checkbox" name="inscricaoStatus" id="inscricaoStatus" value="Confirmada"/>Confirmada
									<input type="checkbox" name="inscricaoStatus" id="inscricaoStatus" value="Cancelada"/>Cancelada
									<div class="lista-inscricoes">
										<table>
											<thead>
												<th>Código</th>
												<th>Participante</th>
												<th>Data/Hora</th>
												<th>Status</th>
											</thead>
											<tbody>
												<? if($inscricoes!=NULL){
													foreach($inscricoes as $inscricao){?>
												<tr>
													<td><? echo $inscricao->getCodInscricao(); ?></td>
													<? $usuario = PersistenciaUsuario::getInstancia()->selecionarPorCodigo($inscricao->getCodUsuario());?>
													<td><? echo $usuario[0]->getNomeCertificado(); ?></td>
													<td><? echo $inscricao->getDataHoraInscricao(); ?></td>
													<td><? echo $inscricao->getStatus(); ?></td>
												</tr>
												<?	}
												}?>
											</tbody>
										</table>
									</div>
								
							</fieldset>
  						</div>
					</div>		
				</div>				
			</div>
		</div>
 	</div>
 <? require_once(APRESENTACAO.'rodape.php');?>
