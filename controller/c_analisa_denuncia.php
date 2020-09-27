<?php
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";

$id_do_h = addslashes($_GET['id_hx']);
$habilitados_x = buscar_habilitados_x($id_do_h);

 ?>
