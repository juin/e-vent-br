<?php
	require_once(dirname(__FILE__).'/../../config.php');
	require_once(dirname(__FILE__).'/../../utilidades.php');
	require_once (APRESENTACAO . 'cabecalho.php');
	require_once (FACHADAS.'FachadaEvento.php');
	require_once (FACHADAS.'FachadaAtividade.php');
	require_once (FACHADAS.'FachadaLocal.php');
	
	$atividadesPost = $_POST['atividades'];
	$cod_evento = $_POST['cod_evento'];
	
	echo "<h1>Listagem de Atividades Selecionadas</h1>";
	echo "<h3>Evento: ".
		 FachadaEvento::getInstancia()->listarEventoPorCodigo($cod_evento)->getNome();
	echo "</h3><br/>";
	$valor_total_inscricao = 0;
	//Lista os valores das atividades desse evento
	$valoresAtividades = FachadaAtividade::getInstancia()->
	listarTiposAtividadePorEvento($cod_evento);
	
?>
	<form action="inscricao.php" method="post">
		<?php
			echo "<b>Atividades Selecionadas ( Valor com base na sua categoria atual: ".$usuarioLogado->getCategoria()." ):</b><br>";
			
			if ($atividadesPost!=null) {
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
					
					echo $atividade->getNome() . " R$: ".$valor."<br>";
					echo '<input type="hidden" value="'.$atividade->getCodAtividade().'" name="atividades[]" /><br>';
									
					if($atividadeAgenda!=null){
						foreach ($atividadeAgenda as $agenda) {
							if(!is_null($agenda->getCodLocal())){
								$local = FachadaLocal::getInstancia()->listarLocalPorCodigo($agenda->getCodLocal());
							} else{
								$local->setNome("Não Definido.");
							}						
							echo "Data: ".arrumaData($agenda->getData())." | Horario Inicio: ".$agenda->getHorarioInicio()."| Horario Fim: ".
									  $agenda->getHorarioFim()."| Local: ".$local->getNome()."<br/>";
						}
						echo "<br><br>";
					} else{
						echo "Nenhuma Agenda cadastrada para essa atividade<br><br>";
					}
				}
		?>
		<br><h3>Valor total a pagar: R$ <? echo $valor_total_inscricao; ?></h3>
		
		<br><h3>Selecione a forma de pagamento</h3>
		<select name="forma_pagamento">
			<option value="INSCRICAO_FORMA_PGTO_VISTA">A VISTA</option>
			<option value="INSCRICAO_FORMA_PGTO_DEPOSITO">DEPOSITO</option>
		</select>
		<br><br>
		<? 
			echo "<a href=\"javascript:window.history.go(-1)\">&laquo;Voltar</a>";
			echo "<input type=\"submit\" value=\"Avancar\" />";
		?>
		<input type="hidden" value="<?php echo $cod_evento;?>" name="cod_evento" />
	</form>
	<?
	} else {
		echo "Escolha pelo menos um minicurso.";
		echo "<a href=\"javascript:window.history.go(-1)\">&laquo;Voltar</a>";
		}
	?>
