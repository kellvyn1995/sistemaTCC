<?php

//e se email e senha for diferente de vazio o if receber os dados
if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {

  include_once "../model/conexao.php";
  include_once "../model/modelUsuario.php";

  $u = new Logar();

  $email = addslashes($_POST['email']);
  $senha = addslashes($_POST['senha']);

  // se a condição for verdadeira o usuario volta pra tela index se não volta pra tela de login
  if ($u->login($email, $senha) == true) {

    if (isset($_SESSION['idUser'])) {
          // verificar se o usuario e um habilitado se sim sera criado uma sessão habiltado
          $a = $_SESSION['idUser'];
          if ($u->buscar_um_habilitado($a)) {
            header("Location: ../view/meuPerfil.php");


          }else {
            header("Location: ../index.php?pg=index");
          }
    }else {
      header("Location: ../view/login.php");
    }

  }else {
    // usuario e senha incoreto
    header("Location: ../view/login.php?erro=1");
  }
}else {
  // ser os dados não forem informados, será redirecionado para pagina de login
  header("Location: ../view/login.php?erro=2");
}



 ?>
