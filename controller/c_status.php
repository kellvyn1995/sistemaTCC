<?php
include_once "../libs/class/classUsuario.php";
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";
switch (get_post_action('status','ativos','todos','inativos')) {
  case 'status':
  if (isset($_SESSION['id_admin']) && !empty($_SESSION['id_admin'])) {
    $id_habilitado = addslashes($_POST['id_habilitado']);
    $atual_status = addslashes($_POST['atual_status']);
          $muda_status = atualizar_status($id_habilitado,$atual_status);
          header("Location: ../view/admin.php");
  }else {
    header("Location: ../view/aviso?aviso=4.php");
  }
    break;

    case 'ativos':
    $consulta = buscar_habilitados_ativo();

      break;

    case 'inativos':
    $consulta = buscar_habilitados_inativos();

      break;

    case 'todos':
    $pdo = conectar(); //coneão com banco de dados
    $consulta = $pdo->query("SELECT * FROM habilitados;"); // realizando a consulta
      break;

  default:
  $pdo = conectar(); //coneão com banco de dados
  $consulta = $pdo->query("SELECT * FROM habilitados;"); // realizando a consulta

    break;
}

// switch (get_post_action('status','ativos','todos','inativos')) {
//   case 'status':
//   $id_habilitado = addslashes($_POST['id_habilitado']);
//   $atual_status = addslashes($_POST['atual_status']);
//
//   if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
//     $id_usuario = $_SESSION['idUser'];
//     if ($id_usuario == 1) {
//         include_once "../model/modelUsuario.php";
//         $muda_status = atualizar_status($id_habilitado,$atual_status);
//       //  header("Location: ../view/admin.php");
//       header("Location: ../view/admin.php");
//     }else {
//       echo "Usuario não é administrado!";
//     }
//   }else {
//     header("Location: ../view/login.php");
//   }
//     break;
//
//     case 'ativos':
//     $consulta = buscar_habilitados_ativo();
//     header("Location: ../view/admin.php");
//       break;
//
//     case 'inativos':
//     $consulta = buscar_habilitados_inativos();
//     header("Location: ../view/admin.php");
//       break;
//
//     case 'todos':
//     $pdo = conectar(); //coneão com banco de dados
//     $consulta = $pdo->query("SELECT * FROM habilitados;"); // realizando a consulta
//       break;
//
//   default:
//   $pdo = conectar(); //coneão com banco de dados
//   $consulta = $pdo->query("SELECT * FROM habilitados;"); // realizando a consulta
//
//     break;
// }


 ?>
