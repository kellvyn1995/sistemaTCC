<?php
include_once "../controller/c_meuPerfil.php";
$id_habilitado = $_SESSION['id_habilitado'];
include "../controller/c_perfil.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meu Perfil</title>
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
<?php include_once "../view/menu.php"; ?>

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
      <img src="<?php echo $dados_imagens['img_slide1']?>" class="d-block w-100" alt="..." >
    </div>
    <div class="carousel-item">
      <img src="<?php echo $dados_imagens['img_slide2']?>" class="d-block w-100" alt="..." >
    </div>
    <div class="carousel-item">
      <img src="<?php echo $dados_imagens['img_slide3']?>" class="d-block w-100" alt="..." >
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
<img src="<?php echo $dados_imagens['img_perfil']?>" class="card-img-top my-3" alt="...">
<div class="card-body">
<h5 class="card-title"><?php echo $buscar["nome_apresentacao"];?></h5>
<p class="card-text"><?php echo $buscar["apresentacao"];?></p>
</div>
<ul class="list-group list-group-flush">
<li class="list-group-item">Horario de atendimento das <?php echo $buscar["horario_atendimento"];?></li>
</ul>
<div class="card-body">
<a type="button" class="btn btn-warning" href="/view/agenda.php">Editar Agenda</a>
<a type="button" class="btn btn-dark" href="/view/menssagem.php">Menssagem</a>
</div>
</div>

  <!--fim informações do perfil-->
</div>


<div  class="container centered row p-3 my-3">
  <!--informações extras-->
  <div class="media col-12 col-sm-12 col-md-4">
    <img class="rounded-circle align-self-start mr-3" src="<?php echo $dados_imagens['img_descricao']?>" alt="Generic placeholder image" style="width: 300px; height: 300px;">
  </div>
  <div class="media-body col-12 col-sm-12 col-md-8">
    <h5 class="mt-0"><?php echo $buscar["titulo_descricao"];?></h5>
    <p><?php echo $buscar["texto_descricao"];?></p>
    <p></p>
  </div>


</div>

<!--Agenda-->
  <div class="container p-3 my-3">
    <table class="table table-striped">
    <thead>AGENDA
      <tr>
        <th scope="col">Data</th>
        <th scope="col">Local</th>
        <th scope="col">Evento</th>
        <th scope="col">Informações</th>
      </tr>
    </thead>
    <tbody>

      <?php
  while ($lista = $dados_agenda->fetch(PDO::FETCH_ASSOC)) {
    $id_ag = $lista['id_agenda'];
    ?>

    <tr>
      <!--mostrando resultados da consulta-->

      <input type="hidden" name="id_agenda" value="<?php echo $id_ag; ?>" />

      <td name="data_agenda"><?php echo $lista["data"]; ?></td>
      <td name="local_agenda"><?php echo $lista["local"]; ?></td>
      <td name="evento_agenda"><?php echo $lista["evento"]; ?></td>
      <td name="informacao_agenda"><?php echo $lista["informacao"]; ?></td>
    </tr>


  <?php  }?>

    </tbody>
  </table>
  </div>
<!--video-->
<div  class="container row centered row p-3 ">
  <div class="col-sm form-group embed-responsive embed-responsive-4by3 rounded" style="margin: 0px 5px 0px 0px;">
  <?php echo $a = html_entity_decode($dados_links['link1']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres?>
  </div>

  <div class="col-sm form-group embed-responsive embed-responsive-4by3 rounded" style="margin: 0px 5px 0px 0px;" >
    <?php echo $a = html_entity_decode($dados_links['link2']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres?>
  </div>

  <div class="col-sm form-group embed-responsive embed-responsive-4by3 rounded" style="margin: 0px 5px 0px 0px;">
    <?php echo $a = html_entity_decode($dados_links['link3']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres?>
  </div>
</div>
<!--fim video-->


<?php include "rodape.php"; ?>






<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
