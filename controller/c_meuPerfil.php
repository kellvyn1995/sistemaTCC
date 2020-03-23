<?php
// se o usuario não estiver logado não tera acesso
include_once "../model/conexao.php";
if(isset($_SESSION['id_habilitado']) && !empty($_SESSION['id_habilitado'])){
  $pdo = conectar(); //coneão com banco de dados
  $id = $_SESSION['id_habilitado'];
  $consulta = $pdo->query("SELECT * FROM habilitados WHERE id_habilitado = $id;"); // realizando a consulta
  $buscar = $consulta->fetch(PDO::FETCH_ASSOC);
}else {
  header("Location: ../view/aviso.php?aviso=1");
}

 ?>
