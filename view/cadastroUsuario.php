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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
          echo "Preencha todos os campos coretamente! ";
          $pg = 0;
        break;
        case '2':
            echo "Senha diferente de confirmar senha!";
            $pg = 0;
        break;
        case '3':
            echo "CPF invalido!";
            $pg = 0;
        break;
        case '4':
            echo "E-mail já esta cadastrado!";
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
          <label for="">Nome</label>
          <?php if (isset($_SESSION['tnome']) && !empty($_SESSION['tnome'])): ?>
            <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo $_SESSION['tnome']?>" maxlength="50">
          <?php endif; ?>
          <?php if (empty($_SESSION['tnome'])): ?>
            <input type="text" name="nome" class="form-control" placeholder="Nome" maxlength="50">
          <?php endif; ?>

        </div>
        <div class="form-group col-md-6">
          <label for="">Sobrenome</label>
          <?php if (isset($_SESSION['tsobrenome']) && !empty($_SESSION['tsobrenome'])): ?>
            <input type="text" name="sobreNome" class="form-control" placeholder="Sobrenome" value="<?php echo $_SESSION['tsobrenome']?>" maxlength="50">
          <?php endif; ?>
          <?php if (empty($_SESSION['tsobrenome'])): ?>
            <input type="text" name="sobreNome" class="form-control" placeholder="Sobrenome" maxlength="50">
          <?php endif; ?>

        </div>

        <!--linha 2-->
      <div class="w-100"></div>
        <div class="form-group col-md-6">
          <label for="">E-mail</label>
          <?php if (isset($_SESSION['temail']) && !empty($_SESSION['temail'])): ?>
            <input type="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo $_SESSION['temail']?>" maxlength="100">
          <?php endif; ?>
          <?php if (empty($_SESSION['temail'])): ?>
            <input type="email" name="email" class="form-control" placeholder="E-mail" maxlength="100">
          <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
          <label for="">Telefone</label>
          <?php if (isset($_SESSION['ttelefone']) && !empty($_SESSION['ttelefone'])): ?>
            <input type="text" data-mask="(00) 00000-0000" name="telefone" class="form-control" value="<?php echo $_SESSION['ttelefone']?>"placeholder="Telefone" maxlength="16">
          <?php endif; ?>
          <?php if (empty($_SESSION['ttelefone'])): ?>
            <input type="text" data-mask="(00) 00000-0000" name="telefone" class="form-control" placeholder="Telefone" maxlength="16">
          <?php endif; ?>
        </div>
        <!--linha 3-->
        <div class=" w-100"></div>
          <div class="form-group col-md-6">
            <label for="">Senha</label>
          <input type="password" name="senha" class="form-control" placeholder="Senha" minlength="8" maxlength="16">
          </div>
          <div class="form-group col-md-6">
            <label for="">Confirmar senha</label>
          <input type="password" name="confirmarSenha" class="form-control" placeholder="Confirmar senha" minlength="8" maxlength="16">
          </div>
          <!--linha 4-->
        <div class="w-100"></div>
          <div class="form-group col-md-6">
            <label for="">Data de nacimento</label>
            <?php if (isset($_SESSION['tnascimento']) && !empty($_SESSION['tnascimento'])): ?>
              <input type="text"  data-mask="00/00/0000" name="nascimento" class="form-control" value="<?php echo $_SESSION['tnascimento']?>" placeholder="Nascimento" maxlength="10">
            <?php endif; ?>
            <?php if (empty($_SESSION['tnascimento'])): ?>
              <input type="text"  data-mask="00/00/0000" name="nascimento" class="form-control" placeholder="Nascimento" maxlength="10">
            <?php endif; ?>
          </div>
          <div class="form-group col-md-6">
            <label for="">CPF</label>
            <?php if (isset($_SESSION['tcpf']) && !empty($_SESSION['tcpf'])): ?>
              <input type="text" data-mask="000.000.000-00" name="cpf" class="form-control" value="<?php echo $_SESSION['tcpf']?>" placeholder="CPF" maxlength="12">
            <?php endif; ?>
            <?php if (empty($_SESSION['tcpf'])): ?>
              <input type="text" data-mask="000.000.000-00" name="cpf" class="form-control"  placeholder="CPF" maxlength="12">
            <?php endif; ?>
          </div>
          <div class="form-group w-100"></div>
          <button type="submit" value="cadastrar" class="btn btn-success">Cadastrar</button>
      </div>

    </form>
  </div>
</div>
<?php
unset($_SESSION['tnome']);
unset($_SESSION['tsobrenome']);
unset($_SESSION['temail']);
unset($_SESSION['tcpf']);
unset($_SESSION['tnascimento']);

 ?>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<!--para utilizar as mascaras no input-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
