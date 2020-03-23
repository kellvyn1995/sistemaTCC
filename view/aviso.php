
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Tela de aviso</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--hack para centralizar o container-->
    <style type="text/css">
    .centered {
    margin: 0 auto !important;
    float: none !important;
    }
    </style>
</head>
<body>
  <main>
    <div class="container-fluid col-md-6 p-3">


      <?php if (isset($_GET['aviso']) && !empty($_GET['aviso'])):
        $aviso = addslashes($_GET['aviso']);?>
      <?php endif; ?>

    <?php if ($aviso == 1): ?>
      <div class="jumbotron">
        <h1 class="display-4">Usuario não é uma habilitado acesso negado!</h1>
        <p class="lead">Para ter acesso a essa pagina realize o cadastro de habilitado</p>
        <a class="btn btn-primary btn-lg" href="../index.php" role="button">Volta para home</a>
      </div>
    <?php endif; ?>




    </div>
  </main>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
