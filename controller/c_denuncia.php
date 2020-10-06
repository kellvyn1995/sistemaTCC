<?php
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";
include_once "c_consulta.php";
    /*
    o switch vai chama uma função que vai verifica o name do botão clicado
    */
     switch (get_post_action('fazer_denuncia', 'bloquea', 'desbloquea','buscar_habilitados_x','analisaperfil','solicitar_desblqueio','desativar','ativar')) {
        case 'fazer_denuncia':
        $mensagem_denuncia = addslashes($_POST['mensagem_denuncia']);
        $id_do_u = addslashes($_POST['id_u_denuncia']);
        $id_do_h = addslashes($_POST['id_h_denuncia']);
        $fazer_denuncia = registra_denuncia($mensagem_denuncia,$id_do_u,$id_do_h);
        if ($fazer_denuncia) {
          echo "denuncia gravada";
          echo "<script>top.window.location='../index.php';</script>";

        }else {
          echo "erro ao fazer denuncia";
        }
            break;

        case 'bloquea':
        $id_do_h = addslashes($_POST['id_h']);
        $bloqueio = bloquea_habilitado($id_do_h);
        if ($bloqueio) {
          echo "bloqueio deu certo";
          echo "<script>top.window.location='../view/denuncia.php';</script>";
        }
            break;

        case 'desbloquea':
          $id_do_h = addslashes($_POST['id_h']);
          $desbloqeio = desbloquea_habilitado($id_do_h);
          if ($desbloqeio) {
            echo "desbloqueio deu certo";
            echo "<script>top.window.location='../view/denuncia.php';</script>";
          }
            break;

        case 'buscar_habilitados_x':
            $id_do_h = addslashes($_POST['id_h']);
            // $habilitados_x = buscar_habilitados_x($id_do_h);
            echo "<script>top.window.location='../view/analisa_denuncia.php?id_hx=$id_do_h';</script>";
            break;

        case 'analisaperfil':
         //  $id_h = addslashes($_POST['id_h']);
         //  // $id_m = addslashes($_POST['id_h']);
         //  $id_m = buscar_h_p_denunciado($id_);
         //  // $id_m = $id_mx->fetch(PDO::FETCH_ASSOC);
         echo "<script>top.window.location='../view/perfil.php?id_h=<?php echo $id_h?>&id_m=<?php echo $id_m?>';</script>";
            break;
        case 'solicitar_desblqueio':
          $id_h = addslashes($_POST['id_h']);
          $id_s_h = solicitar_desbloqueio($id_h);
          if ($id_s_h) {
            echo "<script>top.window.location='../view/meuPerfil.php';</script>";
          }else {
            echo "falha na solicitação";
          }
           break;
           case 'desativar':
             $id_h = addslashes($_POST['id_h']);
             $id_s_h = desativar($id_h);
             if ($id_s_h) {
               echo "<script>top.window.location='../view/meuPerfil.php';</script>";
             }else {
               echo "falha na solicitação";
             }
              break;
              case 'ativar':
                $id_h = addslashes($_POST['id_h']);
                $id_s_h = ativar($id_h);
                if ($id_s_h) {
                  echo "<script>top.window.location='../view/meuPerfil.php';</script>";
                }else {
                  echo "falha na solicitação";
                }
                 break;
       default:
           $buscar_denuncias = buscar_habilitados_denunciados(); // realizando a consulta
          break;
    }


 ?>
