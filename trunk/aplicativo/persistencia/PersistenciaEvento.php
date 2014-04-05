<?php
require_once (FACHADAS.'FachadaConectorBD.php');

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
		$sql = 'Select b.cod_atividade_agenda, a.nome, b.horario_inicio, b.data from Atividade a,
				Atividade_Agenda b where b.cod_atividade = a.cod_atividade AND
				a.cod_evento = '.$cod_evento;
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$atividades[$i] = new AtividadeAgenda();
				$atividades[$i]->setCodAtividadeAgenda($registro["cod_atividade_agenda"]);
				$atividades[$i]->setNome($registro["horario_inicio"]);
				$atividades[$i]->setNome($registro["horario_fim"]);
				$atividades[$i]->setNome($registro["data"]);
				$i++;
			}
		}
		return $atividades;
	}
	
    public function selecionarVagasDisponiveisPorAtividade($cod_atividade){
            $sql = "SELECT (a.vagas - count(*)) as quantidadeVagas FROM Atividade a, 
                    Inscricao i, Inscricao_Historico h, Atividade_Agenda aa WHERE
                    aa.cod_atividade_agenda = '"  . $cod_atividade . "' AND i.status in ('Andamento', 'Confirmada')
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
			foreach ($registros as $r){
				$eventos[$i] = new Evento();
				$eventos[$i]->setCodevento($cod_evento);
				$eventos[$i]->setNome($r["nome"]);
				$eventos[$i]->setSigla($r["sigla"]);
				$eventos[$i]->setDatainicio($r["data_inicio"]);
				$eventos[$i]->setDatafim($r["data_fim"]);
				$eventos[$i]->setDatahorapublicado($r["data_hora_publicado"]);
				$eventos[$i]->setStatus($r["status"]);
				$eventos[$i]->setPagamento($r["pagamento"]);
				$eventos[$i]->setUrlatividade($r["url_gabarito_atividade"]);
				$eventos[$i]->setUrlevento($r["url_gabarito_evento"]);
				$i++;
			}
		}
		return $eventos;
	}
    
    public function selecionarAtividadesPorCodigo($cod_atividade_agenda){
		$atividades = NULL;
		$sql = "Select a.cod_atividade, a.nome from atividade a, atividade_agenda ag where a.cod_atividade = ag.cod_atividade AND ag.cod_atividade_agenda = ".$cod_atividade_agenda;
		$registros = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)){
			foreach ($registros as $registro){
				$atividades[i] = new Atividade();
				$atividades[i]->setCodAtividade($registro["cod_atividade"]);
				$atividades[i]->setNome($registro["nome"]);
				$i++;
			}
		}
		return $atividades;
	}
    
    public function selecionarParticipantesPorAtividade($cod_atividade){
        $participantes = NULL;
        $sql = "Select u.cod_usuario, u.nome_certificado, h.frequente" .
                " From Usuarios u, Atividade_Agenda aa, Inscricao i, Inscricao_Historico h" .
                " Where aa.cod_atividade_agenda = '" . $cod_atividade . "'" .
                        " and h.cod_atividade_agenda = aa.cod_atividade_agenda " .
                        " and i.cod_inscricao = h.cod_inscricao" .
                        " and i.status = 'Confirmada'";
        $registros = FachadaConectorBD::getInstancia()->consultar($sql);
        $i = 0;
        if (!is_null($registros)){
            foreach ($registros as $registro){
                $participantes[$i] = new Usuario();
                $participantes[$i]->setCodUsuario($registro["cod_usuario"]);
                $participantes[$i]->setNome($registro["nome"]);
                $participantes[$i]->setFrequente($registro["frequente"]);
                $i++;
            }
        }
        return $participantes;
    }
    
    public function selecionarAtividadesRealizadasPorUsuario($cod_evento, $cod_usuario, $funcao) {
        $atividades = NULL;
        $sql = "Select from a.cod_atividade, a.nome" .
                " From Atividade a, Usuario_Atividade ua, Atividade_Valor av" .
                " Where av.cod_evento = '" . $cod_evento . "'" .
                " and ua.cod_atividade = av.cod_atividade" .
                " and ua.cod_usuario = '" . $cod_usuario . "'" .
                " and ua.funcao = '" . $funcao . "'";
    }
}

?>