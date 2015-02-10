<?php
require_once(dirname(__FILE__).'/../config.php');
session_start();
//libera o espaco ocupado por $_SESSION
session_destroy(); 
header('location:'.URL.'index.php');
?>