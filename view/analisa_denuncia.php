<?php
include_once "../controller/c_admin.php";
include_once "../controller/c_analisa_denuncia.php";
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
<!-- denuncias do habilitado -->
<div class="container p-3 my-3 modal-body" data-spy="scroll" data-target="#navbar-exemplo">
<?php
  while ($denunciasx = $habilitados_x->fetch(PDO::FETCH_ASSOC)) {
 ?>

  <div class="modal-body" data-spy="scroll" data-target="#navbar-exemplo">
    <div id="navbar-exemplo">
      <ul class="nav nav-tabs" role="tablist">
        <div id="list-example" class="list-group col-3">
          <label for="">ID da Denúncia <?php echo $denunciasx["id_denuncia"];?></label>
          <label for="">Usuário</label>
          <a class="list-group-item list-group-item-action" href="#list-item-1"><?php echo $denunciasx["nome"];?></a>
        </div>
        <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example col">
          <h4 id="list-item-1">Denúncia</h4>
          <p><?php echo $denunciasx["mensagem"];?></p>

        </div>
      </ul>
    </div>
  </div>

<?php } ?>
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
        <div class="modal-body" data-spy="scroll" data-target="#navbar-exemplo">
          <div id="navbar-exemplo">
            <ul class="nav nav-tabs" role="tablist">
              <div id="list-example" class="list-group col-3">
                <a class="list-group-item list-group-item-action" href="#list-item-1"></a>
                <a class="list-group-item list-group-item-action" href="#list-item-2">Usuário 2</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Usuário 3</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Usuário 4</a>
              </div>
              <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example col">
                <h4 id="list-item-1">Item 1</h4>
                <p>Uma personagem fictícia ou ficcional refere-se a qualquer personagem que apareça num trabalho ou projeto de ficção. Mais definidamente, uma personagem fictícia é a pessoa ou "entidade consciente" que imaginamos existir em um mundo ou tipo de projeto. Em soma para as pessoas, personagens podem ser alienígenas, animais, deuses ou casualmente seres inanimados. </p>
                <h4 id="list-item-2">Item 2</h4>
                <p>Uma personagem fictícia ou ficcional refere-se a qualquer personagem que apareça num trabalho ou projeto de ficção. Mais definidamente, uma personagem fictícia é a pessoa ou "entidade consciente" que imaginamos existir em um mundo ou tipo de projeto. Em soma para as pessoas, personagens podem ser alienígenas, animais, deuses ou casualmente seres inanimados. </p>
                <h4 id="list-item-3">Item 3</h4>
                <p>Uma personagem fictícia ou ficcional refere-se a qualquer personagem que apareça num trabalho ou projeto de ficção. Mais definidamente, uma personagem fictícia é a pessoa ou "entidade consciente" que imaginamos existir em um mundo ou tipo de projeto. Em soma para as pessoas, personagens podem ser alienígenas, animais, deuses ou casualmente seres inanimados. </p>
                <h4 id="list-item-4">Item 4</h4>
                <p>Uma personagem fictícia ou ficcional refere-se a qualquer personagem que apareça num trabalho ou projeto de ficção. Mais definidamente, uma personagem fictícia é a pessoa ou "entidade consciente" que imaginamos existir em um mundo ou tipo de projeto. Em soma para as pessoas, personagens podem ser alienígenas, animais, deuses ou casualmente seres inanimados. </p>
              </div>
            </ul>
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
