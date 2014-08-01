<?php
require_once(CLASSES.'InstanciaUnica.php');
require_once(FACHADAS.'FachadaConectorBD.php');

class PersistenciaCertificado extends InstanciaUnica{
	
	public function selecionarPorUsuario($cod_usuario){
		$sql= 'Select * from Certificado where cod_inscricao in (Select cod_inscricao from inscricao where cod_usuario = '.$cod_usuario.')';
		$registros= FachadaConectorBD::getInstancia()->consultar($sql);
		$certificados = NULL;
		$i=0;
		foreach ($registros as $registro){
		 	$certificado=new Certificado();
			$certificado->setCodCertificado($registro['cod_certificado']);
			$certificado->setCodInscricao($registro['cod_inscricao']);
			$certificado->setCodValidacao($registro['cod_validacao']);
			$certificado->setData_hora_emissao($registro['data_hora_emissao']);
			$certificado->setData_hora_enviado($registro['data_hora_enviado']);
			$certificado->setData_hora_salvo($registro['data_hora_salvo']);
			$certificados[$i] = $certificado;
			$i++;
		}
		return $certificados;
	}
	
	public function selecionarPorCodigoValidacao($cod_validacao){
		$sql='Select cod_certificado from Certificado where cod_validacao = '.$cod_validacao;
		$registros= FachadaConectorBD::getInstancia()->consultar($sql);
		
		return $registros;
	}
	
	public function atualizarDataEmissao($cod_certificado,$data){
		$sql = 'UPDATE Certificado set data_emissao = '.$data.' where cod_certificado = '.$cod_certificado;
		$registros = FachadaConectorBD::getInstancia()->atualizar($sql);
		if($registros != null){
			return 0;
		} else {
			return null;
		}
	}
	
	public function atualizarDataSalvo($cod_certificado,$data){
		$sql= 'UPDATE Certificado set data_salvo = '.$data.'Where cod_certificado='.$cod_certificado;
		$registros = FachadaConectorBD::getInstancia()->atualizar($sql);
		if($registros != null){
			return 0;
		} else {
			return null;
		}
	}
	
	public function atualizarDataEnvio($cod_certificado,$data){
		$sql = 'UPDATE Certificado set data_envio = '.$data.' where cod_certificado = '.$cod_certificado;
		$registros = FachadaConectorBD::getInstancia()->atualizar($sql);
		if($registros != null){
			return 0;
		} else {
			return null;
		}
	}
	
	public function selecionarPorUsuarioEvento($cod_usuario, $cod_evento){
        $sql='Select a.nome_certificado, b.nome as nome_atividade, b.carga_horaria, c.nome as nome_evento from
              Usuario a, Atividade b,Evento c, Inscricao_Historico d, Inscricao e, Atividade_Agenda f where a.cod_usuario=e.cod_usuario AND d.cod_inscricao= e.cod_inscricao AND 
			  d.cod_atividade_agenda=f.cod_atividade_agenda AND f.cod_atividade=b.cod_atividade AND d.frequente="Presente" AND a.cod_usuario='.$cod_usuario.' AND c.cod_evento = '.$cod_evento;
				
		$registros= FachadaConectorBD::getInstancia()->consultar($sql);
		$certificados = NULL;
		$i = 0;
		foreach ($registros as $registro){
				$certificado=new Certificado();
				$certificado->setNomeCertificado($registro['nome_certificado']);
				$certificado->setNomeAtividade($registro['nome_atividade']);
				$certificado->setCargaHoraria($registro['carga_horaria']);
				$certificado->setNomeEvento($registro['nome_evento']);
				$certificados[$i] = $certificado;
			    $i++;
				
		}
		return $certificados;
	}

	public function criarCertificado ($cod_usuario, $cod_evento){
  		$sql='SELECT DISTINCT i.cod_inscricao, u.nome_certificado, a.nome as nome_atv, a.carga_horaria, 
		  e.nome as nome_evt, e.cod_evento FROM Inscricao i, Usuario u, Atividade a, Atividade_Agenda aa, Evento e, Inscricao_Historico ih 
		  WHERE i.cod_usuario = u.cod_usuario
		  AND i.cod_inscricao = ih.cod_inscricao
		  AND i.cod_evento = e.cod_evento
		  AND a.cod_evento = e.cod_evento
		  AND ih.cod_atividade_agenda = aa.cod_atividade_agenda
		  AND aa.cod_atividade = a.cod_atividade
		  AND u.cod_usuario = '.$cod_usuario.' 
		  AND e.cod_evento = '.$cod_evento.'
		  AND i.status = "Confirmada"
		  AND ih.frequente = "Presente"';
  
		$certificados = NULL;
		
		$registros= FachadaConectorBD::getInstancia()->consultar($sql);
		echo "bla<br>";
		echo print_r($registros[0][4])."<br>";
		echo "bla<br>";
		$i = 0;
		$cod_insc = $registros[0][0];
		$nome_cert = $registros[0][1];
		$nome_evt = $registros[0][4];
		$certificados[0] = new Certificado();
		$certificados[0]->setCodInscricao($cod_insc);
		$certificados[0]->setNomeCertificado($nome_cert);
		$certificados[0]->setNomeEvento($nome_evt);
				
				
				
	/*foreach ($registros as $registro){
				$certificados[0]->setNomeAtividade($registro['nome_atv'], $i);
				$certificados[0]->setCargaHoraria($registro['carga_horaria'], $i);
			    $i++;
		}
        
		return $certificados;*/
	 return 0;

	}
}
?>