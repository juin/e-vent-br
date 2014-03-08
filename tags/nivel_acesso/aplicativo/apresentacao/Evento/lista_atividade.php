<?php
require_once('../../fachada/FachadaUsuarioNivelAcesso.php');
require_once('../../fachada/FachadaEvento');

?>
<form method="post" action="">
<?php 
	$atividades = FachadaEvento::getInstancia()->getListaAtividadeEvento($_POST['cod_evento']);
	foreach ($atividades as $atividade){
		echo '<input type="checkbox" name="atividade" value="$atividade[0]">'.$atividade[1];
	}
?>
</form>
<?php 

?>