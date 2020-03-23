<?php
include_once "../libs/class/classUsuario.php";
include_once "../model/conexao.php";

$id_habilitado = addslashes($_POST['id_habilitado']);
$atual_status = addslashes($_POST['atual_status']);

if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
  $id_usuario = $_SESSION['idUser'];
  if ($id_usuario == 34) {
      include_once "../model/modelUsuario.php";
      $muda_status = atualizar_status($id_habilitado,$atual_status);
    //  header("Location: ../view/admin.php");
    header("Location: ../view/admin.php");
  }else {
    echo "Usuario não é administrado!";
  }
}else {
  header("Location: ../view/login.php");
}











 ?>
