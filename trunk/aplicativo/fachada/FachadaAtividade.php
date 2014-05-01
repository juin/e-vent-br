<?
require_once(PERSISTENCIAS.'PersistenciaAtividade.php');
require_once(CLASSES.'Atividade.php');

class FachadaAtividade extends InstanciaUnica{
	
	public function listarTiposAtividadePorEvento($cod_evento){
		$registros = PersistenciaAtividade::getInstancia()->selecionarTiposAtividadePorEvento($cod_evento);
		if($registros != NULL){
			return $registros;
		} else {
			return NULL;
		}
	}
}
?>