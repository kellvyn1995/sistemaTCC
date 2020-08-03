
<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ajuda</title>
    <style type="text/css">
    .centered {
    margin: 0 auto !important;
    float: none !important;
    }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php include "menu.php"; ?>


<div class="row mx-auto p-8 my-4" style="width: 1200px;">
  <div class="col-sm-8" style="background-color: red">col-sm-8</div>
  <div class="col-sm-4" style="background-color: blue">col-sm-4</div>
</div>

<div class="row mx-auto" style="width: 1200px;">
  <div class="col-sm-8" style="background-color: red">col-sm-8</div>
  <div class="col-sm-4" style="background-color: blue">col-sm-4</div>
</div>

<div class="row no-gutters">
  <div class="col-6 col-md-4">.col-6 .col-md-4</div>
  <div class="col-12 col-sm-6 col-md-8">.col-12 .col-sm-6 .col-md-8</div>

</div>


<div  class="container centered row p-3 my-3">

    <!--slide de fotos-->

    <div class="row col-12 col-sm-12 col-md-8">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/media/01.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/media/02.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/media/03.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/media/04.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/media/04.jpeg" class="d-block w-100" alt="...">
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
    </div>

   <!--fim slide de fotos-->
   <!--informações do perfil-->

<div class="card row col-12 col-sm-12 col-md-4" style="width: 18rem;">
<img src="/media/fotodoperfil.jpeg" class="card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title">Modelo Lauanny Moreira</h5>
<p class="card-text">Modelo comecial, servir como ajuda visual para fotografias de roupas e acessorios</p>
</div>
<ul class="list-group list-group-flush">
<li class="list-group-item">Horario de atendimento das 08:00 as 17:00</li>
</ul>
<div class="card-body">
<button type="button" class="btn btn-dark">Contratar</button>
<button type="button" class="btn btn-warning">Consulta Agenda</button>
</div>
</div>

  <!--fim informações do perfil-->
</div>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
