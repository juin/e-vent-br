 <?php 
 require_once (CLASSES . 'Certificado.php');
 require_once(FACHADAS.'FachadaCertificado.php');
 ?>

    <form name="ValidarCertificado" method="post" id="validaCertificado" action="../fachada/FachadaCertificado.php">  
		<input type="text" name="codigo" id="codigoCertificado"/>
		<input type="button" class="button" value="Validar" />
		<p><? echo $certificados ?></p>  
	</form>