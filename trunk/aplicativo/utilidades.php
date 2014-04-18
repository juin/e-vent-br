<?php

// verifica se ocorreu um envio do formulario atraves do metodo POST
function isPostBack() { 
    return ($_SERVER['REQUEST_METHOD'] == 'POST');
}

//Muda o padrão de data do SQL para "Normal" (YYYY-MM-DD => DD-MM-YYYY)
function arrumaData($data){
	$data_tmp = explode("-",$data);
	$data = $data_tmp[2]."/".$data_tmp[1]."/".$data_tmp[0];
	return $data;
}

?>
