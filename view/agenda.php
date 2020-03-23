<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agrnda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php include "menu.php"; ?>
<div class="container p-3 my-3">
  <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Data</th>
      <th scope="col">Local</th>
      <th scope="col">Evento</th>
      <th scope="col">
          <button type="button" class="btn btn-outline-primary">Adiciona</button>
      </th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>30/julho/2020</td>
      <td>IFCE</td>
      <td>Tectel</td>
      <td>
        <button type="button" class="btn btn-outline-primary">Primary</button>
        <button type="button" class="btn btn-outline-danger">Danger</button>
      </td>
    </tr>


  </tbody>
</table>

</div>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
