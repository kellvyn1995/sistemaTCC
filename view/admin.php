<?php

include_once "../model/conexao.php";

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
<form class="" action="../controller/c_status.php" method="POST">

<!--habilitados-->
    </tbody>
  </table>


  <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">id habilitado</th>
      <th scope="col">nome apresentação</th>
      <th scope="col">apresentação</th>
      <th scope="col">horario</th>
      <th scope="col">titulo</th>
      <th scope="col">texto</th>
      <th scope="col">status</th>
      <th scope="col">ações</th>
    </tr>
  </thead>
  <tbody>

    <?php
    $pdo = conectar(); //coneão com banco de dados
$consulta = $pdo->query("SELECT * FROM habilitados;"); // realizando a consulta


while ($lista = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $id = $lista['id_habilitado'];
  ?>


  <tr>
    <!--mostrando resultados da consulta, type="hidden" é um input invisivel -->
    <input type="hidden" name="id_habilitado" value="<?php echo $lista['id_habilitado']; ?>">
    <input type="hidden" name="atual_status" value="<?php echo $lista["status"]; ?>">
    <td name="id_hab"><?php echo $lista['id_habilitado']; ?></td>
    <td name="nome"><?php echo $lista["nome_apresentacao"]; ?></td>
    <td name="email"><?php echo $lista["apresentacao"]; ?></td>
    <td name="telefone"><?php echo $lista["horario_atendimento"]; ?></td>
    <td name="nascimento"><?php echo $lista["titulo_descricao"]; ?></td>
    <td name="cpf"><?php echo $lista["texto_descricao"]; ?></td>
    <td name="status"><?php echo $lista["status"]; ?></td>


    <td>
      <button type="submit" class="btn btn-success">muda status</button>
      <button type="button" class="btn btn-danger">Deletar</button>
    </td>
  </tr>


<?php  }?>

  </tbody>
</table>

  </div>
</form>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
