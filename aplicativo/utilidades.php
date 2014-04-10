<?php

// verifica se ocorreu um envio do formulario atraves do metodo POST
function isPostBack() { 
    return ($_SERVER['REQUEST_METHOD'] == 'POST');
}

?>
