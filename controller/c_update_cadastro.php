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
  echo "atualizado";
}

/*include_once "../model/conexao.php";
$pdo=conectar();
// RECEBENDO DADOS
$id = $_SESSION['idUser'];
$nome=addslashes($_POST['nome']);
$sobreNome=addslashes($_POST['sobreNome']);
$email=addslashes($_POST['email']);
$telefone=addslashes($_POST['telefone']);
$nascimento=addslashes($_POST['nascimento']);
$cpf=addslashes($_POST['cpf']);

//realizando a atualizar
$atualizar_usuario = $pdo->prepare('UPDATE usuarios SET nome = :nome,
      sobreNome = :sobreNome,
      email = :email,
      telefone = :telefone,
      nascimento = :nascimento,
      cpf = :cpf
      WHERE id = :id');

      $atualizar_usuario->bindValue(":nome",$nome);
      $atualizar_usuario->bindValue(":sobreNome",$sobreNome);
      $atualizar_usuario->bindValue(":email",$email);
      $atualizar_usuario->bindValue(":telefone",$telefone);
      $atualizar_usuario->bindValue(":nascimento",$nascimento);
      $atualizar_usuario->bindValue(":cpf",$cpf);
      $atualizar_usuario->bindValue(":id",$id);

      $atualizar_usuario->execute();*/

 ?>
