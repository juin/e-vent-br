<?php
	require_once(dirname(__FILE__).'/../../config.php');
	require_once(dirname(__FILE__).'/../../utilidades.php');
	require_once (APRESENTACAO . 'cabecalho.php');
	require_once (FACHADAS.'FachadaEvento.php');
	require_once (FACHADAS.'FachadaAtividade.php');
	require_once (FACHADAS.'FachadaLocal.php');
	require_once (FACHADAS.'FachadaInscricao.php');
	
	$atividadesPost = $_POST['atividades'];
	$cod_evento = $_POST['cod_evento'];
	
	//echo "<h1>Listagem de Atividades Selecionadas</h1>";
	//echo "<h3>Evento: ".
		 FachadaEvento::getInstancia()->listarEventoPorCodigo($cod_evento)->getNome();
	//echo "</h3><br/>";
	$valor_total_inscricao = 0;
	//Lista os valores das atividades desse evento
	$valoresAtividades = FachadaAtividade::getInstancia()->
	listarTiposAtividadePorEvento($cod_evento);
	
?>
<div class="row menu-esquerdo">	
		<? require_once(APRESENTACAO.'menu_esquerdo.php'); ?>
		<br>
		<div class="painel-informacoes">
	
	<form action="inscricao.php" method="post">
		<div class="large-9 medium-9 small-9 columns">
				<div class="panel">
					
		<?php		
			if ($atividadesPost!=null) {
			
			echo "<h2>Confirme os dados da sua inscrição!</h2>";
			
			$ultima_inscricao = FachadaInscricao::getInstancia()->
			listarUltimaInscricaoValidaPorUsuarioPorEvento($usuarioLogado->getCodUsuario(),$cod_evento);
			
			
			if($ultima_inscricao != null){
				echo "<p>Você já está inscrito nesse evento!
						Se continuar, sua inscrição anterior será cancelada.<br>
						<b>Código/Status da última inscrição: ".
						$ultima_inscricao[0]->getCodInscricao()." | ".$ultima_inscricao[0]->getStatus()."</b></p>";
				echo '<input type="hidden" value="'.$ultima_inscricao[0]->getCodInscricao().'" name="cod_ultima_inscricao" id="cod_ultima_inscricao" />';
			}
			
			echo "<p>Atividades Selecionadas ( Valor com base na sua categoria atual:<b> ".$usuarioLogado->getCategoria()." ):</b></p>";
			echo "<ul>";
				foreach ($atividadesPost as $atividadePost){
					$atividade = FachadaAtividade::getInstancia()->
					listarAtividadePorCodigo($atividadePost[0]);
					
					//Inicializa variavel com valor da atividade:
					$valor = 0;
					//Incrementa valor total com base na categoria do usuario logado e tipo de atividade
					foreach ($valoresAtividades as $valorAtividade) {
							
						if ($valorAtividade->getCodAtividadeTipo()==$atividade->getcodAtividadeTipo()) {
							switch ($usuarioLogado->getCategoria()) {
								case 'Estudante':
									$valor_total_inscricao = $valor_total_inscricao +
									$valorAtividade->getValorEstudante();
									$valor = $valorAtividade->getValorEstudante();								
									break;
								case 'Professor':
									$valor_total_inscricao = $valor_total_inscricao +
									$valorAtividade->getValorProfessor();
									$valor = $valorAtividade->getValorProfessor();
									break;
								case 'Profissional/Outros':
									$valor_total_inscricao = $valor_total_inscricao +
									$valorAtividade->getValorProfissionalOutros();
									$valor = $valorAtividade->getValorProfissionalOutros();
									break;
								default:
									echo "Nenhuma categoria definida.";
								break;
							}	
							
						}
						
					}
					
					$atividadeAgenda = FachadaAtividade::getInstancia()->
					listarAtividadeAgendaPorCodigoAtividade($atividade->getCodAtividade());
					
					echo "<li><p>" . utf8_encode($atividade->getNome()) . "<br><b>Valor: R$ ".$valor."</b></p></li>";
					echo '<input type="hidden" value="'.$atividade->getCodAtividade().'" name="atividades[]" />';
									
					if($atividadeAgenda!=null){
						echo "<ul><p><b>Agenda:</b></p>";
						foreach ($atividadeAgenda as $agenda) {
							if(!is_null($agenda->getCodLocal())){
								$local = FachadaLocal::getInstancia()->listarLocalPorCodigo($agenda->getCodLocal());
							} else{
								$local->setNome("Não Definido.");
							}						
							echo "<li>Data: ".arrumaData($agenda->getData())." | Horario Inicio: ".$agenda->getHorarioInicio()."| Horario Fim: ".
									  $agenda->getHorarioFim()."| Local: ".utf8_encode($local->getNome())."</li>";
						}
						echo "</ul>";
					} else{
						echo "Nenhuma Agenda cadastrada para essa atividade<br><br>";
					}
				}
			echo "</ul>";
		?>
		<br><h3>Valor total a pagar: <b>R$ <? echo number_format($valor_total_inscricao,2,",","."); ?></b></h3>
		
		<br><h3>Forma de pagamento Selecionado: <?php
			if($_POST['forma_pagamento']=="vista"){
				echo "<b>À Vista</b>";
				echo '<input type="hidden" value="vista" name="forma_pagamento" />';
			} else if($_POST['forma_pagamento']=="deposito"){
				echo "<b>Depósito</b>";
				echo '<input type="hidden" value="deposito" name="forma_pagamento" />';
			}; ?></h3>

		
		<br><br>
		<? 
			echo "<a href=\"javascript:window.history.go(-1)\">&laquo;Voltar</a>";
			echo "<input type=\"submit\" value=\"Avancar\" />";
		?>
		<input type="hidden" value="<?php echo $cod_evento;?>" name="cod_evento" />
		</div><!-- PANEL -->
	</div>
	</form>
	<?
	} else {
		echo "<h3>Escolha pelo menos um minicurso.</h3>";
		echo "<a href=\"javascript:window.history.go(-1)\">&laquo;Voltar</a>";
		}
	?>
</div>
</div>
<? require_once(APRESENTACAO.'rodape.php');?>
