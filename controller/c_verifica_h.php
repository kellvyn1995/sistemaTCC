<?php
include_once "../model/conexao.php";
// verifica se tem uma sessão para depois busca id habilitado
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
  $consulta = $_SESSION['idUser'];
  $consulta = buscar_um_habilitado($consulta);
}else {
  header("Location: ../view/login.php");
}

// esse arquivo não esta sendo usado

 ?>
