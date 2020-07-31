<?php
include_once "../controller/c_conexao.php";

// $id_habilitado = addslashes($_POST['id_h']);
// $id_h = addslashes($_POST['id_h']);
// $id_m = addslashes($_POST['id_m']);
// if (isset($_POST['var'])) {
//   include_once "../controller/c_comentario.php";
// }
$id_habilitado = addslashes($_GET['id_h']);
$id_h = addslashes($_GET['id_h']);
$id_m = addslashes($_GET['id_m']);
if (isset($_POST['var'])) {
  include_once "../controller/c_comentario.php";
}
// if (isset($_POST['id_h']) && !empty($_POST['id_h'])) {
//   $id_habilitado = addslashes($_POST['id_h']);
//   $id_h = addslashes($_POST['id_h']);
//   //$id_m = addslashes($_GET['id_m']);
// }else {
// }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!--hack para centralizar o container-->
    <link rel="stylesheet" href="../libs/CSS/estilo.css">
    <style media="screen">
      #div1 { background: #B0C4DE;
            border-radius: 20px;
       }
      #div2 {
        background: #B0C4DE;
        height: 100px;
        width: 300px;
        position: relative;
        top: 20px;
        left: center;
      }
      #div3{
        background: #B0C4DE;
        border-radius: 20px;

      }
    </style>

</head>
<body>
<?php include "menu.php"; ?>
<?php include "../controller/c_perfil.php"; ?>
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
<!-- rede_sociais -->
<div class="card-body row">
    <a type="button" class="btn btn-outline-dark" target="_blank" href="<?php echo html_entity_decode($dados_redes['youtube']);?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-youtube"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
    </a>

    <br>
    <a type="button" class="btn btn-outline-dark" target="_blank" href="<?php echo html_entity_decode($dados_redes['twitter']);?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
    </a>
    <a type="button" class="btn btn-outline-dark" target="_blank" href="<?php echo html_entity_decode($dados_redes['linkedin']);?>">
        <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
    </a>
    <a type="button" class="btn btn-outline-dark" target="_blank" href="<?php echo html_entity_decode($dados_redes['instagram']);?>">
        <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
    </a>
    <a type="button" class="btn btn-outline-dark"  target="_blank" href="<?php echo html_entity_decode($dados_redes['facebook']);?>">
        <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
    </a>
    <a type="button" class="btn btn-outline-dark" target="_blank" href="<?php echo html_entity_decode($dados_redes['github']);?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
    </a>
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
<!--nota-->

<div class="container avaliacao " id="div3">
  <div class="row">
    <?php
    $quantidade = 0;
    $media = 0;
    $estrela1 =0;
    $estrela2 =0;
    $estrela3 =0;
    $estrela4 =0;
    $estrela5 =0;
    while ($consulta = $notas->fetch(PDO::FETCH_ASSOC)) {
      $quantidade++;
      $media = $consulta['nota'] + $media;
      if ($consulta['nota'] == 1) {
        $estrela1++;
      }
      if ($consulta['nota'] == 2) {
        $estrela2++;
      }
      if ($consulta['nota'] == 3) {
        $estrela3++;
      }
      if ($consulta['nota'] == 4) {
        $estrela4++;
      }
      if ($consulta['nota'] == 5) {
        $estrela5++;
      }
    ?>

    <?php  }?>
    <!--quatidade estrela-->
      <div class="col-4" id="div2">
                <div class=" text-center">
                      <span class="glyphicon glyphicon-user">Media</span> <br>
                      <h1 class="rating-num"><?php if ($quantidade == true) {
                        echo ''.number_format(($media)/$quantidade, 1, '.', '');
                      }  ?></h1>
                      <div class="rating">
                          <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                          </span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                          </span><span class="glyphicon glyphicon-star-empty"></span>
                      </div>
                      <div>
                          <span class="glyphicon glyphicon-user">Total de avaliações</span> <br>
                          <span class="glyphicon glyphicon-user"><?php echo ''.$quantidade; ?></span>
                      </div>
                      <!-- <div class="form-check ">
                        <div class="estrelas">
                        <input type="radio" id="cm_star-empty" name="fb" value="0" checked/>
                        <label for="cm_star-1"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-1" name="fb" value="1"/>
                        <label for="cm_star-2"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-2" name="fb" value="2"/>
                        <label for="cm_star-3"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-3" name="fb" value="3"/>
                        <label for="cm_star-4"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-4" name="fb" value="4"/>
                        <label for="cm_star-5"><i class="fa"></i></label>
                        <input type="radio" id="cm_star-5" name="fb" value="5"/>
                      </div>
                      </div> -->
                  </div>
                  </div>
  <!--fim quatidade estrela-->
  <div class="col-md-8 col-ms-6 col-8" id="div1" >
      <!--as barras-->
      <div class="col">&#9733; 5
        <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ''.number_format((($estrela5)/$quantidade)*100, 0, '.', '').'%';?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="w-100"></div>
      <div class="col">&#9733; 4
        <div class="progress">
        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo ''.number_format((($estrela4)/$quantidade)*100, 0, '.', '').'%';?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="w-100"></div>
      <div class="col">&#9733; 3
        <div class="progress">
        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo ''.number_format((($estrela3)/$quantidade)*100, 0, '.', '').'%';?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="w-100"></div>
      <div class="col ">&#9733; 2
        <div class="progress">
        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo ''.number_format((($estrela2)/$quantidade)*100, 0, '.', '').'%';?>" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="w-100"></div>
      <div class="col">&#9733; 1
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo ''.number_format((($estrela1)/$quantidade)*100, 0, '.', '').'%';?>" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <!--fim barras-->
  </div>
  </div>

  </div>




