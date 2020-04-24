<?php
// se o usuario estiver logado não tera acesso a essa pagina
include_once "../controller/c_consulta.php";
include_once "../controller/c_mensagem.php";


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../libs/CSS/menssagem.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php include "menu.php"; ?>
<!--conteiner-->
<div class="container p-3 my-3 bg-dark text-white">
  <!--formulario-->
  <div class="container">
      <h3 class="text-center text-white pt-3">EDITAR HABILITADO</h3>
      <!--linha 1-->
      <div class="row">
        <div class="col-md-6">
          <label for="">mensagens resentes</label>
          <div class="row rounded-lg overflow-hidden shadow ">
              <!-- Users box-->
              <div class=" px-0 row">
                <div class="bg-white">

                  <div class="bg-gray px-4 py-2 bg-light">
                    <p class="h5 mb-0 py-1"></p>
                  </div>
                  <?php while ($lista_mensagens = $buscar_mensagens->fetch(PDO::FETCH_ASSOC)){ ?>
                    <?php if ($lista_mensagens['id'] == $lista_mensagens['id_remetente'] or $lista_mensagens['id'] == $lista_mensagens['id_destino']): ?>
                  <!--caixa de mensagens-->
                      <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                        <div class="media"><img src="../media/person-6x.png" alt="user" width="50" class="rounded-circle">
                          <div class="media-body ml-4">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                              <h6 class="mb-0"><?php echo $lista_mensagens['nome']?></h6><small class="small font-weight-bold">21 Aug</small>
                            </div>
                            <p class="font-italic text-muted mb-0 text-small"><?php echo $lista_mensagens['mensagem'];?></p>
                          </div>
                        </div>
                      </a>
                      <?php endif; ?>
                    <?php } ?>
                    </div>
                  </div>
                </div>


        </div>
        <!--linha 2-->
        <?php while ($lista_mensagens = $buscar_mensagens->fetch(PDO::FETCH_ASSOC)){ ?>
          <?php if ($lista_mensagens['id'] == $lista_mensagens['id_remetente'] or $lista_mensagens['id'] == $lista_mensagens['id_destino']): ?>
            <!-- Chat Box-->
            <div class="form-group col-md-6">
              <div class="col-7 px-0">
                  <div class="px-4 py-5 chat-box bg-white">
                    <!-- Sender Message-->
                  <div class="media w-50 mb-3"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                    <div class="media-body ml-3">
                      <div class="bg-light rounded py-2 px-3 mb-2">
                        <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
                      </div>
                      <p class="small text-muted">12:00 PM | Aug 13</p>
                    </div>
                  </div>
            <?php endif; ?>
          <?php } ?>
                <!-- Chat Box-->
                <div class="form-group col-md-6">
                  <div class=" px-4 py-5 chat-box bg-white">
                    <!-- Reciever Message-->
                    <div class="media w-50 ml-auto mb-3">
                      <div class="media-body">
                        <div class="bg-primary rounded py-2 px-3 mb-2">
                          <p class="text-small mb-0 text-white"><?php echo $lista_mensagens['mensagem']?></p>
                        </div>
                        <p class="small text-muted">12:00 PM | Aug 13</p>
                      </div>
                    </div>
                  </div>



                    <div class="input-group">
                      <input type="text" name="mensagem_enviada" placeholder="Digite sua mensagem" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                      <div class="input-group-append">
                        <button id="button-addon2" type="submit" name="envia_men"class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
                      </div>
                    </div>
                  </form>

                  </div>
              </div>
        </div>
      </div>
  </div>
</div>


<!-- Typing area -->
<form action="../controller/c_mensagem.php" class="bg-light" method="post">
  <?php if (isset($_POST['id_m']) && !empty($_POST['id_m'])): $id_m = addslashes($_POST['id_m']); ?>
    <input type="hidden" name="destino" value="<?php echo $id_m?>">
    <input type="hidden" name="remetente" value="<?php echo $_SESSION['idUser']?>">
  <?php endif; ?>


  </div>

<?php include "rodape.php"; ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
