<?php
include_once "../libs/class/classUsuario.php";
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";


$dados_usuario = new Usuario();
$dados_usuario->setNome($_POST['nome']);
$dados_usuario->setSobreNome($_POST['sobreNome']);
$dados_usuario->setEmail($_POST['email']);
$dados_usuario->setTelefone($_POST['telefone']);
$dados_usuario->setSenha (md5($_POST['senha']));
$confirmarSenha = addslashes (md5($_POST['confirmarSenha']));
$dados_usuario->setNascimento($_POST['nascimento']);
$dados_usuario->setCpf($_POST['cpf']);

// se todos os campos forem diferente de vazio entra na condição
if (!empty($dados_usuario->getNome()) && !empty($dados_usuario->getSobreNome()) && !empty($dados_usuario->getEmail()) && !empty($dados_usuario->getTelefone()) && !empty($dados_usuario->getSenha()) && !empty($dados_usuario->getNascimento()) && !empty($dados_usuario->getCpf())) {
  //validar cpf
  $c = $dados_usuario->getCpf();
  $verificar_cpf = verifyCPF($c);
  if ($verificar_cpf == true) {
        // verificar se ja esta cadastrado o email, se retorna false e porque não esta cadastrado
        if (verificarEmail($dados_usuario) == false) {
          //verificar senha
          if ($confirmarSenha == $dados_usuario->getSenha() ) {
            include_once "../model/modelUsuario.php";
            $status = cadastrar($dados_usuario);
                if ($status) {
                  echo "cadastra realizado";
                }
          }else {
            header("Location: ../view/cadastroUsuario.php?pg=2");
          }
        }else {
          header("Location: ../view/cadastroUsuario.php?pg=4");
        }
  }else {
    header("Location: ../view/cadastroUsuario.php?pg=3");
  }
}else {
  header("Location: ../view/cadastroUsuario.php?pg=1");
}



/*
//verificar senha
if ($confirmarSenha == $dados_usuario->getSenha() ) {
  include_once "../model/modelUsuario.php";
  $status = cadastrar($dados_usuario);
      if ($status) {
        echo "cadastra realizado";
      }
}else {
  header("Location: ../view/cadastroUsuario.php?pg=2");
}
*/





 ?>
