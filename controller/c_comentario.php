<?php
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";
// para registra o comentario enviado
switch (get_post_action('addcomentario')) {
  case 'addcomentario':
  //pegando as informações para salva o comentario
  $com = addslashes($_POST['comentario']);
  $nota = addslashes($_POST['fb']);
  $id_u = addslashes($_POST['usuario']);
  $id_p = addslashes($_POST['habilitado']);
  $anota = add_comentario($com,$nota,$id_u,$id_p);

  // $id_m = addslashes($_POST['id_m']);
  // $id_habilitado = addslashes($_POST['id_h']);
  // $id_h = addslashes($_POST['id_h']);
  //ao salva o comentario será redirecionado para a pagina anterio
  if (isset($_SERVER["HTTP_REFERER"])) {
      header("Location: " . $_SERVER["HTTP_REFERER"]);
  }
  // header("Location: ../view/perfil.php?id_m=$id_m&id_h=$id_h");
    break;

  default:
    // code...
    break;
}

?>
