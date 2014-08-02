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
			$pdf->Image("C:/wamp/www/e_vent_br/recursos/imagem/teste_fundo.jpg", null, null, 297, 210);
			//cor da fonte
			$pdf->SetTextColor(12, 54, 27);
			//nome do aluno
			 $pdf->SetFont('Arial', 'B', 30);
			 $nome=strtoupper(utf8_decode($certificado->getNomeAluno()));  // Maiuscula e resolve problema de acentuaï¿œï¿œo
			 $pdf->Text(30, 50, $nome);
			    $pdf->SetFont('Arial', '', 20);
				//maximo 5
				$vetor= $certificado->getNomeAtividade();
				$vetorCH = $certificado->getCargaHoraria();
			 for ($j = 0; $j < count($vetor); $j++) {
                $pdf_minicurso = $vetor[$j]." - ".$vetorCH[$j];
				 $linha = 130 + (8 * $j);
                    $pdf->Text(30, $linha, $pdf_minicurso);
					//arumar alinhamento
			 }
			 $nome_evt = $certificado->getNomeEvento();
			 $pdf->Text(30, 70, $nome_evt);
			 $url='C:/wamp/www/e_vent_br/recursos/PDF/cert.pdf';
			 $pdf->Output($url);
			 //Pegar codigo maximo de certificado do banco
			 $certificado->setCodCertificado(1234);
			 $certificado->setData_hora_emissao(date('Y-m-d H:i:s'));
			 //Gerar padrao de validacao
			 $certificado->setCodValidacao(md5($certificado->getCodInscricao().$certificado->getCodCertificado()));
			 $certificado->setUrlCertificado($url);
			 $this->salvarCertificado($certificado);
			 return $url;
			 
	
	}
		
	public function salvarCertificado(Certificado $certificado){
		PersistenciaCertificado::getInstancia()->salvarCertificado($certificado);
	}
	
	public function enviarCertificado($cod_usuario){
		$email = PersistenciaCertificado::getInstancia()->enviarCertificado($cod_usuario);
		//enviar email
$nome=$nome_usuario;
$email=$email;
$assunto='Certificado';
$mensagem='Ola, segue em anexo o seu Certificado! Obrigado.';

$pdf = new FPDF();


$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Olá Mundo  !');

$filename = $nome_clientes;
$pdfdoc = $pdf->Output("$filename.pdf","");

//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail                    = new PHPMailer();

//$body                  = file_get_contents('contents.html');
$body                    = "Encomenda realizada pelo cliente ".$nome;//eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host        = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 0;                                   // enables SMTP debug information (for testing)
                                                                                   // 1 = errors and messages
                                                                                   // 2 = messages only
$mail->SMTPAuth   = true;                                 // enable SMTP authentication
$mail->SMTPSecure = "tsl";                               // sets the prefix to the servier
$mail->Host        = "smtp.gmail.com";    // sets GMAIL as the SMTP server
$mail->Port        = 587;                                  // set the SMTP port for the GMAIL server
$mail->Username   = "teuemail@gmail.com";  // GMAIL username
$mail->Password   = "tuapassword";                      // GMAIL password

$mail->SetFrom($email, $nome);

$mail->AddReplyTo("name@yourdomain.com","First Last");

$mail->Subject  = ("Encomenda ".$nome);

$mail->AltBody  = "Olá, ".$nome; // optional, comment out and test

$mail->MsgHTML($body);

$address = $email;
$mail->AddAddress('teuemail@gmail.com', 'Teu nome');

$mail->AddAttachment("$filename.pdf");    // attachment



if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {

$mail->SetFrom('teuemail@gmail.com', 'teunome');

$mail->AddReplyTo("name@yourdomain.com","First Last");

$mail->Subject  = $assunto;

$mail->AltBody  = "Olá, ".$nome; // optional, comment out and test

$mail->MsgHTML($mensagem);

$address = $email;
$mail->AddAddress($address, $nome);

$mail->AddAttachment("images/infor.gif");         // attachment

$mail->Send();

  echo "A sua encomenda foi feita com sucesso, obrigado!";
}
		
	}
	
	public function validarCertificado(){
		$certificado=PersistenciaCertificado::getInstancia()->validarCertificado($cod_validacao);
		if($certificado==0){
			return "Nenhum Certificado Encontrado!";
		}
		else {
		return $certificado;
	}
		
	}
	 
}
?>