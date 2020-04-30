<?php
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";
$com = addslashes($_POST['comentario']);
$nota = addslashes($_POST['fb']);
$id_u = addslashes($_POST['usuario']);
$id_p = addslashes($_POST['habilitado']);

$anota = add_comentario($com,$nota,$id_u,$id_p);

 ?>
