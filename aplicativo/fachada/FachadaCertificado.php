<?php
require_once(CLASSES.'UsuarioSessao.php');
require_once(CLASSES.'Certificado.php');
require_once(PERSISTENCIAS.'PersistenciaCertificado.php');
require_once(CLASSES.'Usuario.php');
require_once(FACHADAS.'Fpdf/fpdf.php');

class FachadaCertificado extends InstanciaUnica{
	

	public function listarPorUsuario($cod_usuario, $cod_evento){
		$certificados = PersistenciaCertificado::getInstancia()->selecionarPorUsuario($cod_usuario, $cod_evento);
		return $certificados[0];
	}

	public function criarCertificado($cod_usuario, $cod_evento){
		return PersistenciaCertificado::getInstancia()->criarCertificado($cod_usuario, $cod_evento);
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
			//ta buscando a imagem so no meu, editem para testar
			$pdf->Image("C:/wamp/www/e-vent/recursos/imagem/teste_fundo.jpg", null, null, 297, 210);
			//cor da fonte
			$pdf->SetTextColor(12, 54, 27);
			//nome do aluno
			 $pdf->SetFont('Arial', 'B', 30);
			 $nome=strtoupper(utf8_decode($certificado->getNomeAluno()));  // Maiuscula e resolve problema de acentua��o
			 $pdf->Text(30, 50, $nome);
			    $pdf->SetFont('Arial', '', 20);
				//maximo 5
				$vetor= $certificado->getNomeAtividade();
				$vetorCH = $certificado->getCargaHoraria();
			 for ($j = 0; $j < count($vetor); $j++) {
                $pdf_minicurso = $vetor[$j]." - ".$vetorCH[$j];
				 $linha = 130 + (8 * $j);
                    $pdf->Text(30, $linha, $pdf_minicurso);
					
			 }
			 $nome_evt = $certificado->getNomeEvento();
			 $pdf->Text(30, 70, $nome_evt);
			 $pdf->Output('C:/wamp/www/e-vent/recursos/PDF/cert.pdf');
	
	}
		
	public function salvarCertificado($cod_certificado){
		
		/*$pdf = new FPDF();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont("Arial", "B", 36);
$pdf->Cell(50, 30, "Hello World");
$pdf->Output("C:/wamp/www/e-vent/recursos/PDF/cert.pdf",
"F");
		
	}
	
	public function enviarCertificado($cod_certificado){
		*/
	}
	
	public function enviarCertificado(){
		$email = PersistenciaCertificado::getInstancia()->enviarCertificado();
		
	}
	
	public function validarCertificado(){
		
	}
	 
}
?>