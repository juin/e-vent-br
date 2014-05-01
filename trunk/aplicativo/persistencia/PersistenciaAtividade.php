<?
require_once (FACHADAS.'FachadaConectorBD.php');
require_once(CLASSES . 'Atividade.php');
require_once(CLASSES . 'AtividadeAgenda.php');
require_once(CLASSES . 'AtividadeValor.php');
require_once(CLASSES . 'Usuario.php');
require_once(PERSISTENCIAS . 'PersistenciaLocal.php');

class PersistenciaAtividade extends InstanciaUnica{
	
	public function selecionarTiposAtividadePorEvento($cod_evento){
		$atividades_tipo = NULL;
		$sql = "SELECT at.cod_atividade_tipo, at.nome, av.cod_evento, av.valor_estudante, 
		av.valor_professor, av.valor_profissional_outros
		FROM Atividade_Tipo at, Atividade_Valor av
		WHERE at.cod_atividade_tipo = av.cod_atividade_tipo
		AND av.cod_evento =".$cod_evento;
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$atividades_tipo[$i] = new AtividadeValor();
				$atividades_tipo[$i]->setCodAtividadeTipo($registro["cod_atividade_tipo"]);
				$atividades_tipo[$i]->setCodEvento($registro["cod_evento"]);
				$atividades_tipo[$i]->setValorEstudante($registro["valor_estudante"]);
				$atividades_tipo[$i]->setValorProfessor($registro["valor_professor"]);
				$atividades_tipo[$i]->setValorProfissionalOutros($registro["valor_profissional_outros"]);
				$atividades_tipo[$i]->setNome($registro["nome"]);
				$i++;
			}
		}
		return $atividades_tipo;	
	}	
}
?>