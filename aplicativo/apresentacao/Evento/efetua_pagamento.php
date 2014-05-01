<?php
	echo "<h1>MockUP Pagamento</h1>";
	echo "<h2>Faz de conta que todo mundo pagou!</h2>";
	echo "<h3>Pagamento a vista Efetuado com Sucesso!</h3>";
?>
<form action="inscricao.php" method="post">
	<?php 
		foreach ($_POST['atv'] as $atv){
			echo '<input type="hidden" value="'.$atv[0].'" name="atv[]" />';
		}
	?>
	<input type="hidden" value="<?php echo $_POST['cod_evento'];?>" name="cod_evento" />
	<input type="submit" value="Avancar" />
</form>