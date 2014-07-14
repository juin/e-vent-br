<?php
	require_once(dirname(__FILE__).'/../../config.php');
	require_once(CLASSES . 'Evento.php');
	require_once(FACHADAS . 'FachadaEvento.php');
?>
<h1>Cadastro de Evento</h1><br />
<form method="post" action="#" enctype="multipart/form-data">
	<label for="nome">Nome:</label><input name="nome" type="text" maxlength="100"/><br />
	<label for="sigla">Sigla:</label><input name="sigla" type="text" maxlength="25"/><br />
	<label for="dtini">Data de Início:</label><input name="dtini" type="date"/><br />
	<label for="dtfim">Data de Término:</label><input name="dtfim" type="date"/><br />
	<label for="dtinsc"><i>Deadline</i> de Inscrição:</label><input name="dtinsc" type="date"/><br />
	<label for="pgto">Pagamento:</label>
		<select name="pgto">
			<option value="Gratuito">Gratuito</option>
			<option value="Pago">Pago</option>
		</select><br />
	<label for="dias_pgto">Prazo de Pagamento:</label><input name="dias_pgto" type="text" maxlength="5" /><br />
	<label for="site">Site:</label><input name="site" type="text" maxlength="100"/><br />
	<!-- <label for="logo_evt">Imagem:</label><input name="logo_evt" type="file" /><br /> -->
	<input type="submit" value="Cadastrar" name="cadastro" />
</form>
<?php
	if(isset($_POST['nome'])){
		$evento = new Evento();

		$evento->setNome($_POST['nome']);
		$evento->setSigla($_POST['sigla']);
		$evento->setDataInicio($_POST['dtini']);
		$evento->setDataFim($_POST['dtfim']);
		$evento->setPagamento($_POST['pgto']);
		$evento->setDiasLimitePagamento($_POST['dias_pgto']);
		$evento->setUrlSite($_POST['site']);
		//$evento->setUrlImagem($_POST['logo_evt']);
		
		$retorno = FachadaEvento::getInstancia()->inserirEventoNovo($evento);
		
		if ($retorno > 0 ){
			echo "<h4>Evento cadastrado com sucesso!</h4>";
		}
	}
?>