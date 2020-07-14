<?php
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";
$id_habilitado = $_SESSION['id_habilitado'];

$pdo = conectar(); //coneão com banco de dados
$consulta = $pdo->query("SELECT * FROM habilitados WHERE id_habilitado = $id_habilitado;"); // realizando a consulta
$buscar = $consulta->fetch(PDO::FETCH_ASSOC);



$comentariostodos = buscar_comentario($id_habilitado);
$notas = buscar_nota_comentario($id_habilitado);

 ?>
