<?php
include_once "../controller/c_admin.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php include "../view/menu.php"; ?>

<?php
include_once "../controller/c_status.php";

 ?>
<!--habilitados-->
    </tbody>
  </table>

<div class="container table-responsive p-3 my-3 ">
  <table class="table table-striped table-dark">
    <form class="" action="" method="post">
      <thead>
        <tr>
          <th scope="col">id habilitado</th>
          <th scope="col">nome apresentação</th>
          <th scope="col">status</th>
          <th scope="col">ações
            <div class="btn-group">
              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ação
              </button>
              <div class="dropdown-menu">
                <button type="submit" class="btn btn-light btn-sm dropdown-item" name="ativos">ativos</button>
                <button type="submit" class="btn btn-light btn-sm dropdown-item" name="inativos">Inativos</button>
                <button type="submit" class="btn btn-light btn-sm dropdown-item" name="todos">Todos</button>
              </div>
            </div>

          </th>

        </tr>
      </thead>
    </form>

  <tbody>

    <?php
// $pdo = conectar(); //coneão com banco de dados
// $consulta = $pdo->query("SELECT * FROM habilitados;"); // realizando a consulta
// usar duas switch

while ($lista = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $id = $lista['id_habilitado'];
  $id_h = $lista['id_habilitado'];
  $id_m = $lista['id_usuario'];
  ?>
<form class="" action="" method="POST">

  <tr>
    <!--mostrando resultados da consulta, type="hidden" é um input invisivel -->
    <input type="hidden" name="id_habilitado" value="<?php echo $lista['id_habilitado']; ?>">
    <input type="hidden" name="atual_status" value="<?php echo $lista["status"]; ?>">
    <input type="hidden" name="id_h" value="<?php echo $id_h;?>" /> <!-- input invisivel-->
    <input type="hidden" name="id_m" value="<?php echo $id_m;?>" /> <!-- input invisivel-->
    <td name="id_hab"><?php echo $lista['id_habilitado']; ?></td>
    <td name="nome"><?php echo $lista["nome_apresentacao"]; ?></td>
      <td name="status">
            <?php if ($lista["status"] == 1): ?>
                <button class="btn btn-success btn-lg disabled" name="status" tabindex="-1" role="button" aria-disabled="true">HABILITADO</button>
            <?php endif; ?>
            <?php if ($lista["status"] == 0): ?>
                <button class="btn btn-danger btn-lg disabled" name="status" tabindex="-1" role="button" aria-disabled="true">DESABILITADO</button>
            <?php endif; ?>
            <?php if ($lista["status"] == 2): ?>
              <button type="button" class="btn btn-lg btn-primary" disabled>Perfil denúnciado</button>
            <?php endif; ?>
            <?php if ($lista["status"] == 3): ?>
              <button type="button" class="btn btn-lg btn-primary" disabled>Bloqueado</button>
            <?php endif; ?>
            <?php if ($lista["status"] == 4): ?>
              <button type="button" class="btn btn-lg btn-primary" disabled>Solicitão</button>
            <?php endif; ?>
            <?php if ($lista["status"] == 5): ?>
              <button type="button" class="btn btn-lg btn-primary" disabled>Desativado</button>
            <?php endif; ?>

      </td>
    <td>
      <button type="submit" name="status" class="btn btn-success">muda status</button>
      <!-- <button type="button" class="btn btn-danger">Deletar</button> -->
      <?php if ($lista["status"] == 1): ?>
          <a type="button" name="verificar" target="_blank" class="btn btn-success" href="../view/perfil.php?id_h=<?php echo $id_h?>&id_m=<?php echo $id_m?>">Verificar</a>
      <?php endif; ?>
      <?php if ($lista["status"] == 0): ?>
          <a type="button" name="verificar" target="_blank" class="btn btn-danger" href="../view/perfil.php?id_h=<?php echo $id_h?>&id_m=<?php echo $id_m?>">Verificar</a>
      <?php endif; ?>
      <?php if ($lista["status"] == 2): ?>
          <a type="button" name="verificar" target="_blank" class="btn btn-danger" href="../view/perfil.php?id_h=<?php echo $id_h?>&id_m=<?php echo $id_m?>">Verificar</a>
      <?php endif; ?>
      <?php if ($lista["status"] == 3): ?>
          <a type="button" name="verificar" target="_blank" class="btn btn-danger" href="../view/perfil.php?id_h=<?php echo $id_h?>&id_m=<?php echo $id_m?>">Verificar</a>
      <?php endif; ?>
      <?php if ($lista["status"] == 4): ?>
          <a type="button" name="verificar" target="_blank" class="btn btn-danger" href="../view/perfil.php?id_h=<?php echo $id_h?>&id_m=<?php echo $id_m?>">Verificar</a>
      <?php endif; ?>
      <?php if ($lista["status"] == 5): ?>
          <a type="button" name="verificar" target="_blank" class="btn btn-danger" href="../view/perfil.php?id_h=<?php echo $id_h?>&id_m=<?php echo $id_m?>">Verificar</a>
      <?php endif; ?>

      <!-- <button type="button" name="verificar" target="_blank" class="btn btn-danger">Verificar</button> -->
    </td>
  </tr>
</form>

<?php  }?>

  </tbody>
</table>

  </div>





<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
