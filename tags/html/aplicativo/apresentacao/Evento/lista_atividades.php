<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once(dirname(__FILE__).'/../../utilidades.php');
require_once(FACHADAS.'FachadaEvento.php');
require_once(FACHADAS.'FachadaAtividade.php');
require_once(FACHADAS.'FachadaLocal.php');

$cod_evento = $_GET['cod_evento'];
?>
<h1>Atividades de <?php echo FachadaEvento::getInstancia()->listarEventoPorCodigo($cod_evento)->getNome();?></h1>
<form method="post" action="confirmacao_evento.php">
	<?php 
		echo "Tabela de Preços:<br><br>";
		$atividades_tipo = FachadaAtividade::getInstancia()->listarTiposAtividadePorEvento($cod_evento);
		if($atividades_tipo!=null){
			foreach ($atividades_tipo as $atividade_tipo) {
				echo $atividade_tipo->getNome() .": ". $atividade_tipo->getValorEstudante() ."<br><br>";
			}
		}else{
			echo "Nenhuma tipo de atividade cadastrada para esse evento.<br><br>";
		}
		echo "------------------------------<br>";
		echo "Lista de Atividades:<br><br>";
		$atividades = FachadaAtividade::getInstancia()->listarAtividadesPorCodigoEvento($cod_evento);
		if($atividades!=null){
			foreach ($atividades as $atividade){
				
				//Vou implementar essa linha aqui agora
				$vagas_disponiveis =  FachadaAtividade::getInstancia()->listarVagasDisponiveisPorAtividade($atividade->getCodAtividade());
				if ($vagas_disponiveis > 0)
				{ 
					echo '<input type="checkbox" name="atividades[]" value="'.$atividade->getCodAtividade().'">'.
							$atividade->getNome()." | Carga Horária: ".$atividade->getCargaHoraria()."h | Total de vagas: ".
						  $atividade->getVagas()." | Vagas disponiveis: ".$vagas_disponiveis."<br/>";
				}
				else 
				{
					echo $atividade->getNome()." | Carga Horária: ".$atividade->getCargaHoraria()."h | Total de vagas: ".
						  $atividade->getVagas()." | ESGOTADO! <br/>";
				}
				
				$atividadeAgenda = FachadaAtividade::getInstancia()->
				listarAtividadeAgendaPorCodigoAtividade($atividade->getCodAtividade());
				
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
			<br><br>
			<input type="hidden" name="cod_evento" value="<?php echo $cod_evento;?>">
			<input type="submit" value="Inscrever">	
		<? } else{
			echo "<br>Nenhuma atividade cadastrada.";
			echo "<a href=\"javascript:window.history.go(-1)\">&laquo;Voltar</a>";
			} 
		?>
	
</form>