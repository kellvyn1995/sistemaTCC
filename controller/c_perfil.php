<?php
include_once "../model/conexao.php";
//if (isset($_GET['buscar']) && !empty($_GET['buscar'])){
 //$pg = addslashes($_GET['buscar']);

$pdo = conectar(); //coneão com banco de dados
$consulta = $pdo->query("SELECT * FROM habilitados WHERE id_habilitado = $id_habilitado;"); // realizando a consulta
$buscar = $consulta->fetch(PDO::FETCH_ASSOC)


 ?>
