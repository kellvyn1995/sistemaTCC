<?php
include_once "model/conexao.php";
/*data = new DateTime(); //captura a data e hora
echo $data->format("d/m/Y \à\s H:i:s"); // converte data e hora*/

//include_once "controller/c_buscar.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
      $pg = "";
       if (isset($_GET['pg']) && !empty($_GET['pg'])){
        $pg = addslashes($_GET['pg']);
      }

      switch ($pg) {
        case '':
          include_once "controller/c_cads.php";
          break;

          case 'index':
            include_once "controller/c_cads.php";
            break;

        case 'perfil':
          include_once "view/perfil.php";
          break;
        case 'adastrohabilitado':
            include_once "view/adastrohabilitado.php";
        break;


      }
      ?>
    </div>
    <?php include "view/rodape.php"; ?>
  </main>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
