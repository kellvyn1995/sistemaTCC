<?php
include_once "model/conexao.php";
/*data = new DateTime(); //captura a data e hora
echo $data->format("d/m/Y \à\s H:i:s"); // converte data e hora*/
//include_once "controller/c_buscar.php";
if (isset($_GET['pg']) && !empty($_GET['pg'])){
  // esse if era verificar dr tenm uma pagina atual, caso não tenha a pagina sera 0.
$pg = addslashes($_GET['pg']);
}else {
  $pg = 0;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
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
<?php include "view/menu.php"; ?>

  <main>
    <div class="container-fluid">

      <?php
      include_once "controller/c_cads.php";
      // $pg = "";
      //  if (isset($_GET['pg']) && !empty($_GET['pg'])){
      //   $pg = addslashes($_GET['pg']);
      // }
      //
      // switch ($pg) {
      //   case '':
      //     include_once "controller/c_cads.php";
      //     break;
      //
      //     case 'index':
      //       include_once "controller/c_cads.php";
      //       break;
      //
      //   case 'perfil':
      //     include_once "view/perfil.php";
      //     break;
      //   case 'adastrohabilitado':
      //       include_once "view/adastrohabilitado.php";
      //   break;
      //
      //
      // }
      ?>
    </div>



    <div class="container">
      <div class="row">
        <div class="col-sm">

        </div>
        <div class="col-sm">
          <form class="" method="post" action="index.php">
            <nav aria-label="Navegação de página exemplo" >
            <ul class="pagination">
              <button class="page-link" href="" value="anterio"  name="anterio" type="submit">Anterior</button>
              <button class="page-link" href="" value="proximo" name="proximo" type="submit">Próximo</button>
            </ul>
          </nav>
          </form>
        </div>
        <div class="col-sm">

        </div>
      </div>
    </div>



  </main>

<?php include "view/rodape.php"; ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
