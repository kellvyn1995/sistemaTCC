<?php
include_once "../libs/class/classUsuario.php";
include_once "../model/conexao.php";
include_once "../model/modelUsuario.php";


if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
  $id_usuario = $_SESSION['idUser'];
}else {
  header("Location: ../view/login.php");
}


$nome_apresentacao = addslashes($_POST['nome_apresentacao']);
$apresentacao = addslashes($_POST['apresentacao']);
$horario_atendimento = addslashes($_POST['horario_atendimento']);
$titulo_descricao = addslashes($_POST['titulo_descricao']);
$texto_descricao = addslashes($_POST['texto_descricao']);


// se todos os campos forem diferente de vazio entra na condição
if (!empty($nome_apresentacao) && !empty($horario_atendimento) && !empty($apresentacao) && !empty($titulo_descricao) && !empty($texto_descricao)) {
            // chama a função para cadastra habilitado
            include_once "../model/modelUsuario.php";
            $status = cadastrar_habilitado($nome_apresentacao,$apresentacao,$horario_atendimento,$titulo_descricao,$texto_descricao,$id_usuario);
                if ($status) {
                  header("Location: ../view/atualizarHabilitado.php?pg=");
                }
    }else {
      header("Location: ../view/cadastrohabilitado.php?pg=1");
    }

 ?>
