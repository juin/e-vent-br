<?php
require_once (FACHADAS.'FachadaConectorBD.php');
require_once(CLASSES . 'Atividade.php');
require_once(CLASSES . 'AtividadeAgenda.php');
require_once(CLASSES . 'Usuario.php');
require_once(PERSISTENCIAS . 'PersistenciaLocal.php');

class PersistenciaEvento extends InstanciaUnica{
	
	public function selecionarEventosPorStatus($status){
		$eventos = NULL;	
		$sql = "Select cod_evento, nome, sigla, data_inicio, status, pagamento from Evento WHERE status LIKE '".$status."'";
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$eventos[$i] = new Evento();
				$eventos[$i]->setCodevento($registro["cod_evento"]);
				$eventos[$i]->setNome($registro["nome"]);
				$eventos[$i]->setSigla($registro["sigla"]);
				$eventos[$i]->setDatainicio($registro["data_inicio"]);
				$eventos[$i]->setStatus($registro["status"]);
				$eventos[$i]->setPagamento($registro["pagamento"]);
				$i++;
			}
		}

		return $eventos;
	}
	
	public function  selecionarAtividadesPorCodigoEvento($cod_evento){
		$atividades = NULL;	
		$sql = "SELECT a.cod_atividade, a.nome, a.status FROM Atividade a WHERE a.cod_evento =".$cod_evento;
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$atividades[$i] = new Atividade();
				$atividades[$i]->setCodAtividade($registro["cod_atividade"]);
				$atividades[$i]->setNome($registro["nome"]);
				$atividades[$i]->setStatus($registro["status"]);
				$i++;
			}
		}
		return $atividades;
	}
	
	public function selecionarAtividadeAgendaPorCodigoEvento($cod_evento){
		$atividades = NULL;
		$sql = "Select a.cod_atividade, a.nome, a.status, aa.data, aa.cod_atividade_agenda,
				aa.horario_inicio, aa.horario_fim from atividade a, atividade_agenda aa 
				where a.cod_atividade = aa.cod_atividade AND a.cod_evento = ".$cod_evento;
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$atividades[$i] = new AtividadeAgenda();
				$atividades[$i]->setCodAtividadeAgenda($registro["cod_atividade_agenda"]);
				$atividades[$i]->setNome($registro["nome"]);
				$atividades[$i]->setData($registro["data"]);
				$atividades[$i]->setStatus($registro["status"]);
				$atividades[$i]->setData($registro["data"]);
				$atividades[$i]->setCodAtividade($registro["cod_atividade"]);
				$atividades[$i]->setHorarioInicio($registro["horario_inicio"]);
				$atividades[$i]->setHorarioFim($registro["horario_fim"]);
				$i++;
			}
		}
		return $atividades;
	}
	
    public function selecionarVagasDisponiveisPorAtividade($cod_atividade_agenda){
            $sql = "SELECT (a.vagas - count(*)) as quantidadeVagas FROM Atividade a, 
                    Inscricao i, Inscricao_Historico h, Atividade_Agenda aa WHERE
                    aa.cod_atividade_agenda = '"  . $cod_atividade_agenda . "' AND i.status in ('Andamento', 'Confirmada')
                    AND h.cod_inscricao = i.cod_inscricao AND aa.cod_atividade_agenda = h.cod_atividade_agenda AND
                    a.cod_atividade = aa.cod_atividade GROUP BY a.vagas";
            $registro = FachadaConectorBD::getInstancia()->consultar($sql);

            return $registro;
    }
    
	public function selecionarEventosPorCodigo($cod_evento){
		$eventos = NULL;
		$sql = 'Select * from Evento where cod_evento = '.$cod_evento;
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$eventos[$i] = new Evento();
				$eventos[$i]->setCodevento($cod_evento);
				$eventos[$i]->setNome($registro["nome"]);
				$eventos[$i]->setSigla($registro["sigla"]);
				$eventos[$i]->setDatainicio($registro["data_inicio"]);
				$eventos[$i]->setDatafim($registro["data_fim"]);
				$eventos[$i]->setDatahorapublicado($registro["data_hora_publicado"]);
				$eventos[$i]->setStatus($registro["status"]);
				$eventos[$i]->setPagamento($registro["pagamento"]);
				$eventos[$i]->setUrlatividade($registro["url_gabarito_atividade"]);
				$eventos[$i]->setUrlevento($registro["url_gabarito_evento"]);
				$i++;
			}
		}
		return $eventos;
	}
    
    public function selecionarAtividadesPorCodigo($cod_atividade){
		$atividades = NULL;
		$sql = "SELECT a.cod_atividade, a.nome, a.resumo, a.conhecimento_aprendido, a.conteudo_programatico,
		a.prerequisito, a.publico_alvo, a.ferramenta, a.carga_horaria, a.vagas, a.observacao, a.tipo_frequencia
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
				$atividades_agendadas[$i]->setLocal($local);
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
				$atividades_agendadas[$i]->setLocal($local);
				$i++;
			}
		}
		return $atividades_agendadas;
	}
    
    public function selecionarParticipantesPorAtividade($cod_atividade){
        $participantes = NULL;
        $sql = "Select u.nome_certificado,u.rg,u.cod_usuario from usuario u, inscricao i, inscricao_historico h 
        		where i.cod_usuario = u.cod_usuario AND h.cod_inscricao = i.cod_inscricao 
        		AND h.cod_atividade_agenda = ".$cod_atividade." AND i.status = 'Confirmada'";
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
    
    public function selecionarEventoPorAtividade($cod_atividade){
    	$eventos = NULL;
    	$sql = 'Select * from Evento where cod_evento = 
    			(Select cod_evento from Atividade where cod_atividade = '.$cod_atividade.')';
    	$registros = FachadaConectorBD::getInstancia()->consultar($sql);
    	$i = 0;
    	if (!is_null($registros)){
    		foreach ($registros as $registro){
    			$eventos[$i] = new Evento();
    			$eventos[$i]->setCodevento($registro["cod_evento"]);
    			$eventos[$i]->setNome($registro["nome"]);
    			$eventos[$i]->setSigla($registro["sigla"]);
    			$eventos[$i]->setDatainicio($registro["data_inicio"]);
    			$eventos[$i]->setDatafim($registro["data_fim"]);
    			$eventos[$i]->setDatahorapublicado($registro["data_hora_publicado"]);
    			$eventos[$i]->setStatus($registro["status"]);
    			$eventos[$i]->setPagamento($registro["pagamento"]);
    			$eventos[$i]->setUrlatividade($registro["url_gabarito_atividade"]);
    			$eventos[$i]->setUrlevento($registro["url_gabarito_evento"]);
    			$i++;
    		}
    	}
    	return $eventos;
    }
}

?>