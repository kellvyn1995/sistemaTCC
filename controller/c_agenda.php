<?php
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";
/*
o switch vai chama uma função que vai verifica o name do botão clicado
*/
 switch (get_post_action('update', 'add', 'delete')) {
    case 'update':
        $data_agenda = addslashes($_POST['data_agenda']);
        $local_agenda = addslashes($_POST['local_agenda']);
        $evento_agenda = addslashes($_POST['evento_agenda']);
        $informacao_agenda = addslashes($_POST['informacao_agenda']);
        // se todos os campos forem diferente de vazio entra na condição
        if (!empty($data_agenda) && !empty($local_agenda) && !empty($evento_agenda) && !empty($informacao_agenda)) {
                    // chama a função para cadastra novo item na agenda
                    include_once "../model/modelUsuario.php";
                    $update_agenda = update_agenda($data_agenda,$local_agenda,$evento_agenda,$informacao_agenda,$_SESSION['id_habilitado']);
                        if ($update_agenda) {
                          header("Location: ../view/agenda.php");
                        }
            }else {
              // erro
              echo "erro atualizar";
            //  header("Location: ../view/agenda.php");
            }

        break;

    case 'add':
          $data_agenda = addslashes($_POST['data_agenda']);
          $local_agenda = addslashes($_POST['local_agenda']);
          $evento_agenda = addslashes($_POST['evento_agenda']);
          $informacao_agenda = addslashes($_POST['informacao_agenda']);
        // se todos os campos forem diferente de vazio entra na condição
        if (!empty($data_agenda) && !empty($local_agenda) && !empty($evento_agenda) && !empty($informacao_agenda)) {
                    // chama a função para cadastra novo item na agenda
                    include_once "../model/modelUsuario.php";
                    $add_agenda = add_agenda($data_agenda,$local_agenda,$evento_agenda,$informacao_agenda,$_SESSION['id_habilitado']);
                        if ($add_agenda) {
                          header("Location: ../view/agenda.php");
                        }
            }else {
              // erro
              header("Location: ../view/agenda.php");
            }
        break;

    case 'delete':
        $id_agenda = addslashes($_POST['id_agenda']);
        $delete = delete_agenda($id_agenda);
        if ($delete) {
          header("Location: ../view/agenda.php");
        }else {
          echo "erro ao Deletar";
        }
        break;

    default:
        //no action sent
}



// verificar se é pra add, atualizar ou Deletar
/* if (isset($_GET['agora']) && !empty($_GET['agora'])){
  $agora = addslashes($_GET['agora']);
  switch ($agora) {
    case 'update':

      break;
    case 'add':
    // se todos os campos forem diferente de vazio entra na condição
    if (!empty($data_agenda) && !empty($local_agenda) && !empty($evento_agenda) && !empty($informacao_agenda)) {
                // chama a função para cadastra novo item na agenda
                include_once "../model/modelUsuario.php";
                $add_agenda = add_agenda($data_agenda,$local_agenda,$evento_agenda,$informacao_agenda,$_SESSION['id_habilitado']);
                    if ($add_agenda) {
                      header("Location: ../view/agenda.php");
                    }
        }else {
          // erro
          header("Location: ../view/agenda.php");
        }
    break;
    case 'view':

    break;

    case 'delete':
      $delete = delete_agenda($id_agenda);
      if ($delete) {
        header("Location: ../view/agenda.php");
      }
    break;

  }
} */

 ?>
