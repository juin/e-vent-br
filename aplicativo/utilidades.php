<?php
// verifica se ocorreu um envio do formulario atraves do metodo POST
function isPostBack() { 
    return ($_SERVER['REQUEST_METHOD'] == 'POST');
}

//Muda o padr�o de data do SQL para "Normal" (YYYY-MM-DD => DD-MM-YYYY)
function arrumaData($data){
	$data_tmp = explode("-",$data);
	$data = $data_tmp[2]."/".$data_tmp[1]."/".$data_tmp[0];
	return $data;
}

//Muda o padr�o de hora HH:MM:SS para HH:MM
function arrumaHora($hora){
	$hora_tmp = explode(":",$hora);
	$hora = $hora_tmp[0].":".$hora_tmp[1];
	return $hora;
}

function uploadImagem($arquivo){
	
	$extensoesPermitidas = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $arquivo["name"]);
	$extensao = end($temp);
	$retorno = null;

	if ((($arquivo["type"] == "image/gif")
	|| ($arquivo["type"] == "image/jpeg")
	|| ($arquivo["type"] == "image/jpg")
	|| ($arquivo["type"] == "image/pjpeg")
	|| ($arquivo["type"] == "image/x-png")
	|| ($arquivo["type"] == "image/png"))
	&& ($arquivo["size"] < 90000000)
	&& in_array($extensao, $extensoesPermitidas)) {
		if ($arquivo["error"] > 0) {
	    	$retorno["erro"] = $arquivo["error"];
		} else {
		    if (file_exists(APRESENTACAO."/Evento/upload/" . $arquivo["name"])) {
		      $retorno["existe"] = true;
		    } else {
		      move_uploaded_file($arquivo["tmp_name"],
		      APRESENTACAO."/Evento/upload/" . $arquivo["name"]);
		      $retorno["url"] = URL."apresentacao/Evento/upload/" . $arquivo["name"];
		    	}
			}
	} else {
		$retorno["extensao"] = false;
		}

	return $retorno;
}
?>
