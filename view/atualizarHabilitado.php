<?php
// se o usuario estiver logado não tera acesso a essa pagina

include_once "../controller/c_consulta.php";
include_once "../controller/c_verifica_h.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .miniatura {
        height: 150px;
        border: 1px solid #000;
        margin: 10px 5px 0 0;
        }
    </style>
    <script src="/scripts/snippet-javascript-console.min.js?v=1"></script>
</head>
<body>
<?php include_once "../view/menu.php"; ?>
<!--conteiner-->
<div class="container p-3 my-3 bg-dark text-white">
  <!--formulario-->
  <div class="container">
    <form method="post" action="../controller/c_update_habilitado.php">
      <h3 class="text-center text-white pt-3">EDITAR HABILITADO</h3>
      <!--linha 1-->
      <div class="row">
        <div class="form-group col-md-6">
          <label for="">Nome de Apresentação</label>
        <input type="text" name="nome_apresentacao" class="form-control"  maxlength="50" value="<?php echo $dados_habilitado['nome_apresentacao']?>" >
        <label for="" class="my-2">Horario de atendimento</label>
        <input type="text" data-mask="00:00 as 00:00" name="horario_atendimento" class="form-control"  maxlength="50" value="<?php echo $dados_habilitado['horario_atendimento']?>">

        <label for="" class="my-2">Titulo do texto de descrição</label>
          <input type="text" name="titulo_descricao" class="form-control"  maxlength="50" value="<?php echo $dados_habilitado['titulo_descricao']?>">
        </div>
        <div class="form-group col-md-6">
          <label for="exampleFormControlTextarea1">Apresentação</label>
          <textarea class="form-control" name="apresentacao" id="exampleFormControlTextarea1"  rows="3" ><?php echo $dados_habilitado['apresentacao']?></textarea>
          <label for="" class="my-2">Texto de descrição</label>
          <textarea class="form-control" name="texto_descricao"  id="exampleFormControlTextarea1" rows="3" ><?php echo $dados_habilitado['texto_descricao']?></textarea>
        </div>
        <h5>hashtags relacionadas a você</h5>
        <div class="form-group col-md-6">
          <label for="">exemplo: #moda #cultura #teatro</label>
        <input type="text" name="hashtags" class="form-control"  maxlength="255" value="<?php echo $dados_habilitado['hashtags']?> " >
        </div>
          <div class="form-group w-100"></div>
          <button type="submit" name="atualiza" class="btn btn-success">Salva</button>
      </div>

    </form>
  </div>
</div>


<!--conteiner-->
<div class="container p-3 my-3 bg-dark text-white">
  <?php if ($dados_imagens): ?>
    <div class="row">
      <div class="col">Foto perfil <img src="<?php echo $dados_imagens['img_perfil']?>" height="200" width="300" class="rounded mx-auto d-block "></div>
      <div class="col">slide 1 <img src="<?php echo $dados_imagens['img_slide1']?>" height="200" width="300" class="rounded mx-auto d-block" ></div>
      <div class="col">slide 2 <img src="<?php echo $dados_imagens['img_slide2']?>" height="200" width="300" class="rounded mx-auto d-block"></div>
      <div class="col">slide 3 <img src="<?php echo $dados_imagens['img_slide3']?>" height="200" width="300" class="rounded mx-auto d-block"></div>
      <div class="col">Foto descrição <img src="<?php echo $dados_imagens['img_descricao']?>" height="200" width="300" class="rounded mx-auto d-block"></div>
    </div>
    <div class="col"><button type="button" class="btn btn-light rounded mx-auto d-block my-5" data-toggle="modal" data-target="#siteModal2" >TROCA FOTOS</button></div>
  <?php endif; ?>
  <?php if ($dados_imagens == false): ?>
    <h5>você não possui fotos!</h5>
      <div class="col"><button type="button" class="btn btn-light rounded mx-auto d-block my-5" data-toggle="modal" data-target="#siteModal1" >Adicionar fotos</button></div>
  <?php endif; ?>
    <!--  <input type="file" name="perfil">
      <input type="file" name="slide1">
      <input type="file" name="slide2">
      <input type="file" name="slide3">
      <input type="file" name="img_descricao">
      <button type="submit" name="add_img" class="btn btn-success">teste</button> -->
