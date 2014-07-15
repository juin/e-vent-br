<?php

require_once(CLASSES.'UsuarioSessao.php');
require_once(CLASSES.'Certificado.php');
require_once(PERSISTENCIAS.'PersistenciaCertificado.php');
require_once(CLASSES.'Usuario.php');
require_once(FACHADAS.'Fpdf/fpdf.php');


class FachadaCertificado extends InstanciaUnica{
	
	public function listarPorUsuario($cod_usuario){
		return PersistenciaCertificado::getInstancia()->selecionarPorUsuario;
	}
	
	public function verificarCertificado($cod_validacao){
		$registros=PersistenciaCertificado::getInstancia()->selecionarPorCodigoValidacao;
		if(count($registros)>0){
			return true;
		}else{
			return false;
		}
	}
	public function emitirCertificado($cod_usuario, $cod_evento){
		return PersistenciaCertificado::getInstancia()->emitirCertificado($cod_usuario, $cod_evento);
		
	}

	public function gerarCertificado (Certificado $certificado){
			    $pdf = new FPDF('L', 'mm');
                $pdf->Open();
                $pdf->SetMargins(0, 0, 0);
			//pegar do banco a imagem * TA DANDO ERRO NA BUSCA DA IMAGEM
			
			$imagem="teste_fundo.png";
			$pdf->Image($imagem, null, null, 297, 210);
			//cor da fonte
			$pdf->SetTextColor(12, 54, 27);
			//nome do aluno
			 $pdf->SetFont('Arial', 'B', 30);
			 $nome=strtoupper(utf8_decode($certificado->getNomeAluno()));  // Maiuscula e resolve problema de acentuação
			    $pdf->SetFont('Arial', '', 15);
				//máximo 5
				$vetor= $certificado->getNomeAtividade();
				$vetorCH->getCargaHoraria();
			 for ($j = 0; $j < count($vetor); $j++) {
                  $pdf_minicurso = $vetor($j)." - ".$vetorCH;
				 $linha = 130 + (8 * $j);
                    $pdf->Text(10, $linha, $pdf_minicurso);
					
			 }
			 $pdf->Output('./fundo_cert/cert.pdf');
			 
			 
	}
		
	public function salvarCertificado($cod_certificado){
		
	}
	public function enviarCertificado($cod_certificado){
		
	}
	
	public function atualizarDataEmissao($cod_certificado, $data){
		return PersistenciaCertificado::getInstancia()->atualizarDataEmissao($cod_certificado, $data);
	}
	
	public function atualizarDataSalvo($cod_certificado,$data){
		return PersistenciaCertificado::getInstancia()->atualizarDataSalvo($cod_certificado, $data);
	}
	
	public function atualizarDataEnvio($cod_certificado,$data){
		return PersistenciaCertificado::getInstancia()->atualizarDataEnvio($cod_certificado, $data);
	}
	
}
