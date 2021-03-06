<?php
    require_once (dirname(__FILE__) . '/../../../config.php');
require_once (APRESENTACAO . 'cabecalho.php');
require_once (FACHADAS . 'FachadaEvento.php');
require_once (FACHADAS . 'FachadaAtividade.php');
require_once(UTILIDADES);

if (isPostBack()) {
	
	$atividade = $_POST;
		
	$incluir_atividade = new Atividade();
	$incluir_atividade->setNome($atividade['nome']);
	$incluir_atividade->setResumo($atividade['resumo']);
	$incluir_atividade->setConhecimentoAprendido($atividade['conhecimento_aprendido']);
	$incluir_atividade->setConteudoProgramatico($atividade['conteudo_programatico']);
	$incluir_atividade->setPreRequisito($atividade['prerequisito']);
	$incluir_atividade->setPublicoAlvo($atividade['publico_alvo']);
	$incluir_atividade->setFerramenta($atividade['ferramenta']);
	$incluir_atividade->setCargaHoraria($atividade['carga_horaria']);
	$incluir_atividade->setVagas($atividade['vagas']);
	$incluir_atividade->setObservacao($atividade['observacao']);
	$incluir_atividade->setTipoFrequencia($atividade['tipo_frequencia']);
	$incluir_atividade->setStatus($atividade['status']);
	$incluir_atividade->setcodAtividadeTipo($atividade['cod_atividade_tipo']);
	$incluir_atividade->setCodEvento($atividade['cod_evento']);
	
	
	if (is_int(FachadaAtividade::getInstancia()->criarAtividade($incluir_atividade))){
		header('location: '.URL.'apresentacao/Evento/gerencia_evento.php?cod_evento='.$atividade['cod_evento']);
	}
	
}else{
	$cod_evento = $_GET['cod_evento'];
}
?>
<div class="row">	
		<div class="large-3 medium-3 small-3 columns">
		</div>
			<div class="large-7 medium-7 small-7 columns">		
				<div class="row gerenciamento-usuario-titulo">
					<h2>Adicionar Atividade</h2>
				</div>
			</div>
</div>
<div class="row corpo">	
		<? require_once(APRESENTACAO.'menu_esquerdo.php'); ?>
		
		<div class="large-9 medium-9 small-9 columns">
			<div class="panel">
				<form class="form-cadastro" action="atividade_criar.php" method="post">
								<fieldset>
									<legend>Dados da Atividades</legend>
										<div class="row">
											<div class="large-12 small-12 columns">
	      									<label>Nome da Atividade<font>*</font>:<br>
	        										<input id="nome" name="nome" type="text" placeholder="Informe o título da Atividade"/>		
	      									</label>
    										</div>								
										</div>
										<div class="row">
											<div class="large-12 small-12 columns">
      										<label>Resumo<font>*</font>:<br>
        											<textarea rows="4" cols="50" id="resumo" name="resumo" title="Resumo" placeholder="Resumo sobre a atividade">
        												
        											</textarea>
      										</label>
    										</div>								
										</div>
										<div class="row">
											<div class="large-6 small-6 columns">
      										<label>Conhecimento Aprendido<font>*</font>:<br>
        											<textarea rows="4" cols="50" id="conhecimento_aprendido" name="conhecimento_aprendido"/>
        											</textarea>		
      										</label>
      									</div>																
											<div class="large-6 small-6 columns">
      										<label>Conteúdo Programático<font>*</font>:<br>
        											<textarea id="conteudo_programatico" name="conteudo_programatico"></textarea>		
      										</label>
      									</div>
    									</div>
    									<div class="row">
											<div class="large-6 small-6 columns">
	      										<label>Pré-requisitos<font>*</font>:<br>
	        											<textarea id="prerequisito" name="prerequisito"></textarea>		
	      										</label>
      										</div>																
											<div class="large-6 small-6 columns">
		      									<label>Público Alvo<font>*</font>:<br>
		        										<textarea id="publico_alvo" name="publico_alvo"></textarea>
		      									</label>
	      									</div>
    									</div>
    									<div class="row">
											<div class="large-12 small-12 columns">
		      									<label>Ferramenta<font>*</font>:<br>
		        										<input id="ferramenta" name="ferramenta" type="text" placeholder="Ferramenta"/>		
		      									</label>
	    									</div>
										</div>
										<div class="row">
											<div class="large-6 small-6 columns">
		      									<label>Carga-Horária<font>*</font>:<br>
		        										<input id="carga_horaria" name="carga_horaria" type="text" placeholder="Carga Horária"/>		
		      									</label>
	    									</div>
	    									<div class="large-6 small-6 columns">
		      									<label>Vagas<font>*</font>:<br>
		        										<input id="vagas" name="vagas" type="text" placeholder="Vagas"/>		
		      									</label>
	    									</div>
										</div>
										<div class="row">
											<div class="large-12 small-12 columns">
	      										<label>Observação<font>*</font>:<br>
	        											<textarea rows="4" cols="50" id="observacao" name="observacao" title="Observação" placeholder="Observação">
	        											</textarea>
	      										</label>
    										</div>						
										</div>
										<div class="row">
											<div class="large-6 small-6 columns">
	      										<label>Tipo Frequência<font>*</font>:<br>
	        										<select id="tipo_frequencia" name="tipo_frequencia">
	        											<option value="Evento">Evento</option>
	        											<option value="Atividade">Atividde</option>
	        										</select>
	      										</label>
    										</div>
    										<div class="large-6 small-6 columns">
		      									<label>Status<font>*</font>:<br>
	        										<select id="status" name="status">
	        											<option value="Confirmada">Confirmada</option>
	        											<option value="Cancelada">Cancelada</option>
        											</select>		
		      									</label>
	    									</div>						
										</div>
									<div class="row">
										<div class="large-12 small-12 columns">
	      									<label>Tipo de Atividade<font>*</font>:<br>
	        									<select id="cod_atividade_tipo" name="cod_atividade_tipo">
	        											<option value="1">Minicurso</option>
	        											<option value="2">Palestra</option>
        										</select>			
	      									</label>
    									</div>
    									<div class="large-12 medium-12 small-12 columns">
    										<font>(*)Campos Obrigatórios</font>	
    									</div>									
									</div>
							</fieldset>		
						    		<div class="row">
										<div class="large-9 medium-9 small-9 columns">
											<? echo "<a href=\"javascript:window.history.go(-1)\" class=\"voltar right\" \">&laquo;Voltar</a>"; ?>
										</div>
										<div class="large-3 medium-3 small-3 columns right">
											<input type="hidden" id="cod_evento" name="cod_evento" value="<? echo $cod_evento; ?>" />
											<input type="submit" name="salvar" value="Salvar" class="success button expand salvar" />
										</div>
									</div>
						</form>
			</div>
		</div>
		
</div>
<? require_once(APRESENTACAO.'rodape.php');?>