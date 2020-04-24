<?php
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";
//if (isset($_GET['buscar']) && !empty($_GET['buscar'])){
 //$pg = addslashes($_GET['buscar']);

$pdo = conectar(); //coneão com banco de dados
$consulta = $pdo->query("SELECT * FROM habilitados WHERE id_habilitado = $id_habilitado;"); // realizando a consulta
$buscar = $consulta->fetch(PDO::FETCH_ASSOC);

$dados_agenda = buscar_dados_agenda($id_habilitado);
$dados_imagens = buscar_imagens($id_habilitado);
$dados_links = buscar_links($id_habilitado);

 ?>
