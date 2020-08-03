<?php
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";
include_once "c_consulta.php";
    /*
    o switch vai chama uma função que vai verifica o name do botão clicado
    */
     switch (get_post_action('atualiza', 'add_img', 'delete','add_links','delete_link','add_redes','atualiza_redes')) {
        case 'atualiza':

        $nome_apresentacao = addslashes($_POST['nome_apresentacao']);
        $apresentacao = addslashes($_POST['apresentacao']);
        $horario_atendimento = addslashes($_POST['horario_atendimento']);
        $titulo_descricao = addslashes($_POST['titulo_descricao']);
        $texto_descricao = addslashes($_POST['texto_descricao']);
        $hashtags = addslashes($_POST['hashtags']);
        // se todos os campos forem diferente de vazio entra na condição
        if (!empty($nome_apresentacao) && !empty($horario_atendimento) && !empty($apresentacao) && !empty($titulo_descricao) && !empty($texto_descricao)) {
                    // chama a função para atualizar habilitado
                    include_once "../model/modelUsuario.php";
                    $status = atualizar_habilitado($nome_apresentacao,$apresentacao,$horario_atendimento,$titulo_descricao,$texto_descricao,$hashtags);
                        if ($status) {
                          echo "<script>top.window.location='../view/meuPerfil.php';</script>";
                        }
            }else {
              echo "<script>top.window.location='../view/cadastrohabilitado.php?pg=1';</script>";
            }
            break;

        case 'add_img':
                // capturando as imagens
                $pasta = "../libs/img/";
                $formatosPermitidos = array("png","jpeg","jpg","gif"); // formatos permitidos
                $perfil = pathinfo($_FILES['perfil']['name'], PATHINFO_EXTENSION);
                $slide1 = pathinfo($_FILES['slide1']['name'], PATHINFO_EXTENSION);
                $slide2 = pathinfo($_FILES['slide2']['name'], PATHINFO_EXTENSION);
                $slide3 = pathinfo($_FILES['slide3']['name'], PATHINFO_EXTENSION);
                $img_descricao = pathinfo($_FILES['img_descricao']['name'], PATHINFO_EXTENSION);
                // verificar se todoas as imagens estão no formato certo
                if (in_array($perfil, $formatosPermitidos)) {
                  $temporario_perfil = $_FILES['perfil']['tmp_name'];
                  $novoNome_perfil = uniqid().".$perfil";
                  if (move_uploaded_file($temporario_perfil, $pasta.$novoNome_perfil)) {
                    $foto_retorno = add_foto_perfil($pasta.$novoNome_perfil);
                    echo "<script>top.window.location='../view/atualizarHabilitado.php';</script>";
                  }else {
                    echo "erro ao adicionar foto do perfil no banco de dados!";
                  }
                }
                if (in_array($slide1, $formatosPermitidos)) {
                  $temporario_slide1 = $_FILES['slide1']['tmp_name'];
                  $novoNome_slide1 = uniqid().".$slide1";
                  if (move_uploaded_file($temporario_slide1, $pasta.$novoNome_slide1)) {
                    add_foto_slide1($pasta.$novoNome_slide1);
                    echo "<script>top.window.location='../view/atualizarHabilitado.php';</script>";
                  }else {
                    echo "erro ao adicionar foto do slide 1 no banco de dados!";
                  }
                }
                if (in_array($slide2, $formatosPermitidos)) {
                  $temporario_slide2 = $_FILES['slide2']['tmp_name'];
                  $novoNome_slide2 = uniqid().".$slide2";
                  if (move_uploaded_file($temporario_slide2, $pasta.$novoNome_slide2)) {
                    add_foto_slide2($pasta.$novoNome_slide2);
                    echo "<script>top.window.location='../view/atualizarHabilitado.php';</script>";
                  }else {
                    echo "erro ao adicionar foto do slide 2 no banco de dados!";
                  }
                }
                if (in_array($slide3, $formatosPermitidos)) {
                  $temporario_slide3 = $_FILES['slide3']['tmp_name'];
                  $novoNome_slide3 = uniqid().".$slide3";
                  if (move_uploaded_file($temporario_slide3, $pasta.$novoNome_slide3)) {
                    add_foto_slide3($pasta.$novoNome_slide3);
                    echo "<script>top.window.location='../view/atualizarHabilitado.php';</script>";
                  }else {
                    echo "erro ao adicionar foto do slide 3 no banco de dados!";
                  }
                }
                if (in_array($img_descricao, $formatosPermitidos)) {
                  $temporario_img_descricao = $_FILES['img_descricao']['tmp_name'];
                  $novoNome_img_descricao = uniqid().".$img_descricao";
                  if (move_uploaded_file($temporario_img_descricao, $pasta.$novoNome_img_descricao)) {
                    add_foto_descricao($pasta.$novoNome_img_descricao);
                    echo "<script>top.window.location='../view/atualizarHabilitado.php';</script>";
                  }else {
                    echo "erro ao adicionar foto do descrição no banco de dados!";
                  }
                }


            break;

        case 'delete':
              $id_img = addslashes($_POST['id_img']);
              $id_h = addslashes($_POST['id_h']);
              $delete = img_delete($id_img,$id_h);
              if ($delete) {
                echo "<script>top.window.location='../view/meuPerfil.php';</script>";
              }
            break;

        case 'add_links':
                $link1 = html_entity_decode($_POST['link1']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres
                $link2 = html_entity_decode($_POST['link2']); // html_entity_decode — Converte todas as entidades HTML para os seus caracteres
                $link3 = html_entity_decode($_POST['link3']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres
                $link_info = add_links($link1,$link2,$link3);
                  if ($link_info) {
                    echo "<script>top.window.location='../view/meuPerfil.php';</script>";
                  }
                break;

                case 'delete_link':
                      $id_links = $_POST['id_links'];
                      $link_info = delete_links($id_links);
                        if ($link_info) {
                          echo "<script>top.window.location='../view/meuPerfil.php';</script>";
                        }else {
                          echo "não deu certo";
                        }
                      break;
        case 'add_redes':
            $rede1 = html_entity_decode($_POST['youtube']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres
            $rede2 = html_entity_decode($_POST['twitter']); // html_entity_decode — Converte todas as entidades HTML para os seus caracteres
            $rede3 = html_entity_decode($_POST['linkedin']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres
            $rede4 = html_entity_decode($_POST['instagram']); // html_entity_decode — Converte todas as entidades HTML para os seus caracteres
            $rede5 = html_entity_decode($_POST['facebook']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres
            $rede6 = html_entity_decode($_POST['github']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres
            $rede_info = add_sociais($rede1,$rede2,$rede3,$rede4,$rede5,$rede6);
              if ($rede_info) {
                echo "<script>top.window.location='../view/meuPerfil.php';</script>";
              }
          break;
          case 'atualiza_redes':
          $rede1 = html_entity_decode($_POST['youtube']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres
          $rede2 = html_entity_decode($_POST['twitter']); // html_entity_decode — Converte todas as entidades HTML para os seus caracteres
          $rede3 = html_entity_decode($_POST['linkedin']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres
          $rede4 = html_entity_decode($_POST['instagram']); // html_entity_decode — Converte todas as entidades HTML para os seus caracteres
          $rede5 = html_entity_decode($_POST['facebook']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres
          $rede6 = html_entity_decode($_POST['github']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres
          $idreferencia = ($_POST['id_rede']);
          $rede_at = atualiza_sociais($rede1,$rede2,$rede3,$rede4,$rede5,$rede6,$idreferencia);
            if ($rede_at) {
              echo "<script>top.window.location='../view/meuPerfil.php';</script>";
            }
            break;


        default:
            //no action sent
    }


 ?>
