<?php
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";
include_once "c_consulta.php";
    /*
    o switch vai chama uma função que vai verifica o name do botão clicado
    */
     switch (get_post_action('atualiza', 'add_img', 'delete','add_links','delete_link')) {
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
                          header("Location: ../view/meuPerfil.php");
                        }
            }else {
              header("Location: ../view/cadastrohabilitado.php?pg=1");
            }
            break;

        case 'add_img':
                // capturando as imagens
                $formatosPermitidos = array("png","jpeg","jpg","gif"); // formatos permitidos
                $perfil = pathinfo($_FILES['perfil']['name'], PATHINFO_EXTENSION);
                $slide1 = pathinfo($_FILES['slide1']['name'], PATHINFO_EXTENSION);
                $slide2 = pathinfo($_FILES['slide2']['name'], PATHINFO_EXTENSION);
                $slide3 = pathinfo($_FILES['slide3']['name'], PATHINFO_EXTENSION);
                $img_descricao = pathinfo($_FILES['img_descricao']['name'], PATHINFO_EXTENSION);
                // verificar se todoas as imagens estão no formato certo
                if (in_array($perfil, $formatosPermitidos) && in_array($slide1, $formatosPermitidos) && in_array($slide2, $formatosPermitidos) && in_array($slide3, $formatosPermitidos) && in_array($img_descricao, $formatosPermitidos)) {
                  $pasta = "../libs/img/";
                  $temporario_perfil = $_FILES['perfil']['tmp_name'];
                  $temporario_slide1 = $_FILES['slide1']['tmp_name'];
                  $temporario_slide2 = $_FILES['slide2']['tmp_name'];
                  $temporario_slide3 = $_FILES['slide3']['tmp_name'];
                  $temporario_img_descricao = $_FILES['img_descricao']['tmp_name'];
                  $novoNome_perfil = uniqid().".$perfil";
                  $novoNome_slide1 = uniqid().".$slide1";
                  $novoNome_slide2 = uniqid().".$slide2";
                  $novoNome_slide3 = uniqid().".$slide3";
                  $novoNome_img_descricao = uniqid().".$img_descricao";
                  if (move_uploaded_file($temporario_perfil, $pasta.$novoNome_perfil) && move_uploaded_file($temporario_slide1, $pasta.$novoNome_slide1) && move_uploaded_file($temporario_slide2, $pasta.$novoNome_slide2) && move_uploaded_file($temporario_slide3, $pasta.$novoNome_slide3) && move_uploaded_file($temporario_img_descricao, $pasta.$novoNome_img_descricao)) {
                    $foto_retorno = add_fotos($pasta.$novoNome_perfil,$pasta.$novoNome_slide1,$pasta.$novoNome_slide2,$pasta.$novoNome_slide3,$pasta.$novoNome_img_descricao);
                    if ($foto_retorno) {
                      header("Location: ../view/meuPerfil.php");
                    }
                  }else {
                    echo "erro, não foi possivel fazer o uploda";
                  }
                }else {
                  echo "formato invalido";
                }
            break;

        case 'delete':
              $id_img = addslashes($_POST['id_img']);
              $id_h = addslashes($_POST['id_h']);
              $delete = img_delete($id_img,$id_h);
              if ($delete) {
                header("Location: ../view/meuPerfil.php");
              }
            break;

        case 'add_links':
                $link1 = html_entity_decode($_POST['link1']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres
                $link2 = html_entity_decode($_POST['link2']); // html_entity_decode — Converte todas as entidades HTML para os seus caracteres
                $link3 = html_entity_decode($_POST['link3']); //html_entity_decode — Converte todas as entidades HTML para os seus caracteres
                  $link_info = add_links($link1,$link2,$link3);
                  if ($link_info) {
                    header("Location: ../view/meuPerfil.php");
                  }
                break;

                case 'delete_link':
                      $id_links = $_POST['id_links'];
                      $link_info = delete_links($id_links);
                        if ($link_info) {
                          header("Location: ../view/meuPerfil.php");
                        }else {
                          echo "não deu certo";
                        }
                      break;

        default:
            //no action sent
    }


 ?>
