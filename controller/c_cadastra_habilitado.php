<?php
include_once "../libs/class/classUsuario.php";
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";


if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
  $id_usuario = $_SESSION['idUser'];
}else {
  echo "<script>top.window.location='../view/login.php';</script>";
}


$nome_apresentacao = addslashes($_POST['nome_apresentacao']);
$apresentacao = addslashes($_POST['apresentacao']);
$horario_atendimento = addslashes($_POST['horario_atendimento']);
$titulo_descricao = addslashes($_POST['titulo_descricao']);
$texto_descricao = addslashes($_POST['texto_descricao']);
$hashtags = addslashes($_POST['hashtags']);

// se todos os campos forem diferente de vazio entra na condição
if (!empty($nome_apresentacao) && !empty($horario_atendimento) && !empty($apresentacao) && !empty($titulo_descricao) && !empty($texto_descricao)) {
            // chama a função para cadastra habilitado
            include_once "../model/modelUsuario.php";
            $status = cadastrar_habilitado($nome_apresentacao,$apresentacao,$horario_atendimento,$titulo_descricao,$texto_descricao,$id_usuario,$hashtags);
                if ($status) {
                  // incerra a sessao do usuario
                  unset($_SESSION['idUser']);
                  unset($_SESSION['id_habilitado']);
                  unset($_SESSION['nome']);
                  unset($_SESSION['id_agenda']);
                  unset($_SESSION['id_m']);
                  unset($_SESSION['id_h']);
                  unset($_SESSION['id_admin']);
                  echo "<script>top.window.location='../view/aviso.php?aviso=3';</script>";

                }
    }else {
      echo "<script>top.window.location='../view/cadastrohabilitado.php?pg=1';</script>";
    }

 ?>
