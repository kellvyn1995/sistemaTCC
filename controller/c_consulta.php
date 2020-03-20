<?php

include_once "../model/conexao.php";
// realizar a consulta ao banco de dados usando o id da sessão
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    include_once "../model/modelUsuario.php";
    $u = new Logar();

    $listaLogged = $u->logged($_SESSION['idUser']);


}else{
  header("Location: ../view/login.php");
}


 ?>
