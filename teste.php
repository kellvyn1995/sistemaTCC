<?php

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

if (in_array($perfil, $formatosPermitidos)) {
  $temporario_perfil = $_FILES['perfil']['tmp_name'];
  $novoNome_perfil = uniqid().".$perfil";
  if (move_uploaded_file($temporario_perfil, $pasta.$novoNome_perfil)) {
    // code...
  }
}
if (in_array($slide1, $formatosPermitidos)) {
  $temporario_slide1 = $_FILES['slide1']['tmp_name'];
  $novoNome_slide1 = uniqid().".$slide1";
  if (move_uploaded_file($temporario_slide1, $pasta.$novoNome_slide1)) {
    // code...
  }
}
if (in_array($slide2, $formatosPermitidos)) {
  $temporario_slide2 = $_FILES['slide2']['tmp_name'];
  $novoNome_slide2 = uniqid().".$slide2";
  if (move_uploaded_file($temporario_slide2, $pasta.$novoNome_slide2)) {
    // code...
  }
}
if (in_array($slide3, $formatosPermitidos)) {
  $temporario_slide3 = $_FILES['slide3']['tmp_name'];
  $novoNome_slide3 = uniqid().".$slide3";
  if (move_uploaded_file($temporario_slide3, $pasta.$novoNome_slide3)) {
    // code...
  }
}
if (in_array($img_descricao, $formatosPermitidos) {
  $temporario_img_descricao = $_FILES['img_descricao']['tmp_name'];
  $novoNome_img_descricao = uniqid().".$img_descricao";
  if (move_uploaded_file($temporario_img_descricao, $pasta.$novoNome_img_descricao)) {
    // code...
  }
}

function add_fotos($img_perfil,$img_slide1,$img_slide2,$img_slide3,$img_descricao){

  $pdo = conectar();
  $id_habil = $_SESSION['id_habilitado'];

    try {
        $query = $pdo->prepare("INSERT INTO imagens (img_perfil, img_slide1, img_slide2, img_slide3, img_descricao, id_habil) VALUES (:img_perfil,:img_slide1,:img_slide2,:img_slide3,:img_descricao,:id_habil)");
          $query->bindValue(":img_perfil", $img_perfil);
          $query->bindValue(":img_slide1", $img_slide1);
          $query->bindValue(":img_slide2", $img_slide2);
          $query->bindValue(":img_slide3", $img_slide3);
          $query->bindValue(":img_descricao", $img_descricao);
          $query->bindValue(":id_habil", $id_habil);
          $query->execute();

          return true;

    } catch (PDOException $e) {
        echo "Erro ao adicionar na fotos: ".$e->getMessage();
        return false;
    }
}
// funções das fotos
function verificar_imagem(){
  $pdo = conectar();
  $id_habil = $_SESSION['id_habilitado'];
  $vertabela = $pdo->query("SELECT * FROM imagens WHERE $id_habil");
  if ($vertabela) {

  }else {
    $criartabela = $pdo->query("INSERT INTO imagens (img_perfil, img_slide1, img_slide2, img_slide3, img_descricao, id_habil) VALUES ('','','','','',:id_habil)");
    $criartabela->bindValue(":id_habil", $id_habil);
    $criartabela->execute();
  }
  return true;
}
function add_foto_perfil($img_perfil){
  $pdo = conectar();
  $id_habil = $_SESSION['id_habilitado'];
  $vertabela = $pdo->query("SELECT * FROM imagens WHERE $id_habil");
  if ($vertabela) {

  }else {
    $criartabela = $pdo->query("INSERT INTO imagens (img_perfil, img_slide1, img_slide2, img_slide3, img_descricao, id_habil) VALUES ('','','','','',:id_habil)");
    $criartabela->bindValue(":id_habil", $id_habil);
    $criartabela->execute();
  }
  try {
    $query = $pdo->prepare("UPDATE imagens SET img_perfil = :img_perfil WHERE :id_habil = :id_habil");
    $query->bindValue(":img_perfil", $img_perfil);
    $query->bindValue(":id_habil", $id_habil);
    $query->execute();
    return true;
  } catch (\Exception $e) {
    echo "Erro ao adicionar foto perfil: ".$e->getMessage();
    return false;
  }


}
function add_foto_slide1($img_slide1){
  $pdo = conectar();
  $id_habil = $_SESSION['id_habilitado'];
  try {
    $query = $pdo->prepare("UPDATE imagens SET img_slide1 = :img_slide WHERE :id_habil = :id_habil");
    $query->bindValue(":img_slide1", $img_slide1);
    $query->bindValue(":id_habil", $id_habil);
    $query->execute();
    return true;
  } catch (\Exception $e) {
    echo "Erro ao adicionar foto slide 1: ".$e->getMessage();
    return false;
  }


}
function add_foto_slide2($img_slide2){
  $pdo = conectar();
  $id_habil = $_SESSION['id_habilitado'];
  try {
    $query = $pdo->prepare("UPDATE imagens SET img_slide2 = :img_slide2 WHERE :id_habil = :id_habil");
    $query->bindValue(":img_slide2", $img_slide2);
    $query->bindValue(":id_habil", $id_habil);
    $query->execute();
    return true;
  } catch (\Exception $e) {
    echo "Erro ao adicionar foto slide 2: ".$e->getMessage();
    return false;
  }


}
function add_foto_slide3($img_slide3){
  $pdo = conectar();
  $id_habil = $_SESSION['id_habilitado'];
  try {
    $query = $pdo->prepare("UPDATE imagens SET img_slide3 = :img_slide3 WHERE :id_habil = :id_habil");
    $query->bindValue(":img_slide3", $img_slide3);
    $query->bindValue(":id_habil", $id_habil);
    $query->execute();
    return true;
  } catch (\Exception $e) {
    echo "Erro ao adicionar foto slide3: ".$e->getMessage();
    return false;
  }


}
function add_foto_descricao($img_descricao){
  $pdo = conectar();
  $id_habil = $_SESSION['id_habilitado'];
  try {
    $query = $pdo->prepare("UPDATE imagens SET img_descricao = :img_descricao WHERE :id_habil = :id_habil");
    $query->bindValue(":img_descricao", $img_descricao);
    $query->bindValue(":id_habil", $id_habil);
    $query->execute();
    return true;
  } catch (\Exception $e) {
    echo "Erro ao adicionar foto descrição: ".$e->getMessage();
    return false;
  }
}

// parte de deleta foto
function img_delete($id_imagem,$id_h){
  $dados_imagens = buscar_imagens($id_h);
  $pdo = conectar();
  $sql = $pdo->prepare('SELECT * FROM imagens WHERE id_imagem = :id_imagem');
  $sql->bindValue(':id_imagem', $id_imagem);
  $sql->execute();
  switch (variable) {
    case 'perfil':
    // o unlink e para apaga os arquivos que estão na pasta do servidor
    unlink($dados_imagens['img_perfil']);
      break;
      case 'slide1':
        // o unlink e para apaga os arquivos que estão na pasta do servidor
        unlink($dados_imagens['img_slide1']);
        break;
        case 'slide2':
          // o unlink e para apaga os arquivos que estão na pasta do servidor
          unlink($dados_imagens['img_slide2']);
          break;
          case 'slide3':
            // o unlink e para apaga os arquivos que estão na pasta do servidor
            unlink($dados_imagens['img_slide3']);
            break;
            case 'descricao':
              // o unlink e para apaga os arquivos que estão na pasta do servidor
              unlink($dados_imagens['img_descricao']);
              break;
    default:
      // code...
      break;
  }

  function img_delete($id_imagem,$id_h){
    $dados_imagens = buscar_imagens($id_h);
    $pdo = conectar();
      try {
        $sql = $pdo->prepare('SELECT * FROM imagens WHERE id_imagem = :id_imagem');
        $sql->bindValue(':id_imagem', $id_imagem);
        $sql->execute();
        if ($sql) {
          $sql = $pdo->prepare('SELECT * FROM imagens WHERE id_imagem = :id_imagem');
          $sql->bindValue(':id_imagem', $id_imagem);
          $sql->execute();
          // o unlink e para apaga os arquivos que estão na pasta do servidor
          unlink($dados_imagens['img_perfil']);
          unlink($dados_imagens['img_slide1']);
          unlink($dados_imagens['img_slide2']);
          unlink($dados_imagens['img_slide3']);
          unlink($dados_imagens['img_descricao']);


          $sql = $pdo->prepare('DELETE FROM imagens WHERE id_imagem = :id_imagem');
          $sql->bindValue(':id_imagem', $id_imagem);
          $sql->execute();

           return true;
        }

      } catch (PDOException $e) {
          echo "Erro ao deleta da agenda: ".$e->getMessage();
          return false;
      }


  }

// atualizar redes sociais
function atualiza_sociais($youtube,$twitter,$linkedin,$instagram,$facebook,$github,$idrede){

  $pdo = conectar();

    try {
        $query = $pdo->prepare("UPDATE rede_sociais SET youtube = :youtube, twitter = :twitter, linkedin = :linkedin, instagram = :instagram, facebook = :facebook, github = :github WHERE id_rede = :id_rede");
          $query->bindValue(":youtube",$youtube);
          $query->bindValue(":twitter",$twitter);
          $query->bindValue(":linkedin",$linkedin);
          $query->bindValue(":instagram",$instagram);
          $query->bindValue(":facebook",$facebook);
          $query->bindValue(":github",$github);
          $query->bindValue(":id_rede", $idrede);

          $query->execute();

          return true;

    } catch (PDOException $e) {
        echo "Erro ao Atualiza a tabela redes sociais: ".$e->getMessage();
        return false;
    }
}
 ?>
