<?php
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";
if(isset($_SESSION['id_habilitado']) && !empty($_SESSION['id_habilitado'])){
    $id_h_f = $_SESSION['id_habilitado'];
    $dados_imagens = buscar_imagens($id_h_f);
    if ($dados_imagens == false) {
    verificar_imagem($id_h_f);
  }
}else {
  echo "<script>top.window.location='../index.php';</script>";
}

// verifica se tem uma sessão para depois busca id habilitado
/*if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
  $consulta = $_SESSION['idUser'];
  $consulta = buscar_um_habilitado($consulta);
}else {
  header("Location: ../view/login.php");
} */

// esse arquivo não esta sendo usado

 ?>
