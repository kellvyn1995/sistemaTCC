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
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
  <div id="login">
          <h3 class="text-center text-white pt-5">Login form</h3>
          <div class="container">
              <div id="login-row" class="row justify-content-center align-items-center">
                  <div id="login-column" class="col-md-6">
                      <div id="login-box" class="col-md-12">
                        <!-- verificação de erro -->
                        <?php if (isset($_GET['erro']) && !empty($_GET['erro'])): $erro = addslashes($_GET['erro']);  ?>
                          <div class="alert alert-danger" role="alert">
                            <?php
                            // verificação de ERRo
                            switch ($erro) {
                              case '1':
                                echo "Email ou senha esta incorreto! ";
                                $pg = 0;
                              break;
                              case '2':
                                  echo "Preencha todos os campos coretamente!";
                                  $pg = 0;
                              break;

                            }
                             ?>
                          </div>
                        <?php endif; ?>
                          <form id="login-form" class="form" action="/controller/c_login.php" method="POST">
                            <img class="rounded mx-auto d-block" src="../libs/img/logo01menor.png">
                              <h3 class="text-center text-dark">Entre na sua conta</h3>
                              <div class="form-group">
                                  <label for="username" class="text-dark">E-mail:</label><br>
                                  <input type="email" name="email"  class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="password" class="text-dark">Senha:</label><br>
                                  <input type="password" name="senha" class="form-control">
                              </div>
                              <div class="form-group">
                                  <input type="submit" name="submit" class="btn btn-dark btn-md" value="Entra">
                              </div>
                              <div id="register-link" class="text-right">
                                  <a href="/view/cadastroUsuario.php?pg=" class="text-info">Não sou Cadastrado</a>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>





<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
