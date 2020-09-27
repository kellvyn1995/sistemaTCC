
<div class="container col-12 col-sm-12 col-md-10 p-3 my-3 bg-dark text-white">
<div class="row">

  <?php
  include_once "model/modelUsuario.php";

//  include_once "../model/modelUsuario.php"
//  $pdo = conectar(); //coneão com banco de dados
//  $resultado = $pdo->query("SELECT * FROM habilitados;"); // realizando a consulta
switch (get_post_action('anterio','proximo','btbusca')) {
    case 'btbusca':
    $buscar = addslashes($_POST['buscar']);
    $resultado = buscar($buscar);
    break;

    case 'proximo':
       $resultado = paginacao_proximo($pg); // passando o numero da pagina atual
       $pg = $pg+1;
    break;

    case 'anterio':
    $pg = $pg--; // decremetando a pagina atual
    $resultado = paginacao_anterio($pg);// passando o numero da pagina atual

    break;

    default:
    $buscar = false;
    $resultado = buscar($buscar);
    break;
}


/*if (isset($_POST['env']) && !empty($_POST['env'] == "envBusca")) {

    $buscar = addslashes($_POST['buscar']);
    $resultado = buscar($buscar);


}else {
  $buscar = false;
  $resultado = buscar($buscar);
}*/

  while ($lista = $resultado->fetch(PDO::FETCH_ASSOC)){
  $id_m = $lista['id_usuario'];
  $id_h = $lista['id_habilitado'];
  $ver  = $lista['status'];
  $dados_imagens = buscar_imagens($id_h);
  ?>
  <!--ser status for = 1 sera mostrado-->
<?php if ($ver==1 || $ver==2):?>

  <tr>
  <!--mostrando resultados da consulta-->
  <form class="col-auto col-sm-4 mb-4 " action="view/perfil.php?<?php $lista["nome_apresentacao"]?>" method="GET">
    <input type="hidden" name="id_m" value="<?php echo $id_m;?>" /> <!-- input invisivel-->
    <input type="hidden" name="id_h" value="<?php echo $id_h;?>" /> <!-- input invisivel-->
    <input type="hidden" name="ajuste" value="1" /> <!-- input invisivel-->
    <div class="form-group col-sm">
      <div class="card " style="max-width: 18rem;">
        <img class="card-img-top" src="<?php echo $dados_imagens['img_perfil']?>" alt="Imagem de capa do card">
        <div class="card-body">
          <h5 class="card-title text-dark"><?php echo $lista["nome_apresentacao"];?></h5>
          <p class="card-text text-dark"><?php echo $lista["apresentacao"];?></p>
              <input type="submit" name="visitar" class="btn btn-primary" value="Visitar">
        </div>
      </div>
    </div>
  </form>
<?php endif; ?>
<?php }?>


</div>
</div>
