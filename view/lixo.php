<?php
include_once "../controller/c_meuPerfil.php";
$id_habilitado = $_SESSION['id_habilitado'];
include "../controller/c_perfil.php";
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

  <div class="col-4 form-group embed-responsive embed-responsive-4by3" >
    <iframe style="margin: 5px;" width="560" height="315" src="https://www.youtube.com/embed/jh-OwzU2Qj8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen  ></iframe>
  </div>
  <div class="col-4 form-group embed-responsive embed-responsive-4by3" >
    <?php $a = html_entity_decode($dados_links['link1']);
    echo $a;
     ?>

    <input type="text" name="" value=" <?php html_entity_decode($dados_links['link1']); ?>">

  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
