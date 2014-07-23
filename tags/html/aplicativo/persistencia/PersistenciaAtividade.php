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
	
	public function selecionarAtividadesPorCodigoEvento($cod_evento){
		$atividades = NULL;	
		$sql = "SELECT a.cod_atividade, a.nome, a.status, a.carga_horaria, a.vagas,a.cod_atividade_tipo
		FROM Atividade a WHERE a.cod_evento =".$cod_evento;
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$atividades[$i] = new Atividade();
				$atividades[$i]->setCodAtividade($registro["cod_atividade"]);
				$atividades[$i]->setNome($registro["nome"]);
				$atividades[$i]->setCargaHoraria($registro["carga_horaria"]);
				$atividades[$i]->setStatus($registro["status"]);
				$atividades[$i]->setVagas($registro["vagas"]);
				$atividades[$i]->setCodAtividadetipo($registro["cod_atividade_tipo"]);
				$i++;
			}
		}
		return $atividades;
	}
	
	public function selecionarAtividadeAgendaPorCodigoAtividade($cod_atividade){
		$atividadesAgenda = NULL;
		$sql = "SELECT ag.cod_atividade_agenda, ag.data, ag.horario_inicio, ag.horario_fim, 
		ag.cod_local FROM Atividade a, Atividade_Agenda ag
		WHERE a.cod_atividade = ag.cod_atividade
		AND ag.cod_atividade =".$cod_atividade;
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$atividadesAgenda[$i] = new AtividadeAgenda();
				$atividadesAgenda[$i]->setCodAtividadeAgenda($registro["cod_atividade_agenda"]);
				$atividadesAgenda[$i]->setData($registro["data"]);
				$atividadesAgenda[$i]->setHorarioInicio($registro["horario_inicio"]);
				$atividadesAgenda[$i]->setHorarioFim($registro["horario_fim"]);
				$atividadesAgenda[$i]->setCodLocal($registro["cod_local"]);
				$i++;
			}
		}
		return $atividadesAgenda;	
	}
	
	public function selecionarVagasDisponiveisPorAtividade($cod_atividade){
    		$sql = "SELECT count(*) as quantidadeVagasOcupadas
    				FROM Inscricao i 
    				WHERE EXISTS (SELECT 1 FROM  Atividade_Agenda aa, Inscricao_Historico ih
    					WHERE aa.cod_atividade = '" . $cod_atividade . "'
    					AND ih.cod_atividade_agenda = aa.cod_atividade_agenda
    					AND i.cod_inscricao = ih.cod_inscricao)";
            $registro = FachadaConectorBD::getInstancia()->consultar($sql);
            // pesquisa nula indica que nao existem inscricoes para a atividade
            if (is_null($registro)) {
            	// deve retornar, neste caso, o total de vagas da atividade como todo
            	$sql = "SELECT a.vagas as quantidadeVagas
            			FROM Atividade a
						WHERE a.cod_atividade = '" . $cod_atividade . "'";
            	$registro = FachadaConectorBD::getInstancia()->consultar($sql);
            } else {
            	// do contrario, retorna o total de vagas previstas menos as que foram consumidas
            	$sql = "SELECT (a.vagas  - " . $registro[0][0] .
            		   ") as quantidadeVagas FROM Atividade a
						WHERE a.cod_atividade = '" . $cod_atividade . "'";
            	$registro = FachadaConectorBD::getInstancia()->consultar($sql);
            }

            return $registro[0];
    }

	public function selecionarAtividadesPorCodigo($cod_atividade){
		$atividades = NULL;
		$sql = "SELECT a.cod_atividade, a.nome, a.resumo, a.conhecimento_aprendido, a.conteudo_programatico,
		a.prerequisito, a.publico_alvo, a.ferramenta, a.carga_horaria, a.vagas, a.observacao, a.tipo_frequencia,
		a.cod_atividade_tipo
		 FROM Atividade a WHERE a.cod_atividade=".$cod_atividade;
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$atividades[$i] = new Atividade();
				$atividades[$i]->setCodAtividade($registro["cod_atividade"]);
				$atividades[$i]->setNome($registro["nome"]);
				$atividades[$i]->setResumo($registro["resumo"]);
				$atividades[$i]->setConhecimentoAprendido($registro["conhecimento_aprendido"]);
				$atividades[$i]->setConteudoProgramatico($registro["conteudo_programatico"]);
				$atividades[$i]->setPreRequisito($registro["prerequisito"]);
				$atividades[$i]->setPublicoAlvo($registro["publico_alvo"]);
				$atividades[$i]->setFerramenta($registro["ferramenta"]);
				$atividades[$i]->setCargaHoraria($registro["carga_horaria"]);
				$atividades[$i]->setVagas($registro["vagas"]);
				$atividades[$i]->setObservacao($registro["observacao"]);
				$atividades[$i]->setStatus($registro["tipo_frequencia"]);
				$atividades[$i]->setCodAtividadetipo($registro["cod_atividade_tipo"]);
				$i++;
			}
		}
		return $atividades;
	}

	public function selecionarAgendasPorCodigo($cod_atividade_agenda){
		$agendas = NULL;
		$sql = "SELECT ag.cod_atividade_agenda, ag.data, ag.horario_inicio, 
		ag.horario_fim, ag.cod_local, ag.cod_atividade FROM Atividade_Agenda ag 
		WHERE ag.cod_atividade_agenda=".$cod_atividade_agenda;
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$local = null;
				$cod_local = $registro["cod_local"];
				if (!is_null($cod_local)) {
					$locais = PersistenciaLocal::getInstancia()->selecionarPorCodigo($cod_local);
					if(!is_null($locais)){
						$local = $locais[0];
					}
				}
				$atividades_agendadas[$i] = new AtividadeAgenda();
				$atividades_agendadas[$i]->setCodAtividadeAgenda($registro["cod_atividade_agenda"]);
				$atividades_agendadas[$i]->setData($registro["data"]);
				$atividades_agendadas[$i]->setHorarioInicio($registro["horario_inicio"]);
				$atividades_agendadas[$i]->setHorarioFim($registro["horario_fim"]);
				$atividades_agendadas[$i]->setCodAtividade($registro["cod_atividade"]);
				$atividades_agendadas[$i]->setCodLocal($registro["cod_local"]);
				$i++;
			}
		}
		return $atividades_agendadas;
	}
	
	public function selecionarAgendasPorAtividade($cod_atividade){
		$atividades_agendadas = NULL;
		$sql = "SELECT ag.cod_atividade_agenda, ag.data, ag.horario_inicio, 
		ag.horario_fim, ag.cod_local FROM Atividade a, Atividade_Agenda ag 
		WHERE a.cod_atividade= ag.cod_atividade AND ag.cod_atividade=".$cod_atividade;
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){				
				$atividades_agendadas[$i] = new AtividadeAgenda();
				$atividades_agendadas[$i]->setCodAtividadeAgenda($registro["cod_atividade_agenda"]);
				$atividades_agendadas[$i]->setData($registro["data"]);
				$atividades_agendadas[$i]->setHorarioInicio($registro["horario_inicio"]);
				$atividades_agendadas[$i]->setHorarioFim($registro["horario_fim"]);
				$atividades_agendadas[$i]->setCodLocal($registro["cod_local"]);
				$i++;
			}
		}
		return $atividades_agendadas;
	}
    
    public function selecionarParticipantesPorAtividade($cod_atividade){
        $participantes = NULL;
        $sql = "Select u.nome_certificado,u.rg,u.cod_usuario from Usuario u, Inscricao i, Inscricao_Historico h 
        		where i.cod_usuario = u.cod_usuario AND h.cod_inscricao = i.cod_inscricao 
        		AND h.cod_atividade_agenda = ".$cod_atividade." AND i.status = 'Confirmada'
        		ORDER BY nome_certificado";
        $registros = FachadaConectorBD::getInstancia()->consultar($sql);
        $i = 0;
        if (!is_null($registros)){
            foreach ($registros as $registro){
                $participantes[$i] = new Usuario();
                $participantes[$i]->setCodUsuario($registro["cod_usuario"]);
                $participantes[$i]->setNome($registro["nome_certificado"]);
                $participantes[$i]->setRg($registro["rg"]);
                $i++;
            }
        }
        return $participantes;
    }
    
    public function selecionarAtividadesRealizadasPorUsuario($cod_evento, $cod_usuario, $funcao) {
        $atividades = NULL;
        $sql = "Select a.cod_atividade, a.nome, a.status" .
                " From Atividade a, Usuario_Atividade ua" .
                " Where a.cod_evento = '".$cod_evento."'" .
                " and ua.cod_usuario = '".$cod_usuario."'" .
				" and ua.cod_atividade = a.cod_atividade" . 
                " and ua.funcao = '" . $funcao . "'";
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$atividades[i] = new Atividade();
				$atividades[i]->setCodAtividade($registro["cod_atividade"]);
				$atividades[i]->setNome($registro["nome"]);
				$atividades[i]->setStatus($registro["status"]);
				$i++;
			}
		}
		
		return $atividades;
    }

}
?>