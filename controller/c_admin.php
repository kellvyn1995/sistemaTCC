<?php
include_once "../model/conexao.php";
if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])) {
}else {
  header("Location: ../view/aviso?aviso=4.php");
}
 ?>
