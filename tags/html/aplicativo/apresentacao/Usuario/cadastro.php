<?php
require_once(dirname(__FILE__).'/../../config.php');
require_once(FACHADAS."FachadaUsuario.php");
require_once(FACHADAS."FachadaCidade.php");
require_once(CLASSES."Usuario.php");

//Em construção -> Lucas Amparo

?>
<form method="post" action="cadastro.php">
<fieldset>
	<legend>Dados Pessoais</legend>
	<label>Nome:</label><input type="text" name="nome" maxlength="100"/><br />
	<label>CPF:</label><input type="text" name="cpf" maxlength="11"/><br />
	<label>RG:</label><input type="text" name="rg" maxlength="10"/><br />
	<label>Curr&iacuteculo <i>Lattes</i>:</label><input type="text" name="lattes" maxlength="50"/><br />
	<label>Curso:</label><input type="text" name="curso" maxlength="50"/><br />
	<label>Institui&ccedil&atildeo:</label><input type="text" name="instituicao" maxlength="140"/><br />
	<label>Categoria:</label>
		<select name="categ">
			<option value="Estudante">Estudante</option>
			<option value="Professor">Professor</option>
			<option value="Profissional">Profissional</option>
			<option value="Comum">Comum</option>
		</select>
	<label>Sexo:</label>
		<select name="sexo">
			<option value="Masculino">Masculino</option>
			<option value="Feminino">Feminino</option>
			<option value="Nao Declarar">N&atildeo Declarar</option>
		</select>
	<label>Cidade:</label>
		<select name="cidade">
			<?php
				$cidades = FachadaCidade::getInstancia()->getCidades();
				$i = 0;
				foreach ($cidades as $cidade){
					echo '<option value="'.$cidade[0].'">'.$cidade[1].'</option>';
					$i++;
				}				
			?>
		</select>
		<br />
	<label>Data Nascimento:</label><input type="date" name="nasc"/><br />
</fieldset>
<fieldset>
	<legend>Contatos</legend>
	<label>Telefone Fixo:</label><input type="tel" name="tel1"/><br />
	<label>Telefone Celular:</label><input type="tel" name="tel2"/><br />
	<label>Email:</label><input type="email" name="email"/><br />
</fieldset>
<fieldset>
	<legend>Acesso</legend>
	<label>Login:</label><input type="text" name="login"/><br />
	<label>Senha:</label><input type="password" name="senha1"/><br />
	<label>Confirmar Senha:</label><input type="password" name="senha2"/><br />
	<label>Status</label>
		<select name="status">
			<option value="Ativo">Ativo</option>
			<option value="Inativo">Inativo</option>
		</select>
	<label>N&iacutevel Acesso</label>
		<select name="nivel">
			<option value="Super">Super</option>
			<option value="Administrador">Administrador</option>
			<option value="Comum">Comum</option>
		</select><br />
	<input type="checkbox" name="notifica" value="Sim">Desejo receber notifica&ccedil&otildees de eventos<br />
	<?php
		$dt_cad = date("Y-m-d")." ".date("H:i:s");
	?>
	<input type="hidden" name="dt_cad" value="<?php echo $dt_cad;?>"
	<input type="reset" name="Limpar"><br />
	<input type="submit" name="Enviar"><br/>
</fieldset>
</form>
<?
//Rotina de envio do cadastro
if(isset($_POST['cpf'])){
	$usuario = new Usuario();
	
	$usuario->setCodUsuario(null);
	$usuario->setNome($_POST['nome']);
	$usuario->setSexo($_POST['sexo']);
	$usuario->setNasc($_POST['nasc']);
	$usuario->setCpf($_POST['cpf']);
	$usuario->setRg($_POST['rg']);
	$usuario->setLogin($_POST['login']);
	$usuario->setSenha($_POST['senha1']);
	$usuario->setTel1($_POST['tel1']);
	$usuario->setTel2($_POST['tel2']);
	$usuario->setEmail($_POST['email']);
	$usuario->setInstituicao($_POST['instituicao']);
	$usuario->setCurso($_POST['curso']);
	$usuario->setLattes($_POST['lattes']);
	$usuario->setCategoria($_POST['categ']);
	$usuario->setNivelAcesso($_POST['nivel']);
	$usuario->setNotifica($_POST['notifica']);
	$usuario->setStatus($_POST['status']);
	$usuario->setDatacad($_POST['dt_cad']);
	$usuario->setCidade($_POST['cidade']);
	
	$resultado = FachadaUsuario::getInstancia()->adicionarUsuario($usuario);
	
	echo $resultado;
}


?>