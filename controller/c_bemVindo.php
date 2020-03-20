<?php
/* verificar se o usuario esta na pagina index*/
$e = 'index';
if (isset($_GET['pg']) && !empty($_GET['pg'])){
 $pg = addslashes($_GET['pg']);
 // se usuario estive na pagina index
 if ($pg == $e) {
   if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
       include_once "model/modelUsuario.php";
       $u = new Logar();
       // mostra o nome do usuario da sessão
       $listaLogged = $u->logged($_SESSION['idUser']);
       echo $listaLogged['nome'];
     }
 }else {
   if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
       include_once "../model/modelUsuario.php";
       $u = new Logar();

       $listaLogged = $u->logged($_SESSION['idUser']);
       echo $listaLogged['nome'];
     }
 }
}

?>
