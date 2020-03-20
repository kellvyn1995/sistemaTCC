<?php
// se o usuario estiver logado não tera acesso a essa pagina
include_once "../model/conexao.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    header("Location: ../index.php");
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>cadastrto de usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<!--conteiner-->
<div class="container p-3 my-3 bg-dark text-white">


  <?php $pg = addslashes($_GET['pg']); if (isset($_GET['pg']) && !empty($_GET['pg'])): ?>
    <div class="alert alert-danger" role="alert">
      <?php
      // verificação de ERRo
      switch ($pg) {
        case '1':
          echo "Preencha todos os campos";
          $pg = 0;
        break;
        case '2':
            echo "Senha diferente de confirmar senha";
            $pg = 0;
        break;
        case '3':
            echo "CPF invalido";
            $pg = 0;
        break;
      }
       ?>
    </div>
  <?php endif; ?>


  <!--formulario-->
  <div class="container">
    <form method="POST" action="../controller/c_cadastro.php">
      <h3 class="text-center text-white pt-3">REALIZE SEU CADASTRO</h3>
      <!--linha 1-->
      <div class="row">
        <div class="form-group col-md-6">
        <input type="text" name="nome" class="form-control" placeholder="Nome" maxlength="50">
        </div>
        <div class="form-group col-md-6">
        <input type="text" name="sobreNome" class="form-control" placeholder="Sobrenome" maxlength="50">
        </div>

        <!--linha 2-->
      <div class="w-100"></div>
        <div class="form-group col-md-6">
        <input type="text" name="email" class="form-control" placeholder="E-mail" maxlength="100">
        </div>
        <div class="form-group col-md-6">
        <input type="text" name="telefone" class="form-control" placeholder="Telefone" maxlength="16">
        </div>
        <!--linha 3-->
        <div class=" w-100"></div>
          <div class="form-group col-md-6">
          <input type="password" name="senha" class="form-control" placeholder="Senha" maxlength="16">
          </div>
          <div class="form-group col-md-6">
          <input type="password" name="confirmarSenha" class="form-control" placeholder="Confirmar senha" maxlength="16">
          </div>
          <!--linha 4-->
        <div class="w-100"></div>
          <div class="form-group col-md-6">
          <input type="text" name="nascimento" class="form-control" placeholder="Data de nacimento" maxlength="10">
          </div>
          <div class="form-group col-md-6">
          <input type="text" name="cpf" class="form-control" placeholder="CPF" maxlength="12">
          </div>
          <div class="form-group w-100"></div>
          <button type="submit" value="cadastrar" class="btn btn-success">Cadastrar</button>
      </div>

    </form>
  </div>
</div>

<?php
// verificar se clicou no botão
 /* if(isset($_POST['nome'])){
  $nome = addslashes($_POST['nome']);
  $sobreNome = addslashes($_POST['sobreNome']);
  $email = addslashes($_POST['email']);
  $telefone = addslashes($_POST['telefone']);
  $senha = addslashes($_POST['senha']);
  $confirmarSenha = addslashes($_POST['confirmarSenha']);
  $nascimento = addslashes($_POST['nascimento']);
  $cpf = addslashes($_POST['cpf']);
  //verificar se esta preenchido
  if (!empty($nome) && !empty($sobreNome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($nascimento) && !empty($cpf)) {
      {
          if ($senha == $confirmarSenha) {
            if ($u->cadastrar($nome, $sobreNome, $email, $telefone, $senha, $nascimento, $cpf)) {
              echo "cadastrado com sucesso! acesse para entrar";
            }else {
              echo "Email ja cadastrado!";
            }
          }else {
            echo "senha e confirmarSenha não correspondem!";
          }
      }else {
        echo "ERRO: ".$u->msgErro;
      }
  }else {
    echo "Preencha todos os campos!";
  }

} */

 ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
