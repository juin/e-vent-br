<?php
require_once (CLASSES . 'UsuarioSessao.php');
require_once (CLASSES . 'Certificado.php');
require_once (PERSISTENCIAS . 'PersistenciaCertificado.php');
require_once (CLASSES . 'Usuario.php');
require_once (dirname ( __FILE__ ) . '/../utilidades.php');
require_once (FACHADAS . 'Fpdf/fpdf.php');
class FachadaCertificado extends InstanciaUnica {
	public function listarPorUsuario($cod_usuario, $cod_evento) {
		$certificados = PersistenciaCertificado::getInstancia ()->selecionarPorUsuario ( $cod_usuario, $cod_evento );
		return $certificados [0];
	}
	public function criarCertificado($cod_usuario, $cod_evento) {
		return PersistenciaCertificado::getInstancia ()->criarCertificado ( $cod_usuario, $cod_evento );
	}
	public function atualizarDataEmissao($cod_certificado, $data) {
		return PersistenciaCertificado::getInstancia ()->atualizarDataEmissao ( $cod_certificado, $data );
	}
	public function atualizarDataSalvo($cod_certificado, $data) {
		return PersistenciaCertificado::getInstancia ()->atualizarDataSalvo ( $cod_certificado, $data );
	}
	public function atualizarDataEnvio($cod_certificado, $data) {
		return PersistenciaCertificado::getInstancia ()->atualizarDataEnvio ( $cod_certificado, $data );
	}
	public function verificarCertificado($cod_validacao) {
		$registros = PersistenciaCertificado::getInstancia ()->selecionarPorCodigoValidacao;
		if (count ( $registros ) > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function emitirCertificado($cod_usuario, $cod_evento) {
		return PersistenciaCertificado::getInstancia ()->emitirCertificado ( $cod_usuario, $cod_evento );
	}
	public function gerarCertificado(Certificado $certificado) {
		$pdf = new FPDF ( 'L', 'mm' ); // L=retrato mm=milimetros
		$pdf->Open ();
		$pdf->SetMargins ( 0, 0, 0 );
		// ta buscando a imagem so no meu, editem para testar
		$pdf->Image ( "C:/wamp/www/e-vent/recursos/imagem/teste_fundo.jpg", null, null, 297, 210 );
		// cor da fonte
		$pdf->SetTextColor ( 0, 0, 0 ); // usar paleta de cores. a cor escolhida foi a preta
		                                // http://html-color-codes.info/Codigos-de-Cores-HTML/
		                                // nome do aluno
		$pdf->SetFont ( 'Arial', 'B', 30 ); // arial;negrito; tamanho 20
		$nome = strtoupper ( utf8_decode ( $certificado->getNomeAluno () ) ); // Maiuscula e resolve problema de acentuacao
		$pdf->Text ( 90, 95, $nome ); // posicao, altura, nome
		
		$pdf->SetFont ( 'Arial', 'B', 20 ); // nome dos minicursos fonte, negrito, tamanho
		                                    // maximo 5
		$vetor = $certificado->getNomeAtividade ();
		$vetorCH = $certificado->getCargaHoraria ();
		for($j = 0; $j < count ( $vetor ); $j ++) {
			$pdf_minicurso = $vetor [$j] . " - " . $vetorCH [$j];
			$linha = 135 + (8 * $j); // altura(altura de um pra outro)
			$pdf->Text ( 120, $linha, $pdf_minicurso ); // posicao, linha, nome
		}
		$pdf->SetFont ( 'Arial', '', 12 );
		$codigo = $certificado->getUrlCertificado ();
		$pdf->Text ( 90, 208, $codigo );
		$url = 'C:/wamp/www/e-vent/recursos/PDF/cert.pdf';
		$pdf->Output ( $url );
		// Pegar codigo maximo de certificado do banco
		$certificado->setCodCertificado ( '1234' );
		$certificado->setData_hora_emissao ( date ( 'Y-m-d H:i:s' ) );
		// Gerar padrao de validacao
		$certificado->setCodValidacao ( md5 ( $certificado->getCodInscricao () . $certificado->getCodCertificado () ) );
		$certificado->setUrlCertificado ( $url );
		$this->salvarCertificado ( $certificado );
		return $url;
	}
	public function salvarCertificado(Certificado $certificado) {
		PersistenciaCertificado::getInstancia ()->salvarCertificado ( $certificado );
	}
	public function enviarCertificado($cod_usuario) {
		$usuario = PersistenciaCertificado::getInstancia ()->enviarCertificado ( $cod_usuario );
		// enviar email
		$nome = $usuario->getNomeCertificado ();
		$email = $usuario->getEmail ();
		$url_certificado = $usuario->getUrlCertificado ();
		$assunto = 'Certificado';
		$mensagem = 'Ola, segue em anexo o seu Certificado! Obrigado.';
		
		// $pdf = new FPDF ();
		
		// error_reporting(E_ALL);
		error_reporting ( E_STRICT );
		
		date_default_timezone_set ( 'America/Bahia' );
		
		require_once ('class.phpmailer.php');
		// include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
		
		$mail = new PHPMailer ();
		
		// $body = file_get_contents('contents.html');
		$body = "Certificado de " . $nome; // eregi_replace("[\]",'',$body);
		$mail->IsSMTP (); // telling the class to use SMTP
		$mail->Host = ""; // SMTP server PEGAR DO BANCO
		$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
		                      // 1 = errors and messages
		                      // 2 = messages only
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->SMTPSecure = "tsl"; // sets the prefix to the server
		$mail->Username = "teuemail@gmail.com"; // GMAIL username PEGAR DO BANCO
		$mail->Password = "tuapassword"; // GMAIL password PEGAR DO BANCO
		
		$mail->SetFrom ( $email, $nome );
		
		$mail->AddReplyTo ( "name@yourdomain.com", "First Last" ); // pegar do banco quem vai responder
		
		$mail->Subject = ("Certificado " . $nome);
		
		$mail->MsgHTML ( $body );
		
		$address = $email;
		$mail->AddAddress ( 'teuemail@gmail.com', 'Teu nome' ); // pegar do banco
		
		$mail->AddAttachment ( "$url_certificado" );
		
		if (! $mail->Send ()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			
			$mail->SetFrom ( 'teuemail@gmail.com', 'teunome' ); // pegar do banco
			
			$mail->AddReplyTo ( "name@yourdomain.com", "First Last" ); // pegar no banco
			
			$mail->Subject = $assunto;
			
			$mail->MsgHTML ( $mensagem );
			
			$address = $email;
			$mail->AddAddress ( $address, $nome );
			
			$mail->Send ();
			
			echo "O Certificado foi enviado com sucesso!";
		}
	}
	public function validarCertificado() {
		$certificado = PersistenciaCertificado::getInstancia ()->validarCertificado ( $cod_validacao );
		if ($certificado == 0) {
			return "Nenhum Certificado Encontrado!";
		} else {
			return $certificado;
		}
	}
}
?>