<?php
// se o usuario não estiver logado não tera acesso a essa pagina
include_once "../model/conexao.php";
if(isset($_SESSION['idUser']) == false){
    header("Location: ../index.php");
}else {
  include_once "../controller/c_consulta.php";
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
  <!--formulario-->
  <div class="container">
    <form method="POST" action="../controller/c_update_cadastro.php">
      <img class="rounded mx-auto d-block" src="../libs/img/logo01menor.png">
      <h3 class="text-center text-white pt-3">Atualize seu dados</h3>
      <!--linha 1-->
      <div class="row">
        <div class="form-group col-md-6">
        <input type="text" name="nome" class="form-control" placeholder="Nome" maxlength="50" value="<?php echo $listaLogged['nome']?>">
        </div>
        <div class="form-group col-md-6">
        <input type="text" name="sobreNome" class="form-control" placeholder="Sobrenome" maxlength="50"  value="<?php echo $listaLogged['sobreNome']?>" >
        </div>

        <!--linha 2-->
      <div class="w-100"></div>
        <div class="form-group col-md-6">
        <input type="text" name="email" class="form-control" placeholder="E-mail" maxlength="100" value="<?php echo $listaLogged['email']?>">
        </div>
        <div class="form-group col-md-6">
        <input type="text" name="telefone" class="form-control" placeholder="Telefone" maxlength="16" value="<?php echo $listaLogged['telefone']?>">
        </div>

          <!--linha 4-->
        <div class="w-100"></div>
          <div class="form-group col-md-6">
          <input type="text" name="nascimento" class="form-control" placeholder="Data de nacimento" maxlength="9" value="<?php echo date('d/m/Y', strtotime($listaLogged['nascimento']))?>">
          </div>
          <div class="form-group col-md-6">
          <input type="text" name="cpf" class="form-control" placeholder="CPF" maxlength="12" value="<?php echo $listaLogged['cpf']?>">
          </div>
          <div class="form-group w-100"></div>
          <button type="submit" value="cadastrar" class="btn btn-success">Salva</button>
      </div>

    </form>
  </div>
</div>

<?php

 ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
