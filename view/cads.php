

<div class="container p-3 my-3 bg-dark text-white">
<div class="row">

  <?php
//  include_once "../model/modelUsuario.php"
//  $pdo = conectar(); //coneão com banco de dados
  //$consulta = $pdo->query("SELECT * FROM habilitados;"); // realizando a consulta

  //
  while ($lista = $consulta->fetch(PDO::FETCH_ASSOC)) {
  $id_h = $lista['id_habilitado'];
  ?>

  <tr>
  <!--mostrando resultados da consulta-->
  <form class="" action="view/perfil.php?pg=perfil" method="post">
    <div class="form-group col-sm">
      <div class="card " style="width: 18rem;">
        <img class="card-img-top" src="/media/fotodoperfil.jpeg" alt="Imagem de capa do card">
        <div class="card-body">
          <h5 class="card-title text-dark"><?php echo $lista["nome_apresentacao"];?></h5>
          <p class="card-text text-dark"><?php echo $lista["apresentacao"];?></p>
          <a href="/view/perfil.php" class="btn btn-primary">Visitar</a>
        </div>
      </div>
    </div>
  </form>


  <?php  }?>


</div>
</div>
