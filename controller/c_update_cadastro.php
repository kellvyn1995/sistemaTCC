<?php

include_once "../libs/class/classUsuario.php";
include_once "../model/conexao.php";

$dados_usuario = new Usuario();
$dados_usuario->setNome($_POST['nome']);
$dados_usuario->setSobreNome($_POST['sobreNome']);
$dados_usuario->setEmail($_POST['email']);
$dados_usuario->setTelefone($_POST['telefone']);
$dados_usuario->setNascimento($_POST['nascimento']);
$dados_usuario->setCpf($_POST['cpf']);

include_once "../model/modelUsuario.php";

$status = atualizar_usuario($dados_usuario);
if ($status) {
  echo "<script>top.window.location='../view/aviso.php?aviso=5';</script>";
}


 ?>
