<?php
require_once (FACHADAS.'FachadaConectorBD.php');

class PersistenciaEvento extends InstanciaUnica{
	
	public function selecionarListaEventos(){
		$sql = 'Select cod_evento, nome, sigla, data_inicio, status, pagamento from Evento';
		$res = FachadaConectorBD::getInstancia()->consultar($sql);
		return $res;
	}
	
	public function  selecionarListaAtividadePorCodigoEvento($cod_evento){
		$sql = 'Select a.nome, b.cod_atividade_agenda, b.horario_inicio, b.data from Atividade a,
				Atividade_Agenda b where b.cod_atividade = a.cod_atividade AND
				a.cod_evento = '.$cod_evento;
		
		return FachadaConectorBD::getInstancia()->consultar($sql);
	}
	
    public function selecionarVagasDisponiveisPorAtividade($cod_atividade){
            $sql = "SELECT (a.vagas - count(*)) as quantidadeVagas FROM Atividade a, 
                    Inscricao i, Inscricao_Historico h, Atividade_Agenda aa WHERE
                    aa.cod_atividade_agenda = '"  . $cod_atividade . "' AND i.status in ('Andamento', 'Confirmada')
                    AND h.cod_inscricao = i.cod_inscricao AND aa.cod_atividade_agenda = h.cod_atividade_agenda AND
                    a.cod_atividade = aa.cod_atividade GROUP BY a.vagas";
            
            $registros = FachadaConectorBD::getInstancia()->consultar($sql);
            
            return $registros;

    }
    
	public function selecionarEventoPorCodigo($cod_evento){
		$eventos;
		$sql = 'Select * from Evento where cod_evento = '.$cod_evento;
		$res = FachadaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($res)){
			foreach ($res as $r){
				$eventos[$i] = new Evento();
				$eventos[$i]->setCodevento($cod_evento);
				$eventos[$i]->setNome($r["nome"]);
				$eventos[$i]->setSigla($r["sigla"]);
				$eventos[$i]->setDatainicio($r["data_inicio"]);
				$eventos[$i]->setDatafim($r["data_fim"]);
				$eventos[$i]->setDatahorapublicado($r["data_hora_publicado"]);
				$eventos[$i]->setStatus($r["status"]);
				$eventos[$i]->setPagamento($r["pagamento"]);
				$eventos[$i]->setUrlatividade($r["url_gabarito_atividades"]);
				$eventos[$i]->setUrlevento($r["url_gabarito_evento"]);
				$i++;
			}
		}
		return $eventos;
	}
}

?>