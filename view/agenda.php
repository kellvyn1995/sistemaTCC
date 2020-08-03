<?php
include_once "../controller/c_verifica.php";
include_once "../controller/c_consulta.php";
include_once "../controller/c_verifica_h.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php include "menu.php"; ?>
<!-- tabela da agenda-->
<form method="post" action="../controller/c_agenda.php" >
  <div class="container p-3 my-3">
    <table class="table table-striped table-dark">
    <thead>
      <tr>

        <th scope="col">Data</th>
        <th scope="col">Local</th>
        <th scope="col">Evento</th>
        <th scope="col">Informações</th>
        <th scope="col">

            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#siteModal"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></button>
        </th>
      </tr>
    </thead>
    <tbody>

      <?php
    //  $pdo = conectar(); //coneão com banco de dados
    //  $consulta = $pdo->query("SELECT * FROM agenda;"); // realizando a consulta

  //
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


      <td>
        <button type="submit"  name="delete" class="btn btn-danger" >Excluir</button>
      </td>
    </tr>


  <?php  }?>

    </tbody>
  </table>
  </div>
</form>


<!--  MODAL -->
<form class="" action="../controller/c_agenda.php" method="POST">
  <div class="modal fade" id="siteModal" tabindex="1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
              <h5>Preencha todos os campos para adicionar um novo evento na sua agenda</h5>
              <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <!--  grupos de entrada -->
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Data</span>
                </div>
                <input type="text" name="data_agenda" class="form-control" data-mask="00/00/0000" maxlength="10"  aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Local</span>
                </div>
                <input type="text" name="local_agenda" class="form-control" placeholder="" maxlength="100"  aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Evento</span>
                </div>
                <input type="text" name="evento_agenda" class="form-control" placeholder="" maxlength="50" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Informações</span>
                </div>
                <input type="text" name="informacao_agenda" class="form-control" placeholder="" maxlength="100" aria-describedby="basic-addon1">
              </div>

            </div>

            <div class="modal-footer">
              <button type="submit" name="add" class="btn btn-success" data-mimiss="modal" >Adicionar</button>
            </div>

      </div>

    </div>

  </div>
</form>
<?php include "rodape.php"; ?>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--para utilizar as mascaras no input-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

</body>
</html>
