<?php
// se o usuario estiver logado não tera acesso a essa pagina
include_once "../controller/c_consulta.php";
include_once "../controller/c_mensagem.php";

$id = $_SESSION['idUser'];
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
<div class="row rounded-lg overflow-hidden shadow">
    <!-- Users box-->
    <div class="col-5 px-0">
      <div class="bg-white">

        <div class="bg-gray px-4 py-2 bg-light">
          <p class="h5 mb-0 py-1">Recent</p>
        </div>

        <div class="messages-box">
          <div class="list-group rounded-0">
            <?php while ($lista_mensagens = $buscar_mensagens->fetch(PDO::FETCH_ASSOC)){ ?>
              <?php if ($lista_mensagens['id_remetente'] == $id): ?>

                <form class="" action="mensagem.php" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <input type="hidden" name="destino" value="<?php echo $lista_mensagens['id_remetente']?>">
                  <input type="hidden" name="saida" value="<?php echo $lista_mensagens['id_destino']?>">
                  <button href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                    <div class="media"><img src="../media/person-6x.png" alt="user" width="50" class="rounded-circle">
                      <div class="media-body ml-4">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                          <h6 class="mb-0"><?php echo $lista_mensagens['id_remetente']?></h6><small class="small font-weight-bold">30 Aug</small>
                        </div>
                        <p class="font-italic text-muted mb-0 text-small"><?php echo $lista_mensagens['mensagem']?></p>
                      </div>
                    </div>
                  </button>
                </form>
            <?php endif; ?>
          <?php } ?>

          </div>
        </div>
      </div>
    </div>
    <!-- Chat Box-->

    <div class="col-7 px-0">
      <div class="px-4 py-5 chat-box bg-white">
        <?php if ( $_SERVER['REQUEST_METHOD']  == 'POST'):
          $id_destino = addslashes($_POST['destino']);
          $id_saida = addslashes($_POST['saida']);
          ?>
          <?php while ($lista_mensagens = $buscar_mensagens->fetch(PDO::FETCH_ASSOC)){ ?>
            <?php if ($lista_mensagens['id_destino'] == $id_destino): ?>
          <!-- recebido-->
          <div class="media w-50 mb-3"><img src="../media/person-6x.png" alt="user" width="50" class="rounded-circle">
            <div class="media-body ml-3">
              <div class="bg-light rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-muted"><?php echo $lista_mensagens['id_destino']?></p>
              </div>
              <p class="small text-muted">12:00 PM | Aug 13</p>
            </div>
          </div>

          <!-- enviado-->
          <div class="media w-50 ml-auto mb-3">
            <div class="media-body">
              <div class="bg-primary rounded py-2 px-3 mb-2">
                <p class="text-small mb-0 text-white"><?php echo $lista_mensagens['mensagem']?></p>
              </div>
              <p class="small text-muted"><?php echo $lista_mensagens['id_remetente']?></p>
            </div>
          </div>
          <?php endif; ?>
          <?php } ?>



      </div>

      <!-- Typing area -->
      <form action="#" class="bg-light" method="post" action="">
        <div class="input-group">
          <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
          <div class="input-group-append">
            <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<?php include "rodape.php"; ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
