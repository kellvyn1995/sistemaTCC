<?php
include_once "../model/conexao.php";
// se o usuario não estiver logado não tera acesso a essa pagina
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])):
 ?>

<!DOCTYPE html>
<html lang="pt_br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MENU ADMIN</title>
  </head>
  <body>
<h3>vc esta na pagina</h3>
  </body>
</html>

<?php else: header("Location: ../index.php"); endif; ?>
