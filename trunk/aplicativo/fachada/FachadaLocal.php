<?
require_once(PERSISTENCIAS.'PersistenciaLocal.php');
require_once(CLASSES.'Local.php');

class FachadaLocal extends InstanciaUnica{
	
	public function listarLocalPorCodigo($cod_local){
		$local = null;
		if (!is_null($cod_local)) {
			$locais = PersistenciaLocal::getInstancia()->selecionarPorCodigo($cod_local);
			if(!is_null($locais)){
				$local = $locais[0];
			}
		}
		return $local;
	}
}
?>