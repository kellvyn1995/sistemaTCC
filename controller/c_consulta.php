<?php
include_once "../model/modelUsuario.php";
include_once "../model/conexao.php";
// realizar a consulta ao banco de dados usando o id da sessão
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    include_once "../model/modelUsuario.php";
    $u = new Logar();
    $listaLogged = $u->logged($_SESSION['idUser']);
      if (isset($_SESSION['id_habilitado']) && !empty($_SESSION['id_habilitado'])) {
        $a = new Logar();
        $dados_habilitado = $a->buscar_dados_habilitado($_SESSION['id_habilitado']);
        if (isset($_SESSION['id_habilitado']) && !empty($_SESSION['id_habilitado'])) {

          $dados_agenda = buscar_dados_agenda($_SESSION['id_habilitado']);
          $dados_imagens = buscar_imagens($_SESSION['id_habilitado']);
        }
      }

}else{
  header("Location: ../view/login.php");
}


 ?>
