<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once(dirname(__FILE__).'/../../utilidades.php');
require_once(APRESENTACAO.'menu.php');
require_once(APRESENTACAO.'cabecalho.php');
require_once(APRESENTACAO.'verifica_sessao.php');
require_once(CLASSES.'UsuarioSessao.php');

	echo "<h1>MockUP Pagamento</h1>";
	echo "<h2>Faz de conta que todo mundo pagou!</h2>";
	echo "<h3>Pagamento a vista Efetuado com Sucesso!</h3>";
?>
<form action="inscricao.php" method="post">
	<select name="forma_pagamento">
		<option value="INSCRICAO_FORMA_PGTO_VISTA">A VISTA</option>
		<option value="INSCRICAO_FORMA_PGTO_DEPOSITO">DEPOSITO</option>
	</select>
	<?php 
		foreach ($_POST['atv'] as $atv){
			echo '<input type="hidden" value="'.$atv[0].'" name="atv[]" />';
		}
	?>
	<input type="hidden" value="<?php echo $_POST['cod_evento'];?>" name="cod_evento" />
	<input type="submit" value="Avancar" />
</form>