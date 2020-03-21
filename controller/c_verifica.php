<?php
// esse arquivo e para controlar o acesso a determinadas paginas do sistema
// se o usuario não estiver logado não tera acesso
include_once "../model/conexao.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){

}else {
  header("Location: ../view/login.php");
}




// esse arquivo e para controlar o acesso a determinadas paginas do sistema
// se o usuario estiver logado não tera acesso
/* include_once "../model/conexao.php";

if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    include_once "../model/modelUsuario.php";
    $u = new Logar();

    $listaLogged = $u->logged($_SESSION['idUser']);
    echo $listaLogged['nome'];
}else{
  header("Location: ../view/login.php");
} */

 ?>
