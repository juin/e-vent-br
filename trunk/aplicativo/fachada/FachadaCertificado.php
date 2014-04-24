<?php

require_once(CLASSES.'UsuarioSessao.php');
require_once(CLASSES.'Certificado');
require_once(PERSISTENCIA.'PersitenciaCertificado.php');
require_once(CLASSES.'Usuario.php');


class FachadaCertificado extends InstanciaUnica{
	
	//Busca o codigo do usurio
	public function getCodigoDaSessao(){
		return $_SESSION['Usuario']->getCodUsuario();
	}
	
	//busca o codigo do evento
	public function getCodigoEvento(){
		return $_SESSION['Evento']->getCodEvento();
	}
	

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
		
		/*falta gerar certificado
		foreach ($registros as $registro){
			//gerando o pdf
			 $pdf = new FPDF('L', 'mm');
                $pdf->Open();
                $pdf->SetMargins(0, 0, 0);

                $pdf->Image('./cert/cert_site.jpg', null, null, 297, 210);

                // cor da fonte
                $pdf->SetTextColor(12, 54, 27);

                //nome do aluno
                $pdf->SetFont('Arial', 'B', 30);
                $s = strtoupper(utf8_decode($_SESSION["nome_certificado"])); //caixa alta
                $cw = $pdf->CurrentFont['cw'];
                $w = 0;
                $l = strlen($s);
                for ($i = 0; $i < $l; $i++) {
                    $w += $cw[$s[$i]];
                }
                $tam = $w * $pdf->FontSize / 1000;
                $ltam = (295 - $tam) / 2;
                $pdf->Text($ltam, 90, $s);

                //Escrevendo nome do minicurso e carga horaria
                $pdf->SetFont('Arial', '', 15);
                for ($j = 0; $j < 3; $j++) {
                    $mc = $_SESSION["mc"][$j];
  
                    $linha = 130 + (8 * $j);
                    $pdf->Text(10, $linha, $mc);
                }
				
                // Escrevendo MD5
                $md5 = md5($_SESSION["cpf"]);

                $pdf2 = new FPDF('L', 'mm');
                $pdf2->SetMargins(0, 0, 0);
                $pdf2->Image('./cert/cert_evt.jpg', null, null, 297, 210);
               
                    if (mysql_num_rows($resultado_minicurso) >= 1) {
                    $pdf->Output("./cert/cert_mc_" . $nome_lower . ".pdf");
                }
                if (mysql_num_rows($resultado_evento) == 1) {
                    $pdf2->Output("./cert/cert_evt_" . $nome_lower . ".pdf");
				}
		}   */
		
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
