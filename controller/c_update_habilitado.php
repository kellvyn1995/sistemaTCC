<?php
include_once "../model/conexao.php";

$nome_apresentacao = addslashes($_POST['nome_apresentacao']);
$apresentacao = addslashes($_POST['apresentacao']);
$horario_atendimento = addslashes($_POST['horario_atendimento']);
$titulo_descricao = addslashes($_POST['titulo_descricao']);
$texto_descricao = addslashes($_POST['texto_descricao']);

// se todos os campos forem diferente de vazio entra na condição
if (!empty($nome_apresentacao) && !empty($horario_atendimento) && !empty($apresentacao) && !empty($titulo_descricao) && !empty($texto_descricao)) {
            // chama a função para atualizar habilitado
            include_once "../model/modelUsuario.php";
            $status = atualizar_habilitado($nome_apresentacao,$apresentacao,$horario_atendimento,$titulo_descricao,$texto_descricao);
                if ($status) {
                  header("Location: ../view/meuPerfil.php");
                }
    }else {
      header("Location: ../view/cadastrohabilitado.php?pg=1");
    }

 ?>