<!--fim nota-->
<br>
<!--comentarios-->
<div class="container centered row p-3 my-3 bg-dark text-white comentario" id="dev4">
  <div class="container">
    <ul class="list-unstyled">
      <?php
  while ($com = $comentarios->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <?php if ($com['id_p'] == $id_habilitado): ?>
      <li class="media my-4">
        <img src="../media/iconi/boneco.png" class="mr-3" alt="...">
        <div class="media-body">
          <h5 class="mt-0 mb-1"><?php echo $com['nome'];?></h5>
          <?php echo $com['comentario'];?>
        </div>
      </li>
    <?php endif; ?>
  <?php  }?>
  </ul>
  </div>

  <?php
  if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser']) && $_SESSION['idUser'] != $id_m){?>
<form class="row container centered row p-3 my-3 bg-dark text-white comentario" action="../controller/c_comentario.php" method="post" name="novoCOM">
  <input type="hidden" name="id_h" value="<?php echo $id_h;?>" />
  <div class="row container centered row p-3 my-3 bg-dark text-white comentario">
    <div class="col-10">
      <input type="hidden" name="habilitado" value="<?php echo $id_habilitado?>">
      <input type="hidden" name="usuario" value="<?php echo $_SESSION['idUser']?>">
      <input type="hidden" name="id_h" value="<?php echo $id_habilitado?>">
      <input type="hidden" name="id_m" value="<?php echo $id_m?>">
      <input type="hidden" name="var" value="ação">
      <div class="container">
        <div class="row">
          <div class="col">
            <textarea class="form-control" name="comentario" placeholder="Digite seu comentario" id="exampleFormControlTextarea1" rows="3"></textarea>
            <label class="sr-only" for="inlineFormInputGroupUsername2">nome de usuario</label>
          </div>

        </div>
      </div>

    </div>
    <div class="col-2">
      <!--nota-->
      <div class="col">
        <div class="input-group ">
          <div class="input-group-prepend">
            <div class="input-group-text">@ <?php echo $_SESSION['nome']; ?></div>
          </div>

        </div>
        <div class="form-check ">
          <div class="estrelas">
          <input type="radio" id="cm_star-empty" name="fb" value="0" checked/>
          <label for="cm_star-1"><i class="fa"></i></label>
          <input type="radio" id="cm_star-1" name="fb" value="1"/>
          <label for="cm_star-2"><i class="fa"></i></label>
          <input type="radio" id="cm_star-2" name="fb" value="2"/>
          <label for="cm_star-3"><i class="fa"></i></label>
          <input type="radio" id="cm_star-3" name="fb" value="3"/>
          <label for="cm_star-4"><i class="fa"></i></label>
          <input type="radio" id="cm_star-4" name="fb" value="4"/>
          <label for="cm_star-5"><i class="fa"></i></label>
          <input type="radio" id="cm_star-5" name="fb" value="5"/>
          <button type="submit" name="addcomentario"class="btn btn-primary mb-2" >Envia</button>
        </div>
        </div>
      </div>
      <!--fim nota-->
    </div>
  </div>
  </form>
  <?php }?>
</div>
<!--comentar-->

<?php include "rodape.php"; ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
