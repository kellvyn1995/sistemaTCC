<?php

include_once "../model/conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
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
<?php include "menu.php"; ?>



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
<img src="/media/fotodoperfil.jpeg" class="card-img-top my-3" alt="...">
<div class="card-body">
<h5 class="card-title">Modelo Lauanny Moreira</h5>
<p class="card-text">Modelo comecial, servir como ajuda visual para fotografias de roupas e acessorios</p>
</div>
<ul class="list-group list-group-flush">
<li class="list-group-item">Horario de atendimento das 08:00 as 17:00</li>
</ul>
<div class="card-body">
<button type="button" class="btn btn-dark">Contratar</button>
<a type="button" class="btn btn-warning" href="/view/agenda.php">Consulta Agenda</a>
</div>
</div>

  <!--fim informações do perfil-->
</div>


<div  class="container centered row p-3 my-3">
  <!--informações extras-->
  <div class="media col-12 col-sm-12 col-md-4">
    <img class="rounded-circle align-self-start mr-3" src="/media/06.jpeg" alt="Generic placeholder image" style="width: 300px; height: 300px;">
  </div>
  <div class="media-body col-12 col-sm-12 col-md-8">
    <h5 class="mt-0">Top-aligned media</h5>
    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
    <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
  </div>


</div>

<!--video-->
<div  class="container centered row p-3 my-3">
  <div class="col-4 form-group embed-responsive embed-responsive-4by3">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/jh-OwzU2Qj8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

  <div class="col-4 form-group embed-responsive embed-responsive-4by3">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/jh-OwzU2Qj8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

  <div class="col-4 form-group embed-responsive embed-responsive-4by3">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/jh-OwzU2Qj8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>

</div>
<!--fim video-->

<?php include "rodape.php"; ?>






<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
