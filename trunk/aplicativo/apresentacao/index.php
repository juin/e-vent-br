<?
session_start();

if($_SESSION['usuario']!=null){
  echo "logado.";
  ?>
  <a href="sair.php">Sair.</a>
  <?
} else {
	header("location: Usuario/index.php");
}
?>