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

function uploadImagem($arguivo){
	
$extensoesPermitidas = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extensao = end($temp);
$retorno = "";

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000)
&& in_array($extensao, $extensoesPermitidas)) {
  if ($_FILES["file"]["error"] > 0) {
    $retorno = "Código Retornado: " . $_FILES["file"]["error"] . "<br>";
  } else {
    $retorno = "Upload: " . $_FILES["file"]["name"] . "<br>";
    $retorno .= "Tipo: " . $_FILES["file"]["type"] . "<br>";
    $retorno .= "Tamanho: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    $retorno .= "Arquivo Temporário: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("/apresentacao/Evento/upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " já existe. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "/apresentacao/Evento/upload/" . $_FILES["file"]["name"]);
      echo "Armazenado em: " . "/apresentacao/Evento/upload/" . $_FILES["file"]["name"];
    }
  }
} else {
  echo "Arquivo inválido";
}
}
?>
