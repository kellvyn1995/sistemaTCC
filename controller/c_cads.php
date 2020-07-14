
<div class="container p-3 my-3 bg-dark text-white">
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
  $dados_imagens = buscar_imagens($lista['id_habilitado']);
  $id_m = $lista['id_usuario'];
  $id_h = $lista['id_habilitado'];
  $ver  = $lista['status'];

  ?>
  <!--ser status for = 1 sera mostrado-->
<?php if ($ver == 1):?>
  <tr>
  <!--mostrando resultados da consulta-->
  <form class="" action="view/perfil.php" method="POST">
    <input type="hidden" name="id_m" value="<?php echo $id_m;?>" /> <!-- input invisivel-->
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
