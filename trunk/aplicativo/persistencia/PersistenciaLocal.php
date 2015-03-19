<?php
require_once(PERSISTENCIAS.'PersistenciaConectorBD.php');
require_once(CLASSES.'InstanciaUnica.php');
require_once(CLASSES.'Local.php');

class PersistenciaLocal extends InstanciaUnica {

	public function selecionarPorCodigo($cod_local) {
		$locais = NULL;
		$sql = "SELECT cod_local, nome, sigla, bloco FROM Local WHERE cod_local=" . $cod_local;
		$registros = PersistenciaConectorBD::getInstancia()->consultar($sql);
		$i = 0;
		if (!is_null($registros)) {
			foreach ($registros as $registro) {
				$locais[$i] = new Local();
				$locais[$i] -> setCodLocal($registro["cod_local"]);
				$locais[$i] -> setNome($registro["nome"]);
				$locais[$i] -> setSigla($registro["sigla"]);
				$locais[$i] -> setBloco($registro["bloco"]);
				$i++;
			}
		}
		return $locais;

	}

}
?>