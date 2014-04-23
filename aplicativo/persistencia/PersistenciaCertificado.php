<?php

class PersistenciaCertificado extends InstanciaUnica{
	public function SelecionaInscricaoPorCodigoEvento($codUsuario, $codEvento){
		//recupera codigo de inscricao
		$sql= 'Select * from Inscricao where cod_usuario = '.$codUsuario;
		$sql='Select * from Inscricao where cod_evento ='.$codEvento;
		$inscricao = FachadaConectorBD::getInstancia()->consultar($sql);
		return $inscricao;
		
	}
	
	public function selecionarPorUsuario($cod_usuario){
		$sql= 'Select * from Certificado where cod_inscricao in (Select cod_inscricao from inscricao where cod_usuario = '.$cod_usuario.')';
		$registros= FachadaConectorBD::getInstancia()->consultar($sql);
		$certificados;
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
}
