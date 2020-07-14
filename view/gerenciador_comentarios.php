<?php

include_once "../controller/c_conexao.php";
include_once "../controller/c_gerenciador_comentarios.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php include "../view/menu.php"; ?>


<!--habilitados-->
    </tbody>
  </table>


  <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Usuario</th>
      <th scope="col">Comentario</th>
      <th scope="col">Nota</th>
      <th scope="col">ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($com = $comentariostodos->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <?php if ($com['id_p'] == $id_habilitado): ?>
      <tr>
        <td><?php echo $com['nome'];?></td>
        <td><?php echo $com['comentario'];?></td>
        <td><?php echo $com['nota'];?></td>
      </tr>
    <?php endif; ?>
    <?php  }?>


  </tbody>
</table>







<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
