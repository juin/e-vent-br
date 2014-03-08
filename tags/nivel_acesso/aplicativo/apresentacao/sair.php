<?
session_start();
//libera o espaco ocupado por $_SESSION
session_destroy(); 
header("location:index.php");
?>