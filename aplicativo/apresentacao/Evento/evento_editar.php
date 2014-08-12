<?php
    require_once (dirname(__FILE__) . '/../../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once (FACHADAS . 'FachadaEvento.php');
require_once (FACHADAS . 'FachadaAtividade.php');
require_once(UTILIDADES);

if (isPostBack()) {
	
	
	$evento = $_POST;
	$cod_evento = $_POST['cod_evento'];
	
	$atualizar_evento = new Evento();
	
	$atualizar_evento->setCodEvento($evento['cod_evento']);
	$atualizar_evento->setNome($evento['nome']);
	$atualizar_evento->setSigla($evento['sigla']);
	$atualizar_evento->setDataInicioEvento($evento['data_inicio_evento']);
	$atualizar_evento->setDataFimEvento($evento['data_fim_evento']);
	$atualizar_evento->setDataInicioInscricao($evento['data_inicio_inscricao']);
	$atualizar_evento->setDataFimInscricao($evento['data_fim_inscricao']);
	$atualizar_evento->setPagamento($evento['pagamento']);
	$atualizar_evento->setUrlGabaritoAtividade($evento['url_gabarito_atividade']);
	$atualizar_evento->setUrlGabaritoEvento($evento['url_gabarito_evento']);
	$atualizar_evento->setUrlImagem($evento['url_imagem']);
	$atualizar_evento->setUrlSite($evento['url_site']);
	$atualizar_evento->setDiasLimitePagamento($evento['dias_limite_pagamento']);
	
	if(FachadaEvento::getInstancia()->alterarEvento($atualizar_evento) >= 0){
		header('location: '.URL.'apresentacao/Evento/gerencia_evento.php?cod_evento='.$cod_evento.'.php');
	}
	
	} else {
		$cod_evento = $_GET['cod_evento'];
	}
?>
<div class="row">	
		<div class="large-3 medium-3 small-3 columns">
		</div>
			<div class="large-7 medium-7 small-7 columns">		
				<div class="row gerenciamento-usuario-titulo">
					<h2>Editar Evento</h2>
				</div>
			</div>
</div>
<div class="row corpo">	
		<? require_once(APRESENTACAO.'menu_esquerdo.php'); ?>
		
		<div class="large-9 medium-9 small-9 columns">
			<div class="panel">
				<form class="form-cadastro" action="evento_editar.php" method="post">
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
        										<input id="nome" name="nome" type="text" placeholder="Informe o nome do evento" value="<? echo utf8_encode($evento->getNome()); ?>"/>		
      									</label>
    										</div>								
										</div>
										<div class="row">
											<div class="large-12 small-12 columns">
      										<label>Sigla<font>*</font>:<br>
        											<input id="sigla" name="sigla" type="text" placeholder="Digite uma sigla" value="<? echo utf8_encode($evento->getSigla()); ?>" />		
      										</label>
    										</div>								
										</div>
										<div class="row">
											<div class="large-6 small-6 columns">
      										<label>Data de Início<font>*</font>:<br>
        											<input id="data_inicio_evento" name="data_inicio_evento" type="date" value="<? echo $evento->getDataInicioEvento(); ?>"/>		
      										</label>
      									</div>																
											<div class="large-6 small-6 columns">
      										<label>Data de Término<font>*</font>:<br>
        											<input id="data_fim_evento" name="data_fim_evento" type="date" value="<? echo $evento->getDataFimEvento(); ?>"/>		
      										</label>
      									</div>
    									</div>
    									<div class="row">
											<div class="large-6 small-6 columns">
      										<label>Data de Início da Inscrição<font>*</font>:<br>
        											<input id="data_inicio_inscricao" name="data_inicio_inscricao" type="date" value="<? echo $evento->getDataInicioInscricao(); ?>"/>		
      										</label>
      									</div>																
										<div class="large-6 small-6 columns">
      									<label>Data de Término da Inscrição<font>*</font>:<br>
        										<input id="data_fim_inscricao" name="data_fim_inscricao" type="date" value="<? echo $evento->getDataFimInscricao(); ?>"/>		
      									</label>
      								</div>
    								</div>
    								<div class="row">
   									<div class="large-12 medium-12 small-12 columns">
      									<label>Pagamento<font>*</font>: </label>
      										<input type="radio" name="pagamento" value="Gratuito" id="pagamento"><label for="gratuito">Gratuito</label>
      										<input type="radio" name="pagamento" value="Pago" id="pagamento"><label for="pago">Pago</label>
    									</div>
  									</div>
  									<div class="row collapse">		
  										<div class="large-3 small-2 columns">
      										<span class="prefix">http://</span>
    									</div>
    									<div class="large-9 small-10 columns">			
        										<input id="url_gabarito_atividade" name="url_gabarito_atividade" type="text" placeholder="URL gabarito Atividade..." value="<? echo $evento->getUrlGabaritoAtividade(); ?>"/>			
      								</div>
      									<div class="large-3 small-2 columns">
      										<span class="prefix">http://</span>
    									</div>
    									<div class="large-9 small-10 columns">			
        										<input id="url_gabarito_evento" name="url_gabarito_evento" type="text" placeholder="URL gabarito Evento..." value="<? echo $evento->getUrlGabaritoEvento(); ?>"/>			
      								</div>
      									<div class="large-3 small-2 columns">
      										<span class="prefix">http://</span>
    									</div>
    									<div class="large-9 small-10 columns">			
        										<input id="url_imagem" name="url_imagem" type="text" placeholder="URL imagem Evento..." value="<? echo $evento->getUrlImagem(); ?>"/>			
      								</div>
      									<div class="large-3 small-2 columns">
      										<span class="prefix">http://</span>
    									</div>
    									<div class="large-9 small-10 columns">			
        										<input id="url_site" name="url_site" type="text" placeholder="URL do site..." value="<? echo $evento->getUrlSite(); ?>"/>			
      								</div>
    								</div>
    								<div class="row">
										<div class="large-12 small-12 columns">
      									<label>Dias limite para Pagamento<font>*</font>:<br>
        										<input id="dias_limite_pagamento" name="dias_limite_pagamento" type="text" placeholder="Dias" value="<? echo $evento->getDiasLimitePagamento(); ?>"/>		
      									</label>
    									</div>
    									<div class="large-12 medium-12 small-12 columns">
    										<font>(*)Campos Obrigatórios</font>	
    									</div>									
									</div>
							</fieldset>		
						    		<div class="row">
										<div class="large-3 medium-3 small-3 columns right">
											<input type="hidden" id="cod_evento" name="cod_evento" value="<? echo $evento->getCodEvento(); ?>" />
											<input type="submit" name="salvar" value="Salvar" class="success button expand salvar" />
										</div>
									</div>
						</form>
			</div>
		</div>
		
</div>
<? require_once(APRESENTACAO.'rodape.php');?>