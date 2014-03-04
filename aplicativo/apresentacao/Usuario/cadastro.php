<?php

require_once("../../fachada/FachadaUsuario.php");
require_once("../../fachada/FachadaCidade.php");

//Em construção -> Lucas Amparo

?>
<form method="post" action="cadastro.php">
<fieldset>Dados Pessoais</fieldset>
	<label>Nome:</label><input type="text" name="nome" maxlength="100"/><br />
	<label>CPF:</label><input type="text" name="cpf" maxlength="11"/><br />
	<label>RG:</label><input type="text" name="rg" maxlength="10"/><br />
	<label>Currículo <i>Lattes</i>:</label><input type="text" name="lattes" maxlength="50"/><br />
	<label>Curso:</label><input type="text" name="curso" maxlength="50"/><br />
	<label>Instituição:</label><input type="text" name="instituicao" maxlength="140"/><br />
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
			<option value="Nao Declarar">Não Declarar</option>
		</select>
	<label>Cidade:</label>
		<select name="cidade">
			<?php
				$cidades = FachadaCidade::getInstancia()->getCidades();
				
				foreach ($cidades as $cidade){
					echo '<option value="'.$cidade[0].'">'.$cidade[1].'</option>';
				}				
			?>
		</select>
		<br />
	<label>Data Nascimento:</label><input type="date" name="nasc"/><br />
<fieldset>Contatos</fieldset>
	<label>Telefone Fixo:</label><input type="tel" name="tel1"/><br />
	<label>Telefone Celular:</label><input type="tel" name="tel2"/><br />
	<label>Email:</label><input type="email" name="email"/><br />
<fieldset>Acesso</fieldset>
	<label>Login:</label><input type="text" name="login"/><br />
	<label>Senha:</label><input type="password" name="senha1"/><br />
	<label>Confirmar Senha:</label><input type="password" name="senha2"/><br />
	<label>Status</label>
		<select name="status">
			<option value="Ativo">Ativo</option>
			<option value="Inativo">Inativo</option>
		</select>
	<label>Nível Acesso</label>
		<select name="nivel">
			<option value="Super">Super</option>
			<option value="Administrador">Administrador</option>
			<option value="Comum">Comum</option>
		</select><br />
	<input type="checkbox" name="notifica" value="Sim">Desejo receber notificações de eventos<br />
	<?php
		$dt_cad = date("Y-m-d")." ".date("H:i:s");
	?>
	<input type="hidden" name="dt_cad" value="<?php echo $dt_cad;?>"
	<input type="reset" name="Limpar"><br />
	<input type="submit" name="Enviar"><br/>
</form>
<?
//Rotina de envio do cadastro
if(isset($_POST['cpf'])){
	$usuario->cod = null;
	$usuario->nome_cert = $_POST['nome'];
	$usuario->sexo = $_POST['sexo'];
	$usario->nasc = $_POST['nasc'];
	$usuario->cpf = $_POST['cpf'];
	$usuario->rg = $_POST['rg'];
	$usuario->login = $_POST['login'];
	$usuario->senha = $_POST['senha1'];
	$usuario->tel1 = $_POST['tel1'];
	$usuario->tel2 = $_POST['tel2'];
	$usuario->email = $_POST['email'];
	$usuario->instituicao = $_POST['instituicao'];
	$usuario->curso = $_POST['curso'];
	$usuario->lattes = $_POST['lattes'];
	$usuario->categ = $_POST['categ'];
	$usuario->nivel = $_POST['nivel'];
	$usuario->notifica = $_POST['notifica'];
	$usuario->status = $_POST['status'];
	$usuario->dt_cad = $_POST['dt_cad'];
	$usuario->cidade = $_POST['cidade'];
	
	$resultado = FachadaUsuario::getInstancia()->adicionarUsuario($usuario);
	
	echo $resultado;
}


?>