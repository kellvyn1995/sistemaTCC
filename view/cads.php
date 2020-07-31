
<div class="container p-3 my-3 bg-dark text-white">
<div class="row">

  <?php
  include_once "model/modelUsuario.php";

//  include_once "../model/modelUsuario.php"
  $pdo = conectar(); //coneão com banco de dados
  $resultado = $pdo->query("SELECT * FROM habilitados;"); // realizando a consulta


  while ($lista = $resultado->fetch(PDO::FETCH_ASSOC)){
  $dados_imagens = buscar_imagens($lista['id_habilitado']);
  $id_h = $lista['id_habilitado'];
  $ver  = $lista['status'];

  ?>
  <!--ser status for = 1 sera mostrado-->
<?php if ($ver == 1): ?>
  <tr>
  <!--mostrando resultados da consulta-->
  <form class="" action="view/perfil.php" method="POST">
    <input type="hidden" name="id_h" value="<?php echo $id_h;?>" /> <!-- input invisivel-->
    <div class="form-group col-sm">
      <div class="card " style="width: 18rem;">
        <img class="card-img-top" src="<?php echo $dados_imagens['img_perfil']?>" alt="Imagem de capa do card">
        <div class="card-body">
          <h5 class="card-title text-dark"><?php echo $lista["nome_apresentacao"];?></h5>
          <p class="card-text text-dark"><?php echo $lista["apresentacao"];?></p>
              <input type="submit" name="submit" class="btn btn-primary" value="Visitar">
        </div>
      </div>
    </div>
  </form>
<?php endif; ?>



<?php }?>


</div>
</div>