</div>
<!--link para os videos-->
<div class="container p-3 my-3 bg-dark text-white">
    <form class="" action="../controller/c_update_habilitado.php" method="post">
      <input type="hidden" name="id_links" class="form-control"  maxlength="" value=" <?php echo $dados_links['id_links'];?>" >
      <h5>LINK dos seus videos</h5>
      <div class="container row centered row  ">

        <?php if (!empty($dados_links['link1'])): ?>
          <div class="col-sm-3 form-group embed-responsive embed-responsive-4by3 rounded" style="margin: 5px 5px 0px 0px;">
          <?php echo $a = html_entity_decode($dados_links['link1']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres?>
          </div>
        <?php endif; ?>
        <?php if (empty($dados_links['link1'])): ?>
          <label for="">video 1</label>
          <input type="text" name="link1" class="form-control"  maxlength="" value="" >
        <?php endif; ?>

        <?php if (!empty($dados_links['link2'])): ?>
          <div class="col-sm-3 form-group embed-responsive embed-responsive-4by3 rounded" style="margin: 5px 5px 0px 0px;">
          <?php echo $a = html_entity_decode($dados_links['link2']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres?>
          </div>
        <?php endif; ?>
        <?php if (empty($dados_links['link2'])): ?>
            <label for="" class="my-2">video 2</label>
          <input type="text" name="link2" class="form-control"  maxlength="" value="" >
        <?php endif; ?>

        <?php if (!empty($dados_links['link3'])): ?>
          <div class="col-sm-3 form-group embed-responsive embed-responsive-4by3 rounded" style="margin: 5px 5px 0px 0px;">
          <?php echo $a = html_entity_decode($dados_links['link3']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres?>
          </div>
        <?php endif; ?>
        <?php if (empty($dados_links['link3'])): ?>
            <label for="" class="my-2">video 3</label>
          <input type="text" name="link3" class="form-control"  maxlength="" value="" >
        <?php endif; ?>
      </div>
      <?php if (empty($dados_links['id_links'])): ?>
        <button type="submit" name="add_links" class="btn btn-success">Add videos</button>
      <?php endif; ?>
      <?php if (!empty($dados_links['id_links'])): ?>
        <div class="" style="margin: 5px 5px 0px 0px;">
          <button type="submit" name="delete_link" class="btn btn-danger">Deleta videos</button>
        </div>
      <?php endif; ?>

    </form>
</div>
<!-- redes sociais -->
<div class="container p-3 my-3 bg-dark text-white">
  <h5>LINK das suas redes sociais</h5>
  <form class="" action="../controller/c_update_habilitado.php" method="post">
    <?php if (!empty($dados_redes['youtube'])): ?>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">YouTube</span>
        </div>
        <input type="text" name="youtube" value="<?php  echo $dados_redes['youtube']?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
    <?php endif; ?>
    <?php if (empty($dados_redes['youtube'])): ?>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">YouTube</span>
        </div>
        <input type="text" name="youtube" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
    <?php endif; ?>

    <?php if (!empty($dados_redes['twitter'])): ?>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group input-group-sm mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Twitter</span>
          </div>
          <input type="text" name="twitter" value="<?php  echo $dados_redes['twitter']?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>
    <?php endif; ?>
    <?php if (empty($dados_redes['twitter'])): ?>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Twitter</span>
        </div>
        <input type="text" name="twitter" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
    <?php endif; ?>

    <?php if (!empty($dados_redes['linkedin'])): ?>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">LinkedIn</span>
        </div>
        <input type="text" name="linkedin" value="<?php  echo $dados_redes['linkedin']?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
    <?php endif; ?>
    <?php if (empty($dados_redes['linkedin'])): ?>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">LinkedIn</span>
        </div>
        <input type="text" name="linkedin" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
    <?php endif; ?>

    <?php if (!empty($dados_redes['instagram'])): ?>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Instagram</span>
        </div>
        <input type="text" name="instagram" value="<?php  echo $dados_redes['instagram']?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
    <?php endif; ?>
    <?php if (empty($dados_redes['instagram'])): ?>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Instagram</span>
        </div>
        <input type="text" name="instagram" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
    <?php endif; ?>

    <?php if (!empty($dados_redes['facebook'])): ?>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Facebook</span>
        </div>
        <input type="text" name="youtube" value="<?php  echo $dados_redes['facebook']?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
    <?php endif; ?>
    <?php if (empty($dados_redes['facebook'])): ?>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">Facebook</span>
        </div>
        <input type="text" name="facebook" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
    <?php endif; ?>

    <?php if (!empty($dados_redes['github'])): ?>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">GitHub</span>
        </div>
        <input type="text" name="github" value="<?php  echo $dados_redes['github']?>" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
    <?php endif; ?>
    <?php if (empty($dados_redes['github'])): ?>
      <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-sm">GitHub</span>
        </div>
        <input type="text" name="github" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
      </div>
    <?php endif; ?>

    <div class="form-group w-100"></div>
    <!-- condição do botão -->
    <?php if ($dados_redes['id_hab'] == $_SESSION['id_habilitado']): ?>
      <input type="hidden" name="id_rede" value="<?php  echo $dados_redes['id_rede']?>">
      <button type="submit" name="atualiza_redes" class="btn btn-success">Atualiza</button>
    <?php endif; ?>
    <?php if (empty($dados_redes['id_hab'])): ?>
      <button type="submit" name="add_redes" class="btn btn-success">Salva</button>
    <?php endif; ?>

  </form>
</div>

<!--  MODAL -->
<form class="" action="../controller/c_update_habilitado.php" method="POST" enctype="multipart/form-data">
  <div class="modal fade" id="siteModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
              <h5>Preencha todos os campos para realizar a troca das fotos</h5>
              <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <!--  grupos de entrada -->
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Foto perfil</span>
                </div>
                <input type="file" name="perfil"  id="addFotoGaleria1"  >
                <div class="perfil" ></div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Slide 1</span>
                </div>
                <input type="file" name="slide1" multiple id="addFotoGaleria2" >
                <div class="slide1"></div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Slide 2</span>
                </div>
                <input type="file" name="slide2" multiple id="addFotoGaleria3">
                <div class="slide2"></div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Slide 3</span>
                </div>
                <input type="file" name="slide3" multiple id="addFotoGaleria4">
                <div class="slide3"></div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Foto descrição</span>
                </div>
                <input type="file" name="img_descricao" multiple id="addFotoGaleria5">
                <div class="img_descricao"></div>
              </div>
            </div>
              <div class="modal-footer">
                <button type="submit" name="add_img" class="btn btn-success" data-mimiss="modal" >Adicionar</button>
              </div>



      </div>

    </div>

  </div>
</form>

<!--  MODAL 2-->
<form class="" action="../controller/c_update_habilitado.php" method="POST" enctype="multipart/form-data">
  <div class="modal fade" id="siteModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
              <h5>Para realizar a troca das fotos é necessario apaga as atuais</h5>
              <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <input type="hidden" name="id_img" value="<?php echo $dados_imagens['id_imagem']?>" />
              <input type="hidden" name="id_h" value="<?php echo $dados_habilitado['id_habilitado']?>" />
              <!--  grupos de entrada -->
              <h3>Deseja apaga todas as fotos?</h3>
              <div class="modal-footer">
                <button type="submit" name="delete" class="btn btn-success" data-mimiss="modal" >Sim</button>
              </div>
      </div>

    </div>

  </div>
  </div>
</form>



<!--O que este código vai fazer é ler o ficheiro enviado e apresentar antes de efetuar alguma ação como o Upload.-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
        $(function() {
// Pré-visualização de várias imagens no navegador
var visualizacaoImagens = function(input, lugarParaInserirVisualizacaoDeImagem) {

    if (input.files) {
        var quantImagens = input.files.length;

        for (i = 0; i < quantImagens; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                $($.parseHTML('<img class="miniatura">')).attr('src', event.target.result).appendTo(lugarParaInserirVisualizacaoDeImagem);
            }

            reader.readAsDataURL(input.files[i]);
        }
    }

};

$('#addFotoGaleria1').on('change', function() {
    visualizacaoImagens(this, 'div.perfil');
});
$('#addFotoGaleria2').on('change', function() {
    visualizacaoImagens(this, 'div.slide1');
});
$('#addFotoGaleria3').on('change', function() {
    visualizacaoImagens(this, 'div.slide2');
});
$('#addFotoGaleria4').on('change', function() {
    visualizacaoImagens(this, 'div.slide3');
});
$('#addFotoGaleria5').on('change', function() {
    visualizacaoImagens(this, 'div.img_descricao');
});

});
</script>
<?php include "../view/rodape.php"; ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<!--para utilizar as mascaras no input-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
