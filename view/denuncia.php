<?php
include_once "../controller/c_admin.php";
include_once "../controller/c_denuncia.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php include "../view/menu.php"; ?>
<!-- tabela -->
<div class="container table-responsive p-3 my-3">
  <table class="table table-hover table-dark" >
    <thead>
      <tr>
        <th scope="col">Usuário</th>
        <th scope="col">Habilitado</th>
        <th scope="col">Justificativa</th>
        <th scope="col">Opções</th>
      </tr>
    </thead>
    <tbody>
     <?php
      while ($denuncias = $buscar_denuncias->fetch(PDO::FETCH_ASSOC)) {

      ?>
      <tr>
        <td><?php echo $denuncias["nome"];?></td>
        <td><?php echo $denuncias["nome_apresentacao"];?></td>
        <td>Bloqueado pelo sistema</td>
        <td>
          <?php if ($denuncias["status"] == 2): ?>
            <form class="" action="../controller/c_denuncia.php" method="post">
              <input type="hidden" name="id_h" value="<?php echo $denuncias["id_habilitado"];?>">
              <div class="dropdown">
                  <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Denúnciado
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" type="submit" name="buscar_habilitados_x">Analisa denúncias</button>
                    <button class="dropdown-item" type="submit" name="bloquea">Bloquear</button>
                  </div>
                </div>
            </form>

          <?php endif; ?>
          <?php if ($denuncias["status"] == 3): ?>
            <form class="" action="../controller/c_denuncia.php" method="post">
              <input type="hidden" name="id_h" value="<?php echo $denuncias["id_habilitado"];?>">
              <div class="dropdown">
                  <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bloqueado
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" type="submit" name="buscar_habilitados_x">Analisa denúncias</button>
                    <button class="dropdown-item" type="submit" name="desbloquea">Desbloquear</button>
                  </div>
                </div>
            </form>

          <?php endif; ?>
          <?php if ($denuncias["status"] == 4): ?>
                  <form class="" action="../controller/c_denuncia.php" method="post">
                    <input type="hidden" name="id_h" value="<?php echo $denuncias["id_habilitado"];?>">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Solicitação de desbloqueio
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <button class="dropdown-item" type="submit" name="buscar_habilitados_x">Analisa denúncias</button>
                          <button class="dropdown-item" type="submit" name="desbloquea">Desbloquear</button>
                        </div>
                      </div>
                  </form>
          <?php endif; ?>
          <?php if ($denuncias["status"] == 6): ?>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Bloqueado
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Analisa perfil</a>
                  <button class="dropdown-item" type="submit" name="buscar_habilitados_x">Analisa denúncias</button>
                  <a class="dropdown-item" href="#">Analisa solicitação</a>
                  <a class="dropdown-item" href="#">Desbloquea</a>
                </div>
              </div>
          <?php endif; ?>
        </td>

      </tr>
      <?php } ?>


    </tbody>
  </table>
</div>

<!-- modal -->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Analisa denúncias</h5>
          <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">

        </div>

        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>



  <script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })
  </script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
