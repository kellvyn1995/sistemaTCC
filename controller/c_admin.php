<?php
include_once "../model/conexao.php";
if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])) {
}else {
  echo "<script>top.window.location='../view/aviso.php?aviso=4';</script>";

}
 ?>
