<?php
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";
//if (isset($_GET['buscar']) && !empty($_GET['buscar'])){
 //$pg = addslashes($_GET['buscar']);

// if (isset($_GET['id_h']) && !empty($_GET['id_h'])) {
//   $id_habilitado = addslashes($_GET['id_h']);
//   $id_h = addslashes($_GET['id_h']);
//   $id_m = addslashes($_GET['id_m']);
//   if (isset($_POST['var'])) {
//     include_once "../controller/c_comentario.php";
//   }
// }


$pdo = conectar(); //conxeão com banco de dados
$consulta = $pdo->query("SELECT * FROM habilitados WHERE id_habilitado = $id_habilitado;"); // realizando a consulta
$buscar = $consulta->fetch(PDO::FETCH_ASSOC);

$dados_agenda = buscar_dados_agenda($id_habilitado);
$dados_imagens = buscar_imagens($id_habilitado);
$dados_links = buscar_links($id_habilitado);
$comentarios = buscar_comentario_5($id_habilitado);
$comentariostodos = buscar_comentario($id_habilitado);
$notas = buscar_nota_comentario($id_habilitado);
$dados_redes = buscar_redes($id_habilitado);
if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {
  $comentarioemcontrado = comentario_encontrado($_SESSION['idUser'],$id_habilitado);
}

 // realizar busca pra saber ser o usuario já fez algum comentario
// $minhase = $_SESSION['idUser'];
// while ($comf = $comentariostodos->fetch(PDO::FETCH_ASSOC)) {
// if ($comf['id_p'] == $id_habilitado && $comf['id_u'] == $minhase) {
//   $comentarioemcontrado = 1;
// }else {
//   $comentarioemcontrado = 0;
// }
// }
 ?>
