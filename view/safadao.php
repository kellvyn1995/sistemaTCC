<?php
include_once "../controller/c_conexao.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){

}else {
  echo "<script>top.window.location='../view/login.php';</script>";
}
/*data = new DateTime(); //captura a data e hora
echo $data->format("d/m/Y \à\s H:i:s"); // converte data e hora*/
//include_once "controller/c_buscar.php";

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Safadão</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--hack para centralizar o container-->
    <style type="text/css">
    .centered {
    margin: 0 auto !important;
    float: none !important;
    }
    </style>
</head>
<body>
<?php include "../view/menu.php"; ?>

<?php
 ?>

<div class="container ">
  <div class="row">
    <div class="col-sm">
      <?php if (empty($_GET['safadeza'])): ?>
        <img width="380px" height="400px" src="../media/WesleySafadao.png" alt="">
      <?php endif; ?>
      <?php if (isset($_GET['safadeza']) && !empty($_GET['safadeza'])): ?>
        <img  width="300px" height="400px" src="../media/o-cantor-wesley-safadao-1565312444497_v2_450x600.jpg" alt="">
        <?php
        $safadeza = addslashes($_GET['safadeza']);
        $anjo = addslashes($_GET['anjo']);
         ?>
      <?php endif; ?>
    </div>
    <div class="col-sm">
      <?php if (empty($_GET['safadeza'])): ?>
        <form class="" action="../controller/c_safadao.php" method="post">
          <h6>Digite sua data de nascimento para saber quanto de anjo ainda resta!</h6>
          <p>Dia:<input class="form-control" name="dia" type="number" placeholder="" min="1" max="31"></p>
          <p>Mês:<input class="form-control" name="mes" type="number" placeholder="" min="1" max="12"></p>
          <p>Ano:<input class="form-control" name="ano" type="number" placeholder="" min="1920" max="2020"></p>
          <button type="submit" name="calcular" class="btn btn-success">Calcular</button>
        </form>
      <?php endif; ?>
      <?php if (isset($_GET['safadeza']) && !empty($_GET['safadeza'])): ?>
          <h4>Você possui <?php echo "".$safadeza; ?>% de vagabundo</h4>
          <h4>Só resta <?php echo "".$anjo; ?>% de Anjo.</h4>
          <form class="" action="../controller/c_safadao.php" method="post">
            <button type="submit" name="recalcular" class="btn btn-success">Calcula novamenter</button>
          </form>
      <?php endif; ?>
    </div>
    <div class="col-sm">
      <audio autoplay="autoplay" controls="controls"  loop="loop" src="../media/musica.mp3" preload="auto"></audio>
    </div>
  </div>

</div>

<?php include "../view/rodape.php"; ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
